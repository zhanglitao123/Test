<?php

class MysqlPdo
{
    protected $pdo = null;
    
    public function __construct($host, $username, $passwd, $dbname, $charset = 'utf8', $port = 3306)
    {
        $this->init($host, $username, $passwd, $dbname, $charset, $port);
    }
    
    public function init($host, $username, $passwd, $dbname, $charset, $port)
    {
        $dsn = $this->buildDsn($host, $dbname, $charset, $port);
        
        $this->pdo = new PDO($dsn, $username, $passwd, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
    }
    
    private function buildDsn($host, $dbname, $charset, $port)
    {
        return "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}";
    }
    
    public function insert($table, $data)
    {
        $fields = array();
        $placeholders  = array();
        $params = array();
        foreach ($data as $k => $v) {
            $fields[] = "`{$k}`";
            $placeholders[] = '?';
            $params[] = $v;
        }
        $statement = sprintf("INSERT INTO `%s` (%s) values (%s)", $table, implode(',', $fields), implode(',', $placeholders));
        $sth = $this->query($statement, $params);
        return $this->lastInsertId();
    }
    
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
    
    public function getErrorInfo()
    {
        return $this->pdo->errorInfo();
    }
    
    public function update($table, $data, $where, $whereBindParams = array(), $limit = null)
    {
        $sets = array();
        $params = array();
        foreach ($data as $k => $v) {
            $sets[] = "`{$k}`=?";
            $params[] = $v;
        }
        if ($whereBindParams && is_array($whereBindParams)) {
            $params = array_merge($params, array_values($whereBindParams));
        }
        $statement = sprintf("UPDATE `%s` SET %s", $table, implode(',', $sets));
        if ($where) {
            $statement .= " WHERE {$where}";
        }
        if ($limit) {
            $statement .= " LIMIT {$limit}";
        }
        $sth = $this->query($statement, $params);
        return $sth->rowCount();
    }
    
    /**
     * 从结果集中获取下一行
     * @param unknown $statement
     * @param array $params
     */
    public function fetchRow($statement, $params = array())
    {
        $sth = $this->query($statement, $params);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return is_array($result) ? $result : array();
    }

    /**
     * 返回一个包含结果集中所有行的数组
     * @param $statement
     * @param array $params
     * @return array
     */
    public function fetchAll($statement, $params = array())
    {
        $sth = $this->query($statement, $params);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return is_array($result) ? $result : array();
    }

    /**
     * 从结果集中的下一行返回单独的一列
     * @param $statement
     * @param array $params
     * @param int $columnNumber 列号。从 0 开始。
     * @return string
     */
    public function fetchColumn($statement, $params = array(), $columnNumber = 0)
    {
        $sth = $this->query($statement, $params);
        return $sth->fetchColumn($columnNumber);
    }
    
    /**
     * 通过预处理方式执行
     * @param string $statement
     * @param array $params
     * @return PDOStatement
     */
    public function query($statement, $params = array())
    {
        $sth = $this->pdo->prepare($statement);
        $sth->execute($params);
        if (intval($this->pdo->errorCode()) != 0) {
            $this->error();
        }
        return $sth;
    }
    
    private function error()
    {
        throw new Exception(print_r($this->pdo->errorInfo(), true));
    }
}
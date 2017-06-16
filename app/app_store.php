<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 9:23
 */

date_default_timezone_set('Asia/Shanghai');
error_reporting(E_ALL ^ E_NOTICE);

ini_set('display_errors', 'On');

require_once './../libs/MysqlPdo.class.php';

$host = 'local_db_1.jiajuol.com';
$port = 3306;
$username = 'root';
$password = 'C5U9SX0qFcl0hNIv';
$charset = 'utf8';
$database = 'test';

$pdo = new MysqlPdo($host, $username, $password, $database, $charset, $port);

$rowCount = $pdo->fetchColumn('select count(1) from apple_app_store', []);
$pageSize = 100;
$pageCount = ceil($rowCount / $pageSize);

for ($page = 1; $page <= $pageCount; $page++) {
    $offset = ($page - 1) * $pageSize;
    foreach ($pdo->fetchAll("select id, data from apple_app_store order by id limit {$offset},{$pageSize}") as $k => &$v) {
        $decoded = json_decode($v['data'], true);
        if (!$decoded) {
            echo "{$v['id']}\n";
            continue;
        }

        if (isset($decoded['genreIds']) && $decoded['genreIds']) {
            foreach ($decoded['genreIds'] as $kk => $vv) {
                $pdo->insert('apple_e_app_cate', ['cate_id' => $vv, 'track_id' => $decoded['trackId']]);
            }
        }

        $data = [
            'artistViewUrl' => $decoded['artistViewUrl'],
            'artworkUrl' => $decoded['artworkUrl512'],
            'isGameCenterEnabled' => $decoded['isGameCenterEnabled'] ? 1 : 0,
            'kind' => $decoded['kind'],
            'features' => implode("\n", $decoded['features']),
            'screenshotUrls' => implode("\n", $decoded['screenshotUrls']),
            'advisories' => implode("\n", $decoded['advisories']),
            'trackCensoredName' => $decoded['trackCensoredName'],
            'trackViewUrl' => $decoded['trackViewUrl'],
            'contentAdvisoryRating' => $decoded['contentAdvisoryRating'],
            'averageUserRatingForCurrentVersion' => $decoded['averageUserRatingForCurrentVersion'],
            'fileSizeBytes' => $decoded['fileSizeBytes'],
            'userRatingCountForCurrentVersion' => $decoded['userRatingCountForCurrentVersion'],
            'trackContentRating' => $decoded['trackContentRating'],
            'currency' => $decoded['currency'],
            'wrapperType' => $decoded['wrapperType'],
            'version' => $decoded['version'],
            'artistId' => $decoded['artistId'],
            'artistName' => $decoded['artistName'],
            'genres' => implode("\n", $decoded['genres']),
            'price' => $decoded['price'],
            'description' => $decoded['description'],
            'trackId' => $decoded['trackId'],
            'trackName' => $decoded['trackName'],
            'bundleId' => $decoded['bundleId'],
            'primaryGenreName' => $decoded['primaryGenreName'],
            'isVppDeviceBasedLicensingEnabled' => $decoded['isVppDeviceBasedLicensingEnabled'] ? 1 : 0,
            'releaseDate' => $decoded['releaseDate'],
            'formattedPrice' => $decoded['formattedPrice'],
            'minimumOsVersion' => $decoded['minimumOsVersion'],
            'primaryGenreId' => $decoded['primaryGenreId'],
            'sellerName' => $decoded['sellerName'],
            'currentVersionReleaseDate' => $decoded['currentVersionReleaseDate'],
            'averageUserRating' => $decoded['averageUserRating'],
            'userRatingCount' => $decoded['userRatingCount'],

        ];

        $pdo->update('apple_app_store', $data, 'id=?', [$v['id']]);

    }
}


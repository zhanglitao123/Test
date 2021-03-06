<?php
/**
 * 分支：其本质上仅仅是个指向 commit 对象的可变指针，它在每次提交的时候都会自动向前移动。（每次提交后 HEAD 随着当前分支一起向前移动）
 * HEAD：它是一个指向你正在工作中的本地分支的指针（注：可以将 HEAD 想象为当前分支的别名）
 * git branch （列出当前所有分支的清单）
 * git branch -v
 * git branch --merge
 * git branch --no-merge
 * git branch MY-BRANCH (创建 MY-BRANCH 分支)
 * git checkout MY-BRANCH （将 HEAD 指向 MY-BRANCH，并将工作目录中的内容替换为 MY-BRANCH 所指向的快照内容）
 * git checkout -b MY-BRANCH （相当于执行了上述两条命令）
 * git merge OTHER-BRANCH （将 OTHER-BRANCH 分支合并到当前分支，并提交 ---- 如果没有冲突的话）
 * git branch -d OTHER-BRANCH
 *
 * Fast forward：
 * 三方合并：
 * 合并提交：
 *
 * git commit --amend (修正最后一次提交。此命令将使用当前的暂存区域快照提交)
 *
 * git reset HEAD MY-FILE (取消已暂存的修改。 MY-FILE 由暂存状态 --> 已经修改未暂存状态)
 * git checkout -- MY-FILE (取消工作目录中的修改. MY-FILE 由已经修改未暂存状态 --> 未修改状态.  即把之前版本的文件复制过来重写了此文件)
 *
 *
 * =======================================================
 *
 * git remote （查看当前已添加的远程仓库）
 *      -v 显示克隆地址
 *
 * git remote add [RepShortName] [url]  (添加一个新的远程仓库)
 *
 * -------------------------------------
 *
 * git fetch [remote-name]
 *
 * 此命令会到远程仓库中拉取所有你本地仓库中还没有的数据。运行完成后，你就可以在本地访问该远程仓库中的所有分支，将其中某个分支合并到本地，或者只是取出某个分支，一探究竟。
 *
 * 如果是克隆了一个仓库，此命令会自动将远程仓库归于 origin 名下。
 *
 * git fetch origin 会抓取从你上次克隆以来别人上传到此远程仓库中的所有更新（或是上次 fetch 以来别人提交的更新）。fetch 命令只是将远端的数据拉到本地仓库，并不自动合并到当前工作分支，只有当你确实准备好了，才能手工合并。
 *
 * 如果设置了某个分支用于跟踪某个远端仓库的分支（参见下节及第三章的内容），可以使用 git pull 命令自动抓取数据下来，然后将远端分支自动合并到本地仓库中当前分支。
 * 在日常工作中我们经常这么用，既快且好。实际上，默认情况下 git clone 命令本质上就是自动创建了本地的 master 分支用于跟踪远程仓库中的 master 分支（假设远程仓库确实有 master 分支）。所以一般我们运行 git pull，目的都是要从原始克隆的远端仓库中抓取数据后，合并到工作目录中的当前分支。
 *
 * -------------------------------------
 *
 * git push [remote-name] [branch-name]  将本地仓库中的数据推送到远程仓库
 *
 * 如果要把本地的 master 分支推送到 origin 服务器上（再次说明下，克隆操作会自动使用默认的 master 和 origin 名字），可以运行下面的命令：git push origin master
 *
 * 只有在所克隆的服务器上有写权限，或者同一时刻没有其他人在推数据，这条命令才会如期完成任务。
 * 如果在你推数据前，已经有其他人推送了若干更新，那你的推送操作就会被驳回。你必须先把他们的更新抓取到本地，合并到自己的项目中，然后才可以再次推送。
 *
 * -------------------------------------
 *
 * git remote show [remote-name] 查看某个远程仓库的详细信息
 *
 *
 *
 *
 *
 * git fetch <远程主机名>    将某个远程主机的更新全部取回本地
 * git fetch <远程主机名> <分支名>    取回某个远程主机上特定分支的更新
 *
 * 所取回的更新，在本地主机上要用”远程主机名/分支名”的形式读取。比如origin主机的master分站，就要用 origin/master 读取。
 * 取回远程主机的更新以后，可以在它的基础上，使用git checkout命令创建一个新的分支  （git checkout -b newBranch origin/master）
 * 也可以使用git merge命令或者git rebase命令，在本地分支上合并远程分支。  （git merge origin/master）
 *
 *
 *
 *
 *
 *
 */




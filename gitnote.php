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
 * aaaaaaaaaaaaaa
 *
 *
 *
 */




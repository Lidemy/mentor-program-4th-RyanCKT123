## 教你朋友 Git

## What is Git？
>一個能實現**版本控制系統**的程式，適用於多人開發、專案維護。

Git 是分散式版本控制軟體 可以分為 Local（本地）和 Remote（遠端）兩個環境 工作者可藉由Pull & Push 完成離線狀態於本地工作的情境。

在本地中又分為 **working directory（工作資料夾）、staging area（暫存區）和 repositories（檔案庫）**，一般流程會先在工作資料夾中開發，在工作資料夾裡的檔案還未被 git 版本控制 (狀態為 untracked)，所以我們要再將檔案加進暫存區中，在暫存區裡的檔案才有被版本控制 (狀態為 tracked)，沒問題後再 commit 到檔案庫裡，最後在 push 上遠端。  ([Source: Git 與 Github 版本控制基本指令與操作入門教學]( https://blog.techbridge.cc/2018/01/17/learning-programming-and-coding-with-python-git-and-github-tutorial/):)

## 基本指令

>HEAD 是一個象徵性的指標，通常會指向某個 branch 最近一次 commit 的內容。

`git init` => 在本機端， 初始化 git 環境

`git status` => 在本機端，顯示目前的檔案修改情況

`git status -s` => 以簡短的方式顯示 git status

`git log` => 在本機端，顯示目前已經 commit 的所有修改內容，後續可以增加參數來進行過濾

`git show` => 在本機端，顯示目前 branch 最新 commit 的修改內容 (進入Vim)

`git show HEAD^` => 在本機端，顯示 HEAD 的前一個 commit 的修改內容

設定檔: `.gitignore` => 設定讓 git 忽視的檔案

## 檔案管理

`git diff` => 在本機端，顯示目前在 working directory 的修改內容

`git add {file_name}` => 在本機端， 將修改的內容送到 staging area

`git rm --cached {file_name}` => 在本機端， 在 staged area 移除該檔案，但保留該檔案至 working directory

`git mv {file_name} {new_file_name}` => 在本機端， 將檔案重新命名、移動位置

`git reset HEAD {file_name}` => 在本機端，將該檔案的修改從 staging area 移到 working directory

`git reset --soft reference~# `=> 在本機端，將 branch 的 commit 往回移動到 reference~#，但在 staging area 保留這些修改

`git reset --hard reference~#`=> 在本機端，將 branch 的 commit 往回移動到 reference~#，且不保留這些修改

## commit 管理

`git commit` => 在本機端，提交 staging area 所修改的內容至 local repo

`git commit -m "message"` => 在本機端，提交 staging area 所修改的內容至 local repo，並設定 commit message

`it commit -a` => 在本機端，提交所有的修改內容至 local repo，包含在 working directory 及 staging area 所作的修改

`git commit --amend` => 在本機端，將目前 staging area 的修改內容與上一次的 commit 內容合併，如果 staging area 的沒有修改內容，則為單純修改上一次的 commit 內容

## branch 管理

`git branch (-a) (-v(v))'` => 顯示所有 branch， (包含遠端) (包含 last commit 訊息 (顯示 tracked branch))

`git branch {branch_name}` => 在本機端，建立一個指向目前 commit 的程式內容的 {branch_name}

`git branch -d {branch_name}` => 在本機端，刪除 {branch_name}

`git checkout {branch_name}` => 在本機端，切換目前的 branch 到 {branch_name}

`git merge {branch_name}` => 在本機端，將 {branch_name} 的 commit 內容，結合到目前的 branch

## 遠端主機

`git clone <repo URL>` => 在本機端，將遠端檔案庫的全部檔案複製一份下來

`git clone <repo URL> -b <branch name>` => 在本機端，將遠端檔案庫的全部檔案複製一份下來，並指定 branch

`git clone <repo URL> <folder name/path>` => 在本機端，將遠端檔案庫的全部檔案複製一份下來，並指定下載路徑

`git pull` => 在本機端，結合 git fetch 與 git merge origin/master 的效果

`git push` => 將本機端目前所在的 branch 所作的修改上傳到遠端主機的同名 branch

`git push origin Local_Branch` => 將本機端 Local_Branch 所作的修改上傳到遠端主機的同名 branch

`git push origin :{branch_name}` => 刪除遠端主機的 {branch_name}

`git push origin --delete {branch_name}` => 刪除遠端主機的 {branch_name}

`git branch {branch_name} origin/master` => 在本機端，建立一個追縱 origin/master 的 {branch_name}

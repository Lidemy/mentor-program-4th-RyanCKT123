## 交作業流程

*********
1. 進入[[MTR04](https://lidemy.com/courses/932146/lectures/17312878)]  點擊 「GitHuba classroom 網址」
2. 接受邀請後，會自動新增一個 repo，**Fork** 到自己的 GitHub 帳號底下
3. 在Terminal 下指令 `git clone "clone link from github"` 將repo下載至本地端  
4. 在 Terminal 中開新分支： `git branch week1`
5. 切換到 week1 分支： `git checkout week1`
6. 完成 week1 作業
8. 把檔案加至stage、建立 commit 訊息： `git commit -a -m "week1 hw1 Finished"`
9. 接著每當完成當週其他作業，皆記得 commit 訊息：`git commit -a -m "xxxxxx Finished"`
10. 完成全部作業後，把 local 的 branch push到github上： `git push origin week1`
12. 到 GitHub 網站上發起 PR，把 week1 merge 到 master
13. 複製 PR 網址並上學習系統繳交作業
14. 待修改完作業，PR merge 之後，切換至 master branch：`git checkout master`
15. 把遠端的 master 及 local 的 master 同步：`git pull origin master` 
16. 刪除已 merge 的 branch：`git branch -d week1`
17. 開始下一週的作業繳交：重複 4 ~ 16 步驟
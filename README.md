
# 需再 C++ 下編譯lex程式

相關參考 http://falldog7.blogspot.com/2008/01/lex-flexccode.html

部分解析 https://hackmd.io/@496NKil8SiiFZ4c2fHm3_g/S1q-UUghO

題目功能介紹

**main.l** 
編譯output 來執行
```
$ flex -+ main.l
$ g++ lex.yy.cc -o output
```
使用
```
$ ./output < 輸入檔案黨名
```

產生一個 index.php 與多個 php{}.php / js{}.js / css{}.css
分別代表 輸入檔案裡 分開的 個個 php js css 片段
他們將會儲存到一個此目錄下的資料夾 result

**html.l**
編譯html.test 來執行
```
$ flex -+ html.l
$ g++ lex.yy.cc -o html.test
```
使用
```
$ ./html.test
```
此動作將會 列印出 index.php 下的
標籤樹狀圖
指定標籤使用數量
指定標籤內容
內有連結數量


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

修改 main 裡的 recordList 可以指定列印出那些標籤的內容
```cpp
recordList.push_back("title");
recordList.push_back("label");
recordList.push_back("a");
```

**php.l**

編譯php.test 來執行
```
$ flex -+ php.l
$ g++ lex.yy.cc -o php.test
```
使用
```
$ ./php.test
```

此動作將會 列印出 result 資料夾 裡面的所有 php{}.php 集合 下的
函數樹狀圖
變數使用次數


**js.l**

編譯js.test 來執行
```
$ flex -+ js.l
$ g++ lex.yy.cc -o js.test
```
使用
```
$ ./js.test
```

此動作將會 列印出 result 資料夾 裡面的所有 js{}.js 集合 下的
函數樹狀圖
變數使用次數
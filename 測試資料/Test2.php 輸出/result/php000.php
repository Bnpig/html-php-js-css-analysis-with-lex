<?
// 是否是表單送回
if (isset($_POST["Insert"])) {
   // 開啟MySQL的資料庫連結
   $link = mysql_connect("localhost", "root", "root") 
         or die("無法開啟MySQL資料庫連結!<br>");
   mysql_select_db("test");  // 選擇資料庫
   // 建立新增記錄的SQL指令字串
   $sql ="INSERT INTO `test`.`books` (`Name`, `ISBN`, `SN`, ";
   $sql.="`Volume`) VALUES ('";
   $sql.=$_POST["Name"]."','".$_POST["Isbn"]."','";
   $sql.=$_POST["Sn"]."','".$_POST["Volume"]."');";
   //echo "<b>SQL指令: $sql</b><br>";
   // 送出Big5編碼的MySQL指令
   mysql_query('SET CHARACTER SET big5');
   mysql_query("SET collation_connection = 'big5_chinese_ci'");
   if ( mysql_query($sql) ) // 執行SQL指令
      echo "資料庫新增記錄成功!!<br>";
   else
      die("資料庫新增記錄失敗!!<br>");
   mysql_close($link);      // 關閉資料庫連結
}
?>
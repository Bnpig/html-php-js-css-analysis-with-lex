<?
// 插入函式庫的PHP檔案
require_once("C:\AppServ\www\DataAccess.php");
session_start();  // 啟動Session
session_register("login_session");  // 註冊Session變數
$username = "";
$password = "";
// 取得表單欄位
if ( isset($_POST["Username"]) )
   $username = $_POST["Username"];
if ( isset($_POST["Password"]) )
   $password = $_POST["Password"];
// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $password != "") {
   // 建立DataAccess物件的資料庫連結
   $dao = new DataAccess("localhost","root",
                         "root","test");
   // 建立SQL指令字串
   $sql = "SELECT * FROM sudent WHERE Student_ID='";
   $sql.= $password."' AND Student_Name='".$username."'";
   $dao->fetchDB($sql); // 執行SQL指令字串
   // 是否有查詢到使用者記錄
   if ( $dao->getRecord() != false ) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      header("Location: b1.htm");
    }else
      	$sql = "SELECT * FROM professor WHERE Professor_ID='";
   		$sql.= $password."' AND Professor_Name='".$username."'";
   		$dao->fetchDB($sql); // 執行SQL指令字串
	  if ( $dao->getRecord() != false ) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      header("Location: a1.htm");
   	 }else
      echo "名稱或密碼錯誤!<br>";
}
?>
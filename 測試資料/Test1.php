<? ob_start(); ?>
<html>
<head><title>�n�J����</title><meta http-equiv="Content-Type" content="text/html; charset=big5"></head>
<body background="file:///C|/AppServ/www/96.gif">
<center>
<h2>��J�ϥΪ̦W�٩M�K�X�n�J����</h2>
<hr><small><font color="red">
</font>
<?
// ���J�禡�w��PHP�ɮ�
require_once("C:\AppServ\www\DataAccess.php");
session_start();  // �Ұ�Session
session_register("login_session");  // ���USession�ܼ�
$username = "";
$password = "";
// ���o������
if ( isset($_POST["Username"]) )
   $username = $_POST["Username"];
if ( isset($_POST["Password"]) )
   $password = $_POST["Password"];
// �ˬd�O�_��J�ϥΪ̦W�٩M�K�X
if ($username != "" && $password != "") {
   // �إ�DataAccess���󪺸�Ʈw�s��
   $dao = new DataAccess("localhost","root",
                         "root","test");
   // �إ�SQL���O�r��
   $sql = "SELECT * FROM sudent WHERE Student_ID='";
   $sql.= $password."' AND Student_Name='".$username."'";
   $dao->fetchDB($sql); // ����SQL���O�r��
   // �O�_���d�ߨ�ϥΪ̰O��
   if ( $dao->getRecord() != false ) {
      // ���\�n�J, ���wSession�ܼ�
      $_SESSION["login_session"] = true;
      header("Location: b1.htm");
    }else
      	$sql = "SELECT * FROM professor WHERE Professor_ID='";
   		$sql.= $password."' AND Professor_Name='".$username."'";
   		$dao->fetchDB($sql); // ����SQL���O�r��
	  if ( $dao->getRecord() != false ) {
      // ���\�n�J, ���wSession�ܼ�
      $_SESSION["login_session"] = true;
      header("Location: a1.htm");
   	 }else
      echo "�W�٩αK�X���~!<br>";
}
?>
</font></small></center>
<form action="index.php" method="post">
<table align="center">
 <tr><td>�ϥΪ̦W�� : </td>
   <td><input type="text" name="Username" 
             size="15" maxlength="10">
   </td></tr>
 <tr><td>�ϥΪ̱K�X : </td>
   <td><input type="password" name="Password"
              size="15" maxlength="10">
   </td></tr>
 <tr><td colspan="2" align="center">
   <input type="submit" value="�n�J����">
   </td></tr>
 </table>
</form>
</body>
</html>
<html>
<head><title>�s�W��ƪ�O��</title><meta http-equiv="Content-Type" content="text/html; charset=big5"><style type="text/css">
<!--
body {
	background-image: url(96.gif);
}
-->
</style></head>
<body>
<?
// �O�_�O���e�^
if (isset($_POST["Insert"])) {
   // �}��MySQL����Ʈw�s��
   $link = mysql_connect("localhost", "root", "root") 
         or die("�L�k�}��MySQL��Ʈw�s��!<br>");
   mysql_select_db("test");  // ��ܸ�Ʈw
   // �إ߷s�W�O����SQL���O�r��
   $sql ="INSERT INTO `test`.`books` (`Name`, `ISBN`, `SN`, ";
   $sql.="`Volume`) VALUES ('";
   $sql.=$_POST["Name"]."','".$_POST["Isbn"]."','";
   $sql.=$_POST["Sn"]."','".$_POST["Volume"]."');";
   //echo "<b>SQL���O: $sql</b><br>";
   // �e�XBig5�s�X��MySQL���O
   mysql_query('SET CHARACTER SET big5');
   mysql_query("SET collation_connection = 'big5_chinese_ci'");
   if ( mysql_query($sql) ) // ����SQL���O
      echo "��Ʈw�s�W�O�����\!!<br>";
   else
      die("��Ʈw�s�W�O������!!<br>");
   mysql_close($link);      // ������Ʈw�s��
}
?>
<form action="insertbooks.php" method="post">
<h2>�п�J���y���</h2>
<hr>
<table border=1>
<tr>
  <td>�ѦW:</td>
   <td><input type="text" name="Name" size ="6"></td>
</tr><tr>
  <td>ISBN:</td>
   <td><input type="text" name="Isbn" size="12"></td>
</tr><tr>
  <td>�Ǹ�:</td>
   <td><input type="text" name="Sn" size="25"></td>
</tr><tr>
  <td>�ƶq:</td>
   <td><input type="text" name="Volume" size="10"></td>
</tr>
</table>
<hr>
<input type="submit" name="Insert" value="�s�W">
</form>
</body>
</html>
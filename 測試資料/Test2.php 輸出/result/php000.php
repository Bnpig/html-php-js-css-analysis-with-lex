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
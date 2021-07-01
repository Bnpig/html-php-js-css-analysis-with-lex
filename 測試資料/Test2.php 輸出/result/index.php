<html>
<head><title>新增資料表記錄</title><meta http-equiv="Content-Type" content="text/html; charset=big5"><link href='css000.css' rel='stylesheet'></head>
<body>
<?php include 'php000.php'; ?>
<form action="insertbooks.php" method="post">
<h2>請輸入書籍資料</h2>
<hr>
<table border=1>
<tr>
  <td>書名:</td>
   <td><input type="text" name="Name" size ="6"></td>
</tr><tr>
  <td>ISBN:</td>
   <td><input type="text" name="Isbn" size="12"></td>
</tr><tr>
  <td>序號:</td>
   <td><input type="text" name="Sn" size="25"></td>
</tr><tr>
  <td>數量:</td>
   <td><input type="text" name="Volume" size="10"></td>
</tr>
</table>
<hr>
<input type="submit" name="Insert" value="新增">
</form>
</body>
</html>
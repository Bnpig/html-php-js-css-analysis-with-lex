<?php include 'php000.php'; ?>
<html>
<head><title>登入網站</title><meta http-equiv="Content-Type" content="text/html; charset=big5"></head>
<body background="file:///C|/AppServ/www/96.gif">
<center>
<h2>輸入使用者名稱和密碼登入網站</h2>
<hr><small><font color="red">
</font>
<?php include 'php001.php'; ?>
</font></small></center>
<form action="index.php" method="post">
<table align="center">
 <tr><td>使用者名稱 : </td>
   <td><input type="text" name="Username" 
             size="15" maxlength="10">
   </td></tr>
 <tr><td>使用者密碼 : </td>
   <td><input type="password" name="Password"
              size="15" maxlength="10">
   </td></tr>
 <tr><td colspan="2" align="center">
   <input type="submit" value="登入網站">
   </td></tr>
 </table>
</form>
</body>
</html>
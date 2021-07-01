<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST" action="./register.php">

            <label for="account">帳號  </label><input type="text" id="account" name="account" value='<?php echo ($_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["account"] : '')  ?>' /><br>
            <label for="password">密碼  </label><input type="password" id="password" name="password" value='<?php echo ($_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["password"] : '') ?>' /><br>
            <label for="email">信箱  </label><input type="text" id="email" name="email" value='<?php echo ($_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["email"] : '')  ?>' /><br>
            <button type="submit">註冊</button>
        </form>
    </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "localhost";
    $username = "test";
    $password = "test123";
    $dbname = "commentdb";
    $cc = false;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // 設定 PDO 錯誤模式，用於丟擲異常
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // 開始搜尋使用者 到 MyGuests 資料表搜尋，搜尋條件為*，表示所有可能性
        
        $result = $conn->query("select * from user where account='".$_POST['account']."'");
        //建立表格
        if (trim($_POST["account"]) == ""){
            echo "<h2 style='color:red;'>帳號必須填寫</h2>";
        }
        elseif (trim($_POST["password"]) == ""){
            echo "<h2 style='color:red;'>密碼必須填寫</h2>";
        }
        elseif ($result->rowCount() >= 1){
        //same account 
            echo "<h2 style='color:red;'>此帳號已經存在</h2>";
        }else{
        //
            $regpass = password_hash($_POST["password"], PASSWORD_DEFAULT); 
            $sss = "INSERT INTO user (account,password,email) VALUES ('".$_POST["account"]."','".$regpass."','".$_POST["email"]."')";
            $conn->exec($sss);
            $cc = true;
        }
    
    
    
    
    
    //password_hash($password, PASSWORD_DEFAULT);
    }
    catch(PDOException $e) 
    {
     echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
    if ($cc){
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: login.php");
        exit;
    }
}


?>


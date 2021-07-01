<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST" action="./register.php">

            <label for="account">帳號  </label><input type="text" id="account" name="account" value='<?php include 'php000.php'; ?>' /><br>
            <label for="password">密碼  </label><input type="password" id="password" name="password" value='<?php include 'php001.php'; ?>' /><br>
            <label for="email">信箱  </label><input type="text" id="email" name="email" value='<?php include 'php002.php'; ?>' /><br>
            <button type="submit">註冊</button>
        </form>
    </body>
</html>

<?php include 'php003.php'; ?>


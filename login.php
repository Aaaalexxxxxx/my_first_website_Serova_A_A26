<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Серова А.А.</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-12"></div>
          <form method="POST" action="login.php">
            <div class="form_reg"><input class="form" type="test" name="login" placeholder="Your login"></div>
            <div class="form_reg"><input class="form" type="password" name="password" placeholder="Your password"></div>

            <button type="submit" class="btn_continue" name="submit">Продолжить</button>
	      </form>
        </div>
      </div>
    </body>
</html>

<?php

require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', '110251210', 'db_test_1');
if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $pass = $_POST['password'];
}
if (!$username || !$pass) die('Пожалуйста введите все значения!');

$sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 1) {
  setcookie("User", $username, time()+7200);
  header('Location: profile.php');
} else {
  echo "Неправильное имя или пароль";
}

?>

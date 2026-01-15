<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Серова А.А.</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="dig/css/style.css">
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-12"></div>
          <form method="POST" action="registration.php">
            <div class="form_reg"><input class="form" type="email" name="email" placeholder="Your email"></div>
            <div class="form_reg"><input class="form" type="text" name="text" placeholder="Your text"></div>
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

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['text'];
    $password = $_POST['password'];
}
if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');

$sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
if(!mysqli_query($link, $sql)) {
    echo "Не удалось добавить пользователя";
  }

?>

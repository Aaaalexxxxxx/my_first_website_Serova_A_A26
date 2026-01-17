<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Серова А.А.</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-12 index"></div>
          <h1>Страница постов
            <?php 
            if (!isset($_COOKIE['User'])) {
            ?>
                <a href="registration.php">Зарегистрируйтесь</a> или <a href="login.php">войдите</a>, чтобы просматривать контент!
            <?php
            } else {
                $link = mysqli_connect('127.0.0.1', 'root', '110251210', 'db_test_1');
                $sql = "SELECT * FROM posts";
                $res = mysqli_query($link, $sql);
                if (mysqli_num_rows($res) > 0) {
                  echo "<div class='posts_container'>";
                  while ($post = mysqli_fetch_array($res)) {

                    echo "<a href='posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                  }
                  echo '</div>';
                } else {
                  echo "Записей пока нет";
                }
            }
            ?>
        </div>
      </div>
    </body>
</html>
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
        <div class="container-general" style="display: flex;">
            <div class="container-1">
                <div class="logo"></div>
            </div>
            <div class="container-2">
                <div class="row"></div>
                    <div class="col">
                        <h1 style="text-align: center;">Серова Александра Алексеевна</h1>
                    </div>
                    <div class="col">
                        <div class="about">Информация о Серовой А.А.:</div>
                        <p>Студент 1 курса института ИКБ в РТУ МИРЭА. Что насчёт увлечений?</p>
                        <ul class="hobby">
                            <li>кодю</li>
                            <li>не оставляю в стороне творчество</li>
                            <li>люблю всё связанное с автомобилями</li>
                        </ul>
                    </div>
            </div>
            <div class="container-3">
                <div class="row">
                    <div class="col" >
                        <div class="profile_img"></div>
                        <p class="under">любимое авто</p>
                    </div>
                </div>
            </div>
        </div>

        
        <div style="text-align: center;"><button id="but1">Click me</button></div>
        <img id="img1" style="display: none;" src="image/koenigsegg-logo.png">
        <div class="container3">
            <div class="row">
                <div class="col-12">
                    <h1 class="hello">Привет, <?php echo $_COOKIE['User']; ?></h1>
                </div>
                <div class="col-12">
                    <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                        <div class="post"><input type="text" name="title" placeholder="Заголовок поста"></div>
                        <div class="post"><textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста"></textarea></div> 
                        <div><button class="btn_post" type="submit" name="submit">Сохранить пост</button></div>
                        <input type="file" name="file" /><br>
                    </form>
                </div>
            </div>
        </div>

    <script src="js/button.js" type="text/javascript"></script>
    </body>
</html>

<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', '110251210', 'db_test_1');
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    if (!$title || !$main_text) die ("Заполните все поля");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
            $image_path = "upload/" . $_FILES["file"]["name"];
            $sql = "INSERT INTO posts (title, main_text, image_path) VALUES ('$title', '$main_text', '$image_path')";
            if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
        }
        else
        {
            echo "upload failed!";
        }
    }
}

?>
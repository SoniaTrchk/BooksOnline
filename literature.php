<?php
require_once("db.php");
require_once('books.php');

$link = db_connect();
$name_ = db_connect();
$genre = db_connect();
$books = books_all($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Література</title>
    <link rel="stylesheet" href="style/main_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/book.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<style>
    h2{
        text-align: left;
        padding-left: 50px;
        padding-top: 10px;
    }
    ol{
        text-align: left;
        padding-left: 50px;
    }
    .lit_list ol{
        float: left;
        padding-top: 10px;
    }
    .lit_list{
        padding-left: 20px;
        padding-top: 10px;
    }
    .php_answer{
        background-color: #eeeeee;
        text-align: center;
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
        padding-top: 10px;
    }
</style>
<body>
<div class="container">
    <header>
        <div class="header">
            <img src="images/logo.png" class="logo">
            <a href="index.php" class="logo"><h1>Books Online</h1></a>
            <nav>
                <ul>
                    <li><a href="index.php">Головна</a></li>
                    <li><a href="JavaScript:window.alert('На жаль, цей розділ не працює')">Про нас</a>
                    <li><a href="">Автори</a></li>
                    <li><a href="literature.php">Література</a></li>
                </ul>
            </nav>
            <form class="search">
                <input type="search" name="search" placeholder="Пошук">
                <input type="submit" value="Знайти">
            </form>
        </div>
    </header>
    <div class="php_answer">
        <?php
        if (( $search = $_GET['search'])) {
            $book = books_get($link, $search);
            if ($book == null) {
                echo("Такої книги не існує(");
            } else {
                echo($book["name_"]);
            }
        }
        ?>
    </div>

    <div class="main">
        <div class="lit_list">
            <form name="add">
                <h3>Додати автора:</h3>
                <input type="text" name="name_add" required>
                <h3>Додати жанр:</h3>
                <input type="text" name="genre_add" required>
                <input type="submit" value="Додати">
            </form>

            <?php
            if ($name_add = $_GET['name_add'] and $genre_add = $_GET['genre_add']){
                $books_new = books_new($link, $name_add, $genre_add);
            }
            ?>

            <h2>Список книг, які є на нашому сайті:</h2>
            <ol>
            <?php
            foreach($books as $b):
                ?>
                    <li><?="'".$b["name_"]."'"." - ".$b["genre"]?></li>
            <?php endforeach;?>
            </ol>
        </div>
    </div>
<div>
    <footer>
        <div align="center" class="footer">
            <?php
            echo "Сьогоднішня дата: ";
            date_default_timezone_set("UTC");
            $time = time();
            $offset = 2;
            $time += 2 * 3600;
            echo date("d-m-Y H:i:s", $time);
            ?>
        </div>
    </footer>
</body>
</html>
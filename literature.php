<?php
require_once("db.php");
require_once('books.php');
$link = db_connect();
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
    h2 {
        text-align: left;
        padding-left: 50px;
        padding-top: 10px;
    }

    ol {
        text-align: left;
        padding-left: 50px;
    }

    .lit_list ol {
        float: left;
        padding-top: 10px;
    }

    .lit_list {
        padding-left: 20px;
        padding-top: 10px;
    }

    .php_answer {
        background-color: #eeeeee;
        text-align: center;
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
        padding-top: 10px;
    }

    a {
        font-family: "Open Sans", sans-serif;
    }
</style>
<body>
<div class="container">
    <header>
        <a href="login.php" style="float:right; margin-right: 10px">Вхід</a>
        <div class="header">
            <img src="images/logo.png" class="logo">
            <a href="index.php" class="logo"><h1>Books Online</h1></a>
            <nav>
                <ul>
                    <li><a href="index.php">Головна</a></li>
                    <li><a href="">Автори</a></li>
                    <li><a href="literature.php">Література</a></li>
                </ul>
            </nav>
            <form class="search">
                <input type="search" name="search" placeholder="Пошук">
                <input type="submit" value="Знайти" onclick="window.location.reload()">
            </form>
        </div>
    </header>
    <div class="php_answer">
        <?php
        if (($search = $_GET['search'])) {
            $book = books_get($link, $search);
            if ($book == null) {
                echo("Такої книги не існує(");
            } else {
                $w = get_writing($link, $book["id"]);
                $a = get_authors($link, $w['id_author']);
                echo $a["name_"] . " " . $a["surname"] . " - '" . $book["name_"] . "' , " . $book["genre"] . ".";
            }
        }
        ?>

    </div>

    <div class="main">
        <div class="lit_list">
            <form name="add">
                <h3>Додати назву:</h3>
                <input type="text" name="name_add" required>
                <h3>Додати прізвище автора:</h3>
                <input type="text" name="authorSurname_add" required>
                <h3>Додати ім'я автора:</h3>
                <input type="text" name="authorName_add" required>
                <h3>Додати жанр:</h3>
                <input type="text" name="genre_add" required>
                <input type="submit" value="Додати" onclick="window.location.reload()">
            </form>

            <?php
            if (($name_add = $_GET['name_add'] and $genre_add = $_GET['genre_add'])) {
                $book = books_get($link, $name_add);
                if ($book == null) {
                    if ($authorName_add = $_GET['authorName_add'] and $authorSurname_add = $_GET['authorSurname_add']) {
                        $books_new = books_new($link, $name_add, $genre_add);
                        $new_author = authors_get($link, $authorName_add, $authorSurname_add);
                        if ($new_author == null) {
                            $authors_new = authors_new($link, $authorName_add, $authorSurname_add);
                        }
                        $new_author = authors_get($link, $authorName_add, $authorSurname_add);
                        echo($new_author["name_"]);
                        $new_book = books_get($link, $name_add);
                        echo($new_book["id"] . $new_author["id"]);
                        $writing_new = writing_new($link, $new_book["id"], $new_author["id"]);
                    }
                }
            }
            ?>

            <h2>Список книг, які є на нашому сайті:</h2>
            <ol>
                <?php
                $books = books_all($link);
                foreach ($books as $b):
                    $w = get_writing($link, $b["id"]);
                    $a = get_authors($link, $w['id_author']);
                    ?>
                    <li><?= $a["name_"] . " " . $a["surname"] . " - '" . $b["name_"] . "' , " . $b["genre"] . "." ?></li>
                <?php endforeach; ?>


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
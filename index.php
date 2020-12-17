<?php
require_once("db.php");
require_once('books.php');

$link = db_connect();

$books = books_all($link);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books Online</title>
    <link rel="stylesheet" href="style/main_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/book.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#dialog").dialog();
        });
    </script>
</head>
<style>
    ul#ul {
        list-style-image: url("images/list_icon.png");
    }

    ul#ul1 {
        list-style-image: url("images/bestseller.png");
    }

    div p {
        padding-left: 10px;
        font-size: 15px;
    }

    .php_answer {
        background-color: #eeeeee;
        text-align: center;
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
        padding-top: 10px;
    }
</style>
<body>
<div id="dialog" title="Books Online">
    <p> Ласкаво просимо до найкращої віртуальної бібліотеки Books Online! Бажаємо захопливої подорожі до світу книжок.
        Вікно можна закрити, натиснувши на &apos;x&apos;.</p>
</div>
<div class="container">
    <header>
        <div class="header">
            <img src="images/logo.png" class="logo">
            <a href="index.php" class="logo"><h1>Books Online</h1></a>
            <nav>
                <ul>
                    <li><a href="">Головна</a></li>
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
        if (($search = $_GET['search'])) {
            $book = books_get($link, $search);
            $author = authors_get($link, $search);
            $article = articles_get($link, $search);
            if ($book == null && $author == null && $article == null) {
                echo("За вашим запитом нічого не знайдено");
            } else {
                if ($book != null) {
                    echo($book["name_"]);
                }
                if ($author != null) {
                    echo($author["name_"] . " " . $author["surname"]);
                }
                if ($article != null) {
                    echo($article["name_"]);
                }
            }
        }
        ?>
    </div>
    <div class="main">
        <div class="best-lib">
            <ul id="ul">
                <h4><strong>Список жанрів, які ви можете знайти у нашій бібліотеці</strong></h4>
                <li>Класика</li>
                <li>Фантастика</li>
                <li>Містика</li>
                <li>Пригоди</li>
                <li>Наукова література</li>
                <li>Детективи</li>
                <li>Психологія</li>
                <li>Романи</li>
            </ul>
        </div>
        <div class="best-today">
            <ul id="ul1">
                <h4>Бестселери нашої бібліотеки</h4>
                <?php
                $books = books_all($link);
                $length = count($books);

                if ($length > 5) {
                    for ($i = 1; $i <= 5; $i++) {
                        $b = $books[$i];
                        $w = get_writing($link, $b["id"]);
                        $a = get_authors($link, $w['id_author']);
                        ?>
                        <li><a><h5><?= $a["name_"] . " " . $a["surname"] . " - '" . $b["name_"] . "'" ?></h5><br>
                                <h6> <?= "'" . $b["genre"] ?></h6></a></li>
                    <?php }
                } else {
                    foreach ($books as $b):
                        $w = get_writing($link, $b["id"]);
                        $a = get_authors($link, $w['id_author']);
                        ?>
                        <li><a><h5><?= $a["name_"] . " " . $a["surname"] . " - '" . $b["name_"] . "'" ?></h5><br>
                                <h6> <?= "'" . $b["genre"] ?></h6></a></li>
                    <?php endforeach;
                } ?>

            </ul>
        </div>
    </div>

    <div class="bottom">
        <br>
        <p class="bottom-text">“The library is inhabited by spirits that come out of the pages at night.”
            – <strong>Isabel Allende</strong></p>
        <br>


    </div>

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
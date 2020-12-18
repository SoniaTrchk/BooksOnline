<?php
session_start();
require_once("db.php");
require_once('books.php');
require("connect.php");
$link = db_connect();

$books = books_all($link);
session_start();

if(isset($_GET['lang']) && !empty($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];

    setcookie("Selected_lang", $_SESSION['lang'], time()+60);

    if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

if(isset($_SESSION['lang'])){
    include $_SESSION['lang'].".php";
}else{
    include "ukr.php";
}
?>

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
    a{
        font-family: "Open Sans", sans-serif;
    }
</style>
<body>
<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>
<div id="dialog" title="Books Online">
    <p> Ласкаво просимо до найкращої віртуальної бібліотеки Books Online! Бажаємо захопливої подорожі до світу книжок.
        Вікно можна закрити, натиснувши на &apos;x&apos;.</p>
</div>
<div class="container">
    <header>
        <a href="login.php" style="float:right; margin-right: 10px"><?= _LOGIN_IN ?></a>
        <div class="header">
            <img src="images/logo.png" class="logo">
            <a href="index.php" class="logo"><h1>Books Online</h1></a>
            <nav>
                <ul>
                    <li><a href=""> <?= _MAIN?></a></li>
                    <li><a href=""><?= _AUTHORS?></a></li>
                    <li><a href="literature.php"><?= _LITERATURE?></a></li>
                    <li>
                        <form method='get' action='' id='form_lang' >
                            <select name='lang' onchange='changeLang();' >
                                <option value='eng' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng') ?> ><?= english ?></option>
                                <option value='ukr' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'ukr') ?> ><?= українська ?></option>
                                <option value='rus' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'rus') ?> ><?= русский ?></option>
                            </select>
                        </form>
                    </li>
                </ul>
            </nav>
            <form class="search">
                <input type="search" name="search" placeholder="<?= _SEARCH?>">
                <input type="submit" value="<?= _SEARCH?>" onclick="window.location.reload()">
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
        <?php
        if ($_SESSION['username']!=null){
            echo "Вітаємо,".$_SESSION['username']."!";
        }
        ?>
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
            echo _TIME ;
            date_default_timezone_set("UTC");
            $time = time();
            $offset = 2;
            $time += 2 * 3600;
            echo date("d-m-Y H:i:s", $time);
            ?>
            <br>
            <?= _LANG_SELECTED?><?php echo $_COOKIE["Selected_lang"];?>
        </div>
    </footer>
</body>
</html>
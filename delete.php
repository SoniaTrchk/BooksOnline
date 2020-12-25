<?php

session_start();
require('mail_bd.php');
$link = db_connect();

$_SESSION['user'] = $_SESSION['username'];

$text = $_REQUEST['text'];

if($_SESSION['user'] == '1@gmail.com'){
    $query = "DELETE FROM letters WHERE text = '$text' AND id_user='16'";
} else{
    $query = "DELETE FROM letters WHERE lettertext = '$text' AND id_user='17'";
}

$result = mysqli_query($link, $query);

mysqli_close($link);

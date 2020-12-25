<?php

session_start();
require('mail_bd.php');
$link = db_connect();

$_SESSION['user'] = '1@gmail.com';

$text = $_REQUEST['text'];

if($_SESSION['user'] == '1@gmail.com'){
    $query = "DELETE FROM letters WHERE text = '$text' AND id_user='1'";
} else{
    $query = "DELETE FROM letters WHERE lettertext = '$text' AND id_user='2'";
}


$result = mysqli_query($link, $query);

mysqli_close($link);
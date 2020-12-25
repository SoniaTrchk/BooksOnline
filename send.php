<?php
session_start();
require ('mail_bd.php');
$link = db_connect();


$text = $_REQUEST["text"];
$_SESSION['user'] = $_SESSION['username'];

if($text !=""){
    if($_SESSION['user'] == '1@gmail.com'){
        $receiver = '<Лист>
  <Відправник>1@gmail.com</Відправник>
  <Отримувач>2@gmail.com</Отримувач>
  <Зміст>' . $text . '</Зміст>
</Лист>
';
        $query="INSERT INTO letters (id_user, text) VALUES('17','$text')";
        file_put_contents('mailbox.xml', $receiver, FILE_APPEND | LOCK_EX);
    }
    else{
        $receiver = '<Лист>
  <Відправник>2@gmail.com</Відправник>
  <Отримувач>1@gmail.com</Отримувач>
  <Зміст>' . $text . '</Зміст>
</Лист>
';
        $query="INSERT INTO letters (id_user, text) VALUES('16','$text')";
        file_put_contents('mailbox.xml', $receiver, FILE_APPEND | LOCK_EX);
    }
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
}
mysqli_close($link);

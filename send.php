<?php
session_start();
require ('mail_bd.php');
$link = db_connect();


$text = $_REQUEST["text"];
$_SESSION['user'] =  '1@gmail.com';

if($text !=""){
    if($_SESSION['user'] == '1@gmail.com'){
        $receiver = '<message>
  <receiver>2@gmail.com</receiver>
  <textmessage>' . $text . '</textmessage>
</message>
';
        $query="INSERT INTO letters (id_user, text) VALUES('2','$text')";
        file_put_contents('mailbox.xml', $receiver, FILE_APPEND | LOCK_EX);
    }
    else{
        $receiver = '<message>
  <receiver>1@gmail.com</receiver>
  <textmessage>' . $text . '</textmessage>
</message>
';
        $query="INSERT INTO letters (id_user, text) VALUES('1','$text')";
        file_put_contents('mailbox.xml', $receiver, FILE_APPEND | LOCK_EX);
    }
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
}
mysqli_close($link);
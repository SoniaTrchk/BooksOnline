<?php
session_start();
require ('mail_bd.php');
$link = db_connect();

$_SESSION['user'] =  '2@gmail.com';

if($_SESSION['user'] ==  '1@gmail.com'){
$query = "SELECT text FROM letters WHERE id_user = '1'";
$from = '2@gmail.com';
} else{
$query = "SELECT text FROM letters WHERE id_user = '2'";
$from = '1@gmail.com';
}

$result = mysqli_query($link, $query);

$num_rows = mysqli_num_rows($result);



if ($num_rows == 0){
    echo ('В вашій скриньці немає листів!');
} else {
    echo "<table border='1'>
    <tr>
        <th>Від кого:</th>
        <th>Вміст листа:  </th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $from . "</td>";
        echo "<td>" . $row['text'] . "</td>";
        echo "<td> <input type='button' onclick='del(" . '"' . $row['text'] . '"' . ");' value='Видалити'> </td>";
        echo "</tr>";
    }
    echo "</table>";
}

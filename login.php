<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота 3</title>
    <link rel="stylesheet" href="style/registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
require("connect.php");
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['username'] = $username;
    }else{
        $err_message = "Упс, помилка..";
    }
}

?>
<div class="container">
    <form class="form-signin" method="post">
        <a href="index.php" style="float:right; margin-right: 10px">На головну</a>
        <?php
        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            echo "Ласкаво просимо, ".$username."!\n";
            echo '<a href="logout.php" style="float:right; margin-right: 10px">Вийти</a>';
        }
        ?>
        <h2>Вхід</h2>
        <input type="text" name="username" class="form-control" placeholder="Логін" required>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Увійти</button>
        <p>Ще не зареєстровані?</p>
        <a href="registration.php" style="float:left; margin-left: 10px">Зареєструватись</a>
    </form>
</div>
</body>
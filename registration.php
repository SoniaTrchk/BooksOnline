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
require("connect.php");
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    $f = fopen('sfile.txt', 'a+');
    fwrite($f, "\nUsername: ".$username."\nEmail: ".$email."\nPassword: ".$password."\n\n");
    fclose($f);
}
?>
    <div class="container">
        <form class="form-signin" method="post">
            <a href="index.php" style="float:right; margin-right: 10px">На головну</a>
            <h2>Реєстрація</h2>
            <?php
            $result = mysqli_query($connection, $query);
            if ($result){
                $suc_message = "Ви успішно зареєстровані!";
                echo ($suc_message);
            }else{
                $err_message = "Упс, виникла помилка";
            }
            ?>
            <input type="text" name="username" class="form-control" placeholder="Логін" required>
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Зареєструватись</button>
            <p>Вже є акаунт?</p>
            <a href="login.php" style="float:left; margin-left: 10px">Увійти</a>
        </form>
    </div>
</body>
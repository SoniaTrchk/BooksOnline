<?php
session_start();
echo 'Користувач: '.$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пошта</title>
</head>
<body>
<?php
require ('mail_bd.php');
$link = db_connect();
?>
<div>
    <form action="" method="post">
        <br>
        <h3>Напишіть ваш лист:  </h3>
        <textarea name="text" id="text" cols="40" rows="10"></textarea>
        <br>
        <input id='send' type="button"  value="Відправити листа">
        <br>
        <br>
        <input id='getMailbox' type="button" value="Передивитися скриньку">
    </form>
</div>

    <div id="mailbox"></div>

<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script>

    $(document).ready(function() {
        $('#send').click(function () {
            $.ajax({
                type: "POST",
                url: "send.php",
                data: "text=" + $("#text").val()
            });
            return false;
        });
        $('#getMailbox').click(function(){
            $.ajax({
                type: "POST",
                url: "mails.php",
                success: function(html){
                    $("#mailbox").html(html);
                }
            });
            return false;
        });
    });

    function del(message){
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: "text="+message,
            success: function(html){
                $("#mailbox").html(html);
            }
        });
        return false;
    }
</script>
</body>
</html>
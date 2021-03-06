<?php

$btnExitEnable = false;

if (isset($_POST['submitSend'])) {
    require_once './classes/class_Mailer.php';
    if (Mailer::send($_POST['email'], $_POST['text'])) {
        $info = 'Лист вдало відправлено!';
        $btnExitEnable = true;
    } else {
        $info = 'Спроба відправити лист - невдала!';
    }
}
?>

<!DOCTYPE html>
<html lang="uk_UA">
    <head>
        <title>Клас відправки листа</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <?php
                if (isset($info)) { echo $info.'<hr>'; }
            ?>
            <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
                <div class="form-group">
                    <label for="email">e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Введіть e-mail адресу">
                    <small id="emailHelp" class="form-text text-muted">Ця e-mail адреса не буде використовуватись десь ще</small>
                </div>
                <div class="form-group">
                    <label for="text">Сповіщення</label>
                    <textarea class="form-control" id="text" name="text" placeholder="сповіщення" rows="3"></textarea>
                </div>
                <?php
                    if (!$btnExitEnable) {
                        echo '<button type="submit" class="btn btn-primary" name="submitSend">Відправити</button>';
                    } else {
                        echo '<button type="submit" class="btn btn-primary" name="submitExit">Вихід</button>';
                    }
                ?>
            </form>
        </div>
    </body>
</html>


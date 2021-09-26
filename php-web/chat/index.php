<?php
require_once 'vendor/autoload.php';
require_once 'app/Models/Message.php';
require_once 'app/core/Loader.php';


$loader = new Loader('db.csv');

$messages = $loader->getMessages();



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet"/>
    <title>Chat</title>

</head>
<body>

    <div class="welcome">
        <h1>The chat</h1>
    </div>

    <div class="container">
        <?php foreach($messages as $message): ?>
            <div class="message">
                <?= $message->getName() . ': ' . $message->getText() ?>
            </div>
            <br>
        <?php endforeach;?>

        <div class="form">
            <form action="#" method="POST">
                <br>
                <br>
                <label>Username:</label>
                <br>
                <input name="name" type="text">
                <br>
                <br>
                <label>Text:</label>
                <br>
                <input name="text" type="text">
                <br>
                <br>
                <input type="submit">
            </form>
        </div>

    </div>

</body>
</html>

<?php



if($_POST['name'] && $_POST['text']){

    $loader->addMessage($_POST['name'], $_POST['text']);

    $_POST['name'] = false;
    $_POST['text'] = false;
    echo "<meta http-equiv='refresh' content='0'>";
}




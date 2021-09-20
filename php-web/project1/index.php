<?php

require_once 'vendor/autoload.php';




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Assignment</title>
</head>
<body>
    <form action="form.php" method="post">
        <h2>
            Create new Google Assignment
        </h2>
        <label>Title</label>
        <br>
        <input type="text" name="title">
        <br>
        <label>Description</label>
        <br>
        <input type="text" name="description">
        <br>
        <label>Address</label>
        <br>
        <input type="text" name="address">
        <br>
        <label>Date From</label>
        <br>
        <input type="datetime-local" name="date-from">
        <br>
        <label>Date Due</label>
        <br>
        <input type="datetime-local" name="date-due">
        <br>
        <br>
        <input type="submit">
    </form>
</body>
</html>

<?php






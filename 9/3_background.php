<?php
session_start();
$color = !empty($_SESSION['color']) ? $_SESSION['color'] : 'white';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: <?=$color?>;">
    <h1>Background</h1>
</body>
</html>
<?php $pageTitle = "Demo 1" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
</head>

<body>
    <?php
    $name = "Aidan Linerud";
    $age = 21;
    echo "<p>Hello! My name is " . $name . " and my age is " . $age . "</p>";
    echo "<p>Hello! My name is \"$name\" and my age is $age</p>";
    echo '<p>Hello! My name is $name and my age is $age</p>';
    ?>
</body>

</html>
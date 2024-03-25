<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBE 3</title>
</head>

<body>
    <h1>SBE 3</h1>

    <h2>Problem 1</h2>
    <?php
    $a = 1;
    $b = 42;
    $c = 99;

    if ($a == 1) {
        echo "it's a 1 for sure";
    } else if ($c == 99) {
        if ($b == 42) {
            echo "the answer to everything";
        }
    }
    ?>

    <h2>Problem 2</h2>
    <?php
    $a = 0;
    $b = '';
    $c = NULL;

    if (isset($d)) {
        echo "<p>$d</p>";
    } else {
        echo '<p>$d is not set</p>';
    }

    if (strlen($b) == 0) {
        echo '<p>$b is empty</p>';
    } else {
        echo '<p>$b is not empty: ' . $b . "</p>";
    }

    if ($c == NULL) {
        echo '<p>$c is NULL</p>';
    } else {
        echo '<p>$c is not NULL: ' . $c . "</p>";
    }
    ?>
</body>

</html>
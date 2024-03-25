<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $navLinks = [
        ["Home", "home.php"],
        ["Products", "products.php"],
        ["Services", "services.php"],
        ["Contact", "contact.php"],
        ["About", "about.php"],
    ];
    ?>
    <ul>
        <?php
        for ($i = 0; $i < count($navLinks); $i++) {
            [$text, $link] = $navLinks[$i];
            echo "<li><a href=\"$link\">$text</a></li>\n";
        }
        ?>
    </ul>
</body>

</html>
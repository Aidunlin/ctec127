<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Method</title>
</head>

<body>
    <?php
    $firstName = "";
    $lastName = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = trim($_POST["firstName"]);
        $lastName = trim($_POST["lastName"]);
    ?>
        <ul>
            <li>First name: <?= empty($firstName) ? "This field is required" : $firstName ?></li>
            <li>Last name: <?= empty($lastName) ? "This field is required" : $lastName ?></li>
        </ul>
    <?php } ?>

    <form method="post">
        <label for="first-name">First Name</label><br>
        <input type="text" name="firstName" id="first-name" value="<?= $firstName ?>"><br>
        <label for="last-name">Last Name</label><br>
        <input type="text" name="lastName" id="last-name" value="<?= $lastName ?>"><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
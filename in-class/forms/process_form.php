<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Processor</title>
</head>

<body>
    <h1>Form Processor</h1>
    <ul>
        <?php
        $firstName = trim($_POST["firstName"]);
        $lastName = trim($_POST["lastName"]);
        ?>
        <li>
            First name:
            <?= empty($firstName) ? "This field is required" : $firstName ?>
        </li>
        <li>
            Last name:
            <?= empty($lastName) ? "This field is required" : $lastName ?>
        </li>
    </ul>
</body>

</html>
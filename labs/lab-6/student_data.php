<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    require "inc/db_connect.inc.php";
    // Create a PDO Instance
    $pdo = new PDO($dsn, $user, $password);
    // Set PDO default data type to be returned
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $sql = "SELECT * FROM student";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $students = $stmt->fetchAll();

    echo "<h1>Data is from $host</h1>";
    echo "<table class='table table-striped table-hover table-sm table-responsive'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>";
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>$student->student_id</td>";
        echo "<td>$student->first_name</td>";
        echo "<td>$student->last_name</td>";
        echo "<td>$student->email</td>";
        echo "<td>$student->phone</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>
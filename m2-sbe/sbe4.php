<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBE 4</title>
</head>

<body>
    <h1>SBE 4</h1>

    <h2>Problem 1</h2>
    <?php
    $students = ['Joe', 'Sam', 'Ted', 'Gayle', 'Alie', 'Amy'];

    echo "<ul><strong>For loop</strong>";
    for ($i = 0; $i < count($students); $i++) {
        echo "<li>$students[$i]</li>";
    }
    echo "</ul>";

    echo "<ul><strong>Foreach loop</strong>";
    foreach ($students as $student) {
        echo "<li>$student</li>";
    }
    echo "</ul>";
    ?>

    <h2>Problem 2</h2>
    <?php
    $students = [940 => "Sam", 930 => "Tom", 942 => "Reji", 100 => "Bob"];

    echo "<ul><strong>For loop</strong>";
    for ($i = 0; $i < count($students); $i++) {
        echo "<li>";
        echo "Student ID: " . array_keys($students)[$i];
        echo " - Student Name: " . array_values($students)[$i];
        echo "</li>";
    }
    echo "</ul>";

    echo "<ul><strong>Foreach loop</strong>";
    foreach ($students as $id => $name) {
        echo "<li>Student ID: $id - Student Name: $name</li>";
    }
    echo "</ul>";
    ?>
</body>

</html>
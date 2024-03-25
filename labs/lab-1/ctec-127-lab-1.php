<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Your style sheet -->
    <link rel="stylesheet" href="css/style.css">
    <title>CTEC 127 Lab 1 (Winter 2024)</title>
</head>

<body>
    <?php
    $firstName = "Aidan";
    $lastName = "Linerud";
    $degreeProgram = "Web Development AAT";
    $skills = [
        "HTML", "CSS", "JavaScript",  "WordPress", "C#", "Razor Pages", "SQL",
    ];
    $courses = [
        "PHP W/ SQL 1",
        "MS Database Admin",
        "Software Dev W/ C#",
        "Web Server Tech",
        "Web Content & Social",
        "Web Interface Design II",
        "UX Design",
    ];
    $gender = "male";

    echo "<h1>$firstName $lastName</h1>";
    echo "<p>$degreeProgram</p>";

    if ($gender == "male") {
        echo "<img src=\"img/male_head.jpg\" alt=\"Male\">";
    } else if ($gender == "female") {
        echo "<img src=\"img/female_head.jpg\" alt=\"Female\">";
    }

    echo "<h2>Courses I Have Taken at Clark College and Other Institutions</h2>";
    echo "<ul>";
    for ($i = 0; $i < count($courses); $i++) {
        echo "<li>$courses[$i]</li>";
    }
    echo "</ul>";

    echo "<h2>Web Development Skills</h2>";
    echo "<ul>";
    foreach ($skills as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
    ?>
</body>

</html>
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
    <title>Practice Project</title>
</head>

<body>
    <!-- Your HTML and PHP Code 👇 -->
    <?php
    // PHP Variables
    $student = "Aidan Linerud";
    $course = "CTEC 127 - PHP and SQL 1";
    $outcomes = [
        "Utilize different contextual information to determine and track application state, and set proper logical choices based on determinant information.", "Understand the basics of database design and manipulation in use with PHP and build a dynamic web-based application.",
        "Reference and research resources for information and solutions regarding PHP.", "Demonstrate command of the PHP syntax and core programming elements."
    ];
    $days = ['Monday from 10:30AM - 12:50PM', 'Wednesday from 10:30AM - 12:50PM'];
    $building = "Remote on Zoom";
    $room = "Zoom";
    ?>

    <div class="container bg-secondary pt-4">
        <div class="jumbotron mt-4">
            <h1 class="mb-4">Welcome, <?php echo $student . " to " . $course; ?></h1>
            <hr class="my-4">
            <h2>Course Description</h2>
            <p>This course is an introduction to the server-side programming language PHP and its use in creating dynamic web applications, providing students with a functional knowledge of database design, SQL statements, dynamic web applications, and the methods implemented in PHP for manipulating MySQL databases. Prerequisite: A grade of "C" or better in CTEC 112, CTEC 121 or CSE 121 and a grade of "C" or betterin CTEC 122.</p>
        </div> <!-- End of Jumbotron -->

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 bg-warning p-4">
                <h2>Course Outcomes</h2>
                <ul>
                    <?php
                    foreach ($outcomes as $outcome) {
                        echo "<li>" . $outcome . "</li>";
                    }
                    ?>
                </ul>
            </div> <!-- end of column -->
            <div class="col-sm-12 col-md-12 col-lg-6 bg-dark text-white p-4">
                <h2>Days Class Meets On</h2>
                <ul>
                    <?php
                    foreach ($days as $day) {
                        echo "<li>" . $day . "</li>";
                    }
                    ?>
                </ul>
                <p>
                    <?php
                    echo 'The class is located in ' . $building . ', Room ' . $room . '.';
                    ?>
                </p>
            </div>
        </div> <!-- end of row -->
        <div class="row mb-4 mt-4 text-white">
            <div class="col-12">
                <h2>Meet Your Professor - Bruce Elgort</h2>
            </div>
        </div>
        <div class="row pb-4 text-white">
            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <img src="https://bruceelgort.files.wordpress.com/2018/07/cropped-bruce_exceptiona_faculty_color.jpg" alt="Bruce Elgort - College Instructor" width="200" class="rounded-circle mx-auto d-block">
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 p-4">
                <p>You'll find this technology professor - an award-winning instructor at Clark College - working hard to inspire and challenge his students with meaningful web development and programming experiences. With a cup of coffee in hand, Bruce loves to tinker and test the boundaries of existing and emerging technologies, to then guide hungry minds through memorable, educational journeys to showcase with passion the ever-evolving innovations of society. An industry leader, Bruce is known for co-developing Elguji's IdeaJam software, and is recognized by IBM as an 'IBM Champion' for being an innovative thought leader in cloud technologies.</p>
            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
</body>

</html>
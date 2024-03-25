<?php
require_once "inc/app/app.inc.php";
require_once "inc/functions/functions.inc.php";
require_once "inc/functions/db-functions.inc.php";
require_once "inc/functions/display-functions.inc.php";

// Use a default page title if none was set.
$page_title ??= "CTEC 127 Record Manager";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $page_title ?></title>
</head>

<!-- By using flexbox and minimum height, we can push the footer to appear at the bottom of the viewport if there's extra space. -->
<body class="d-flex flex-column min-vh-100">
    <h1 class="d-none"><?= $page_title ?></h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-xxl">
            <a class="navbar-brand" href="display-records.php"><?= APP_NAME ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php display_nav_links(); ?>
                <form class="d-flex" action="search-records.php" method="get">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
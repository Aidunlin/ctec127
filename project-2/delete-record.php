<?php
$page_title = "Delete Record";
require_once "inc/layout/header.inc.php";
?>

<main class="container my-5">
    <?php
    $id = trim($_GET["id"] ?? "");
    if (is_numeric($id)) {
        $successful = delete_record(intval($id));
        if ($successful) {
            header("location: display-records.php?message=I successfully deleted that record for you.");
        }
    }
    ?>

    <h2 class="alert alert-danger">Please do not play with our site.</h2>
    <img class="mx-auto d-block mt-4" src="img/frown.png" alt="A sad face">
</main>

<?php require_once "inc/layout/footer.inc.php"; ?>
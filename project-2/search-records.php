<?php
$page_title = "Search Records";
require_once "inc/layout/header.inc.php";
?>

<main class="container-xxl my-5">
    <h2 class="alert alert-primary"><?= $page_title ?></h2>
    <?php
    $params = get_display_records_parameters();

    if (empty($params["search"])) {
        echo "<p class='alert alert-warning'>I can't search if you don't give me something to search for.</p>";
        echo "<img class='mx-auto d-block mt-4' src='img/nosmile.png' alt='A face with no smile'>";
    } else {
        $result = select_records($params);
        $total = $result["total"];
        $records = $result["records"];

        display_records_count($total, " for '{$params["search"]}'");
        if ($records) {
            display_records_sort_controls($params);
            display_records_pagination($params, $total);
            display_records_table($records, $params);
            display_records_pagination($params, $total);
        } else {
            echo "<img class='mx-auto d-block mt-4' src='img/frown.png' alt='A sad face'>";
        }
    }
    ?>
</main>

<?php require_once "inc/layout/footer.inc.php"; ?>
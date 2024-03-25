<?php
$page_title = "Record Management";
require_once "inc/layout/header.inc.php";
?>

<main class="container-xxl my-5">
    <h2 class="alert alert-primary"><?= $page_title ?></h2>
    <?php
    $params = get_display_records_parameters();
    $result = select_records($params);
    $total = $result["total"];
    $records = $result["records"];

    display_records_filter_controls($params);
    display_records_count($total);
    display_records_message();

    if ($records) {
        display_records_sort_controls($params);
        display_records_pagination($params, $total);
        display_records_table($records, $params);
        display_records_pagination($params, $total);
    }
    ?>
</main>

<?php require_once "inc/layout/footer.inc.php"; ?>
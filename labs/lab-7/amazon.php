<?php
require_once "inc/config.inc.php";
require_once "inc/functions.inc.php";
require_once "inc/display/single_product.inc.php";
require_once "inc/display/product_list.inc.php";

$title = "MOCKAZON";

// Get query parameters (or suitable defaults).
$search = trim(strtolower($_GET["q"] ?? ""));
$category = trim(strtolower($_GET["category"] ?? ""));
$page = intval($_GET["p"] ?? null);
$product_id = intval($_GET["product_id"] ?? null);

if ($product_id) {
    $single_product = call_dummy_json_api("products/$product_id");
    $title = "{$single_product["title"]} - MOCKAZON";
    $category = $single_product["category"];
} else {
    $products_result = get_products($search, $category, $page);
    $products = $products_result["products"];
    $total_pages = get_total_pages(intval($products_result["total"] ?? null));
    if (in_array($category, CATEGORIES)) {
        $pretty_category = str_replace("-", " ", ucwords($category));
        $title = "$pretty_category - MOCKAZON";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <h1 class="d-none"><?= $title ?></h1>

    <?php require_once "inc/navbar.inc.php"; ?>

    <main class="container-xxl my-4">
        <?php if (isset($products)) {
            display_products($products, $category, $search, $page, $products_result["total"], $total_pages);
        } elseif (isset($single_product)) {
            display_single_product($single_product);
        } else {
            echo "<h2>Error</h2>";
            echo "<p>No products could load!</p>";
        } ?>
    </main>

    <footer class="bg-body-tertiary mt-auto">
        <div class="container py-4 text-center">
            <p class="m-0">
                &copy; 2024 - CTEC 127 - Aidan Linerud
                <br>
                Powered by <a href="https://dummyjson.com" target="_blank">DummyJSON</a>
                and <a href="https://getbootstrap.com" target="_blank">Bootstrap</a>.
            </p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
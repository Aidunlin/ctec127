<?php
function display_products(array $products, string $category, string $search, int $page, int $total_products, int $total_pages)
{
    $title = $category ? str_replace("-", " ", $category) : "products";

    if (!empty($products)) {
        if ($search) {
            echo "<h2 class='text-center'>";
            $product_text = $total_products == 1 ? "product" : "products";
            echo "<strong>$total_products</strong> $product_text found matching <strong>'$search'</strong>";
            if (in_array($category, CATEGORIES)) echo " in <strong>$category</strong>";
            echo ".</h2>";
        } else {
            echo "<h2 class='text-center text-capitalize'>$title</h2>";
        }

        list_products($products);

        if ($total_pages > 1) {
            $existing_params = [];
            if ($search) $existing_params["q"] = $search;
            if (in_array($category, CATEGORIES)) $existing_params["category"] = $category;

            $existing_params_string = http_build_query($existing_params);
            if ($existing_params_string) $existing_params_string = "&$existing_params_string";

            display_pagination($page, $total_pages, $existing_params_string);
        }
    } else {
        echo "<h2 class='text-center'><strong>0</strong> products found";
        if ($search) echo " matching <strong>'$search'</strong>";
        if (in_array($category, CATEGORIES)) echo " in <strong>$category</strong>";
        echo ".</h2>";
    }
}

function list_products(array $products)
{
    echo "<div class='row mx-3'>";
    foreach ($products as $product) {
        $image = $product["thumbnail"];
        $full_stars = str_repeat("&starf;", round($product["rating"]));
        $empty_stars = str_repeat("&star;", 5 - round($product["rating"]));
        $discount = round($product["discountPercentage"], 0);

        echo "<div class='col-12 col-xl-6 my-3 px-3 clearfix'>";
        echo "<a href='?product_id={$product["id"]}' class='text-decoration-none'>";
        echo "<img src='$image' class='object-fit-cover rounded float-start me-3' style='height:250px;width:250px' alt=''>";
        echo "<h3 class='h4'>{$product["title"]}</h3>";
        echo "</a>";
        echo "<p class='text-truncate mb-0'>{$product["description"]}</p>";

        // echo "<h4 class='text-body-secondary h5'>{$product["brand"]}</h4>";
        echo "<div class='fs-4 mb-2'>$full_stars{$empty_stars}</div>";
        echo "<div class='fs-4 mb-2'><strong>\${$product["price"]}</strong> <strong class='fs-6'>({$discount}% OFF)</strong></div>";
        if ($product["stock"] < 20) {
            echo "<p class='text-danger-emphasis mb-2'>Only {$product["stock"]} left in stock - order soon</p>";
        }
        echo "<a href='#' class='btn btn-warning btn-sm mt-1'>Add to cart</a>";

        echo "</div>";
    }
    echo "</div>";
}

function display_pagination(int $page, int $total_pages, $params_string = "")
{
    echo "<nav class='my-3' aria-label='Page navigation'>";
    echo "<ul class='pagination justify-content-center'>";

    $disable_prev = $page <= 1 ? " disabled" : "";
    $prev_page = $page - 1;
    echo "<li class='page-item$disable_prev'><a href='?p=$prev_page{$params_string}' class='page-link'>Previous</a></li>";

    for ($i = 1; $i < $total_pages + 1; $i++) {
        $active = ($page == $i || $page < 1 && $i == 1) ? " active" : "";
        echo "<li class='page-item$active'><a href='?p=$i{$params_string}' class='page-link'>$i</a></li>";
    }

    $disable_next = $page == $total_pages ? " disabled" : "";
    $next_page = max($page + 1, 2);
    echo "<li class='page-item$disable_next'><a href='?p=$next_page{$params_string}' class='page-link'>Next</a></li>";

    echo "</ul>";
    echo "</nav>";
}

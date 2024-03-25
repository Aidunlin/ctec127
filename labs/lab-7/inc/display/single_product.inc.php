<?php
function display_single_product(array $product)
{
    echo "<div class='row'>";

    display_product_image_column($product["thumbnail"], $product["images"]);

    echo "<div class='col'>";
    display_product_info($product);
    display_product_lorem_ipsum();
    display_product_mobile_images($product["images"]);
    echo "</div>";

    echo "</div>";
}

function display_product_image_column(string $thumbnail, array $images)
{
    echo "<div class='col-12 col-lg-auto text-lg-end'>";
    echo "<div class='d-block d-lg-none'><img src='$thumbnail' class='img-fluid mb-3 rounded' alt=''></div>";
    foreach ($images as $key => $image) {
        $width = $key == 0 ? "" : " w-50";
        echo "<div class='d-none d-lg-block'><img src='$image' class='img-fluid mb-3 rounded$width' alt=''></div>";
    }
    echo "</div>";
}

function display_product_info(array $product)
{
    $rating = $product["rating"];
    $full_stars = str_repeat("&starf;", round($rating));
    $empty_stars = str_repeat("&star;", 5 - round($rating));
    $discount = round($product["discountPercentage"], 0);

    echo "<h2>{$product["title"]}</h2>";
    echo "<h3 class='text-body-secondary'>{$product["brand"]}</h3>";
    echo "<p class='mb-2'>{$product["description"]}</p>";
    echo "<div class='fs-4 mb-2'>{$rating} $full_stars{$empty_stars}</div>";

    echo "<div class='mb-3 fw-bold'>";
    echo "<span class='text-danger-emphasis fs-5 me-2'>-{$discount}%</span>";
    echo "<span class='fs-4'>\${$product["price"]}</span>";
    echo "</div>";

    echo "<div class='mb-4'>";
    echo "<a href='#' class='btn btn-warning me-2'>Add to cart</a>";
    echo "<a href='#' class='btn btn-danger'>Buy now</a>";
    echo "</div>";
}

function display_product_lorem_ipsum()
{
    echo "<h3 class='h4'>About this item</h3>";
    echo "<ul>";
    echo "<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, aspernatur porro quo ipsa minus iusto earum in a animi temporibus fugiat quisquam nostrum doloremque sequi quas. Temporibus possimus hic eveniet!</li>";
    echo "<li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta ipsa voluptas ab sint. Itaque a fugit assumenda dolor distinctio necessitatibus accusamus dicta in culpa blanditiis, consequatur, accusantium hic deserunt ut.</li>";
    echo "<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt odit ullam ab nesciunt doloribus incidunt nulla ea non ratione eos distinctio animi, cum velit accusamus aliquid est commodi eius provident!</li>";
    echo "<li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum ipsum molestiae qui error ad est commodi blanditiis alias repellat dolorem atque possimus aperiam porro adipisci quisquam velit, dicta laborum ratione!</li>";
    echo "</ul>";
    echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo eius neque aspernatur nobis sit temporibus accusamus enim? Aut, obcaecati! Magnam repudiandae dicta corporis, vero autem laudantium! Doloribus earum doloremque corrupti perferendis velit optio, porro dolores minima blanditiis officiis ratione, voluptas ipsum vel laudantium dignissimos iusto. Eligendi commodi rerum possimus facilis.</p>";
}

function display_product_mobile_images($images)
{
    foreach ($images as $image) {
        echo "<div class='d-block d-lg-none'><img src='$image' class='img-fluid mb-3 rounded' style='width:250px' alt=''></div>";
    }
}

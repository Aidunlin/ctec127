<?php

/** Sends a GET request to the url and returns the JSON-decoded response. */
function call_dummy_json_api(string $url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://dummyjson.com/$url");
    // Make curl_exec() return the response of the API call.
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);
}

function get_total_pages(int $total_results)
{
    return intval(ceil($total_results / PAGINATE_LIMIT));
}

function get_products(string $search, string $category, int $page)
{
    $api_params = create_dummy_json_api_params($search, $page);
    $api_params_string = build_dummy_json_api_query($api_params);

    if (in_array($category, CATEGORIES)) {
        if ($search) {
            // DummyJSON doesn't support category and search query at the same time.
            // So we have to manually query and paginate the results ourselves.

            // Setting limit to 0 will give us all results.
            $products_result = call_dummy_json_api("products/category/$category?limit=0");

            // Manually filter through products from the category.
            $products_result["products"] = product_search($search, $products_result["products"]);
            $products_result["total"] = count($products_result["products"]);

            // Manually paginate products.
            $products_result["products"] = array_slice($products_result["products"], $api_params["skip"] ?? 0, PAGINATE_LIMIT);
        } else {
            $products_result = call_dummy_json_api("products/category/$category{$api_params_string}");
        }
    } else {
        if ($search) {
            $products_result = call_dummy_json_api("products/search$api_params_string");
        } else {
            $products_result = call_dummy_json_api("products$api_params_string");
        }
    }

    return $products_result;
}

function create_dummy_json_api_params(string $search, int $page)
{
    $params = [];
    if ($search) {
        $params["q"] = $search;
    }
    if ($page > 1) {
        $params["skip"] = (($page - 1) * PAGINATE_LIMIT);
    }
    $params["limit"] = PAGINATE_LIMIT;
    return $params;
}

function build_dummy_json_api_query(array $params)
{
    $query = http_build_query($params);
    if ($query) return "?$query";
    return "";
}

/** Filters a list of products that include a search query. */
function product_search(string $search, array $products)
{
    $search_results = [];

    for ($i = 0; $i < count($products); $i++) {
        $product = $products[$i];

        // These are the only fields that DummyJSON checks,
        // so I'd rather have more consistent search results across the whole app
        // instead of checking brands and categories here.

        $in_title = str_contains(strtolower($product["title"]), $search);
        $in_description = str_contains(strtolower($product["description"]), $search);

        if ($in_title || $in_description) {
            $search_results[] = $product;
        }
    }

    return $search_results;
}

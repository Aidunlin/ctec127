<?php

/**
 * Displays a list of navigation links, and highlights the current active link.
 */
function display_nav_links()
{
    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";

    $current_link = basename($_SERVER["PHP_SELF"]);
    foreach (NAV_LINKS as $link => $text) {
        echo "<li class='nav-item'>";
        if ($link == $current_link) {
            echo "<a class='nav-link active' aria-current='page' href='$link'>$text</a>";
        } else {
            echo "<a class='nav-link' href='$link'>$text</a>";
        }
        echo "</li>";
    }

    echo "</ul>";
}

/**
 * Displays content from API Ninjas in addition to app information/copyright.
 */
function display_production_footer()
{
    $api_results = call_api_ninjas();
    $quote_data = $api_results["quote"];
    $image_data = $api_results["image"];

    echo "<div class='row justify-content-center'>";

    echo "<div class='col-12 col-md-6'>";
    echo "<blockquote>&ldquo;$quote_data->quote&rdquo;<br>&mdash;$quote_data->author</blockquote>";
    display_development_footer();
    echo "</div>";

    echo "<div class='col-12 col-md-6 text-md-end'>";
    echo "<img src='$image_data' alt='' class='img-fluid rounded'>";
    echo "</div>";

    echo "</div>";
}


/**
 * Displays app information/copyright.
 */
function display_development_footer()
{
    echo "<p>";
    echo "<strong>" . APP_NAME . " - Version " . APP_VERSION . "</strong>";
    echo "<br>" . APP_COPYRIGHT;
    echo "</p>";
    echo "<p>Mode: " . APP_STATUS . "</p>";
}

/**
 * Displays a list of errors in a formatted alert box. 
 * @param array $errors The list of errors to display.
 */
function display_error_bucket(array $errors)
{
    echo "<div class='alert alert-warning' role='alert'>";
    echo "<p>The following errors were detected:</p>";
    echo "<ul>";
    foreach ($errors as $text) {
        echo "<li class='mb-2'>$text</li>";
    }
    echo "</ul>";
    echo "<span>All of these fields are required. Please fill them in.</span>";
    echo "</div>";
}

/**
 * Displays a single-button form used to send a POST message with a 'reset' value.
 */
function display_reset_form()
{
    echo "<form method='post'>";
    echo "<input type='hidden' name='reset' value='true'>";
    echo "<button type='submit' class='btn btn-dark mb-2'>Reset</button>";
    echo "</form>";
}

/**
 * Displays a list of last name filter controls.
 * @param array $params Existing URL query parameters to maintain in the filter links.
 */
function display_records_filter_controls(array $params)
{
    echo "<div class='mb-3'>";
    echo "<span class='d-block'>Filter by <strong>Last Name</strong></span>";
    display_records_filter_all($params);
    foreach (range("A", "Z") as $letter) {
        display_records_filter_letter($letter, $params);
    }
    echo "</div>";
}

/**
 * Displays the default filter control.
 * @param array $params Existing URL query parameters to maintain in the filter link.
 */
function display_records_filter_all(array $params)
{
    if (!isset($params["filter"]) || !in_array($params["filter"], range("A", "Z"))) {
        $class = "btn-dark fw-bold";
        $current = "aria-current='true'";
    } else {
        $class = "btn-light border";
        $current = "";
    }

    unset($params["filter"], $params["page"]);
    $query = build_query_string($params);
    echo "<a class='btn me-2 $class' $current href='{$_SERVER["PHP_SELF"]}{$query}'>All</a>";
}

/**
 * Displays the a filter control for a specific letter.
 * @param string $letter The letter to filter by.
 * @param array $params Existing URL query parameters to maintain in the filter link.
 */
function display_records_filter_letter(string $letter, array $params)
{
    if (isset($params["filter"]) && $params["filter"] == $letter) {
        $class = "btn-dark fw-bold";
        $current = "aria-current='true'";
    } else {
        $class = "btn-light border";
        $current = "";
    }

    $params["filter"] = $letter;
    unset($params["page"]);
    $query = build_query_string($params);
    echo "<a class='btn $class' $current href='$query' title='Letter $letter'>$letter</a>";
}

/**
 * Displays total records in a formatted info box. Or if there are no records, a formatted warning box.
 * @param integer $count The number of records.
 * @param string $extra_info Optional. Extra info to include after the count.
 */
function display_records_count(int $count, string $extra_info = "")
{
    if ($count == 0) {
        echo "<p class='alert alert-warning' role='alert'>No records found$extra_info.</p>";
    } elseif ($count == 1) {
        echo "<p class='alert alert-info' role='alert'>$count record found$extra_info.</p>";
    } else {
        echo "<p class='alert alert-info' role='alert'>$count record(s) found$extra_info.</p>";
    }
}

/**
 * Displays a message or error if it exists in the URL query parameters.
 */
function display_records_message()
{
    if (isset($_GET["message"])) {
        echo "<p class='alert alert-success' role='alert'>{$_GET["message"]}</p>";
    }

    if (isset($_GET["error"])) {
        echo "<p class='alert alert-warning' role='alert'>Error: {$_GET["error"]}</p>";
    }
}

/**
 * Displays column sorting and ascending/descending order controls.
 * @param array $params Existing URL query parameters to maintain in the sort links.
 */
function display_records_sort_controls(array $params)
{
    echo "<div class='mb-3'>";
    echo "<span class='d-block'>Sort by <strong>Column</strong> and <strong>Order</strong></span>";

    echo "<div class='dropdown d-inline-block'>";
    echo "<button class='btn btn-light border dropdown-toggle me-2' title='Columns' type='button' data-bs-toggle='dropdown'>";
    $column = RECORD_COLUMN_HEADINGS[$params["sortby"]];
    echo $column["title"] ?? $column["label"];
    echo "</button>";
    echo "<ul class='dropdown-menu'>";
    foreach (RECORD_COLUMN_HEADINGS as $key => $column) {
        display_records_sort_menu_item($key, $column, $params);
    }
    echo "</ul>";
    echo "</div>";

    echo "<div class='btn-group'>";
    display_records_sort_order($params, "ASC", "Ascending");
    display_records_sort_order($params, "DESC", "Descending");
    echo "</div>";

    echo "</div>";
}

/**
 * Displays a single column to be used in the sort dropdown menu.
 * @param string $key The column name.
 * @param array $column An associative array that contains a `label` to display for the item, and optionally a longer `title`.
 * @param array $params Existing URL query parameters to maintain in the sort links.
 */
function display_records_sort_menu_item(string $key, array $column, array $params)
{
    unset($params["page"]);

    if ($key == $params["sortby"]) {
        $bg = "dark";
        $current = "aria-current='true'";
        if ($params["order"] == "ASC") {
            $params["order"] = "DESC";
        } else {
            $params["order"] = "ASC";
        }
    } else {
        $bg = "white";
        $current = "";
        $params["sortby"] = $key;
        $params["order"] = "ASC";
    }

    $link = build_query_string($params);
    $title = $column["title"] ?? $column["label"];
    echo "<li><a class='dropdown-item text-bg-$bg' $current href='$link' title='Sort by $title'>$title</a></li>";
}

/**
 * Displays an order control for sorting.
 * @param array $params Existing URL query parameters to maintain in the sort links.
 * @param string $order Must be `ASC` or `DESC`.
 * @param string $label Should be `Ascending` or `Descending` based on `$order`.
 */
function display_records_sort_order(array $params, string $order, string $label)
{
    if ($params["order"] == $order) {
        $class = "btn-dark";
        $current = "aria-current='true'";
    } else {
        $class = "btn-light border";
        $current = "";
    }

    $new_params = $params;
    $new_params["order"] = $order;
    unset($new_params["page"]);
    $query = build_query_string($new_params);
    echo "<a class='btn $class' $current href='$query' title='$label Order'>$label</a>";
}

/**
 * Displays controls for pagination.
 * @param array $params Existing URL query parameters to maintain in the pagination links.
 * @param int $total_records The total records that will be paginated.
 */
function display_records_pagination(array $params, int $total_records)
{
    $total_pages = ceil($total_records / PAGINATE_LIMIT);
    if ($total_pages == 1) return;

    echo "<div class='mb-3'>";
    echo "<span class='d-block'>Page <strong>{$params["page"]}</strong> of <strong>$total_pages</strong></span>";

    if ($params["page"] == 1) {
        echo "<span class='btn me-2 border disabled' title='Previous page'>Previous</span>";
    } else {
        $prev_params = $params;
        $prev_params["page"] -= 1;
        $prev_params_string = build_query_string($prev_params);
        echo "<a class='btn me-2 btn-light border' href='$prev_params_string' title='Previous page'>Previous</a>";
    }

    echo "<div class='d-inline me-2'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $new_params = $params;
        $new_params["page"] = $i;
        $params_string = build_query_string($new_params);

        if ($params["page"] == $i) {
            echo "<a class='btn btn-dark' aria-current='true' href='$params_string' title='Page $i'>$i</a>";
        } else {
            echo "<a class='btn btn-light border' href='$params_string' title='Page $i'>$i</a>";
        }
    }
    echo "</div>";

    if ($params["page"] == $total_pages) {
        echo "<span class='btn me-2 border disabled' title='Next page'>Next</span>";
    } else {
        $next_params = $params;
        $next_params["page"] += 1;
        $next_params_string = build_query_string($next_params);
        echo "<a class='btn me-2 btn-light border' href='$next_params_string' title='Next page'>Next</a>";
    }

    echo "</div>";
}

/**
 * Displays a responsive table for listing records.
 * @param array $records An array of associative arrays of all the records to display.
 * @param array $params Existing URL query parameters to maintain in the column heading links.
 */
function display_records_table(array $records, array $params)
{
    echo "<div class='table-responsive text-nowrap mb-3'>";
    echo "<table class='table table-hover table-borderless mt-1 mb-0'>";

    echo "<thead><tr>";
    echo "<td></td>";
    foreach (RECORD_COLUMN_HEADINGS as $key => $column) {
        display_records_table_column_heading($key, $column, $params);
    }
    echo "</tr></thead>";

    foreach ($records as $row) {
        display_records_table_row($row);
    }

    echo "</table>";
    echo "</div>";
}

/**
 * Displays a single column heading for the records table.
 * The heading has a link that will sort the table by it, and/or switch the sorting order.
 * @param string $key The column name.
 * @param array $column An associative array that contains a `label` to display for the item, and optionally a longer `title`.
 * @param array $params Existing URL query parameters to maintain in the column link.
 */
function display_records_table_column_heading(string $key, array $column, array $params)
{
    if (empty($params)) {
        echo "<th>{$column["label"]}</th>";
        return;
    }

    unset($params["page"]);

    if ($key == $params["sortby"]) {
        $class = "btn-dark";
        $current = "aria-current='true'";
        if ($params["order"] == "ASC") {
            $params["order"] = "DESC";
        } else {
            $params["order"] = "ASC";
        }
    } else {
        $class = "btn-light text-black border";
        $current = "";
        $params["sortby"] = $key;
        $params["order"] = "ASC";
    }

    $link = build_query_string($params);
    $text = $column["label"];
    $title = "Sort by " . ($column["title"] ?? $column["label"]);
    echo "<th class='p-1 pt-0'><a class='btn px-2 w-100 fw-bold $class' $current href='$link' title='$title'>$text</a></th>";
}

/**
 * Displays information for a single record in the records table.
 * @param array $record An associative array that contains record information.
 */
function display_records_table_row(array $record)
{
    echo "<tr>";
    display_records_table_row_actions($record);

    echo "<td class='text-end'>{$record["student_id"]}</td>";
    echo "<td><strong>{$record["first_name"]}</strong></td>";
    echo "<td><strong>{$record["last_name"]}</strong></td>";

    echo "<td class='p-1'>";
    if (isset($record["gpa"]) && is_numeric($record["gpa"])) {
        $gpa = number_format($record["gpa"], 2);

        if ($gpa <= 2) {
            $gpa_style = " text-bg-danger";
        } elseif ($gpa >= 3.5) {
            $gpa_style = " text-bg-success";
        } else {
            $gpa_style = "";
        }

        echo "<span class='d-block p-1 rounded text-center$gpa_style'>$gpa</span>";
    }
    echo "</td>";

    $degree = $record["degree_program"] ? $record["degree_program"] : "<em>Undeclared</em>";
    echo "<td>$degree</td>";

    echo "<td class='text-center'>";
    if (isset($record["graduation_date"]) && $record["graduation_date"] && strtotime($record["graduation_date"]) !== false) {
        [$year, $month, $day] = explode("-", $record["graduation_date"]);
        if (checkdate($month, $day, $year)) {
            echo "$month/$day/$year";
        }
    }
    echo "</td>";

    $aid = $record["financial_aid"] ? "✅" : "";
    echo "<td class='text-center'>$aid</td>";

    echo "<td>{$record["email"]}</td>";
    echo "<td class='text-center'>{$record["phone"]}</td>";

    echo "</tr>";
}

/**
 * Displays a dropdown menu for links to update or delete a specific record.
 * @param array $record An associative array that contains record information.
 */
function display_records_table_row_actions(array $record)
{
    echo "<td class='p-1'>";
    echo "<a class='px-2 py-1 dropdown-toggle dropdown-symbol-none btn btn-light text-black border w-100' role='button' data-bs-toggle='dropdown' href='#' title='Actions for {$record["first_name"]}'>▼</a>";

    echo "<div class='dropdown'>";
    echo "<ul class='dropdown-menu'>";
    echo "<li><a class='dropdown-item' href='update-record.php?id={$record["id"]}'>";
    echo "Update {$record["first_name"]}";
    echo "</a></li>";
    echo "<li><a class='dropdown-item link-danger' href='delete-record.php?id={$record["id"]}' onclick=\"return confirm('Are you sure you want to delete {$record["first_name"]}?');\">";
    echo "Delete {$record["first_name"]}";
    echo "</a></li>";
    echo "</ul>";
    echo "</div>";

    echo "</td>";
}

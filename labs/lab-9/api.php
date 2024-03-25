<?php
/** The DB connection, which is set to use associative arrays for data output. */
$db = new PDO("mysql:host=localhost;dbname=classicmodels", "root");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/** List of all the query-able columns. */
const COLUMNS = [
    "customernumber",
    "customername",
    "contactfirstname",
    "contactlastname",
    "phone",
    "addressline1",
    "addressline2",
    "city",
    "state",
    "postalcode",
    "country",
    "salesrepemployeenumber",
    "creditlimit",
];

/** The data to be encoded into the JSON response. */
$output = [
    "total" => 0,
    "limit" => 10,
    "skip" => 0,
    "customers" => [],
];

/** 'WHERE' conditions to be used in the SQL statement. Can be empty. */
$conditions = [];
foreach ($_GET as $name => $value) {
    $name = trim(strtolower($name));
    $value = trim(strtolower($value));

    // Not a column? We don't like you, skip!
    if (!in_array($name, COLUMNS))
        continue;

    if ($value == "null") {
        // Rudimentary null check.
        $conditions[$name] = "$name IS NULL";
    } elseif (is_numeric($value)) {
        // Exact match for numeric values.
        $conditions[$name] = "$name = '$value'";
    } elseif ($value) {
        // Partial match for string values.
        $conditions[$name] = "$name LIKE '%$value%'";
    }
}

/** The combined string of 'WHERE' conditions. If there are no conditions, this is an empty string. */
$conditions_string = join(" AND ", $conditions);
if ($conditions_string)
    $conditions_string = "WHERE $conditions_string";

// Getting the total count before applying the LIMIT will give enough information for the end-user
// to paginate the results if they'd like.

$total_count_query = "SELECT COUNT(*) AS count FROM customers $conditions_string";
$total_count_statement = $db->prepare($total_count_query);
$total_count_statement->execute();

$total_count_result = $total_count_statement->fetch();
if ($total_count_result)
    $output["total"] = $total_count_result["count"];


// Now we get pagination parameters.

if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
    $output["limit"] = intval($_GET["limit"]);
    // Easy way set the limit to whatever is the total count.
    if ($output["limit"] == 0)
        $output["limit"] = $output["total"];
}
if (isset($_GET["skip"]) && is_numeric($_GET["skip"])) {
    $output["skip"] = intval($_GET["skip"]);
}
$paginate_string = "LIMIT {$output["limit"]} OFFSET {$output["skip"]}";

// Then query the customers table with that pagination.

$data_query = "SELECT * FROM customers $conditions_string $paginate_string";
$data_statement = $db->prepare($data_query);
$data_statement->execute();
$output["customers"] = $data_statement->fetchAll();

// Makes the browser consider the response as a JSON document.
header("content-type:application/json;charset=utf-8");

// Built-in pretty print, so we can use iframes to easily show API examples in test.html.
echo json_encode($output, JSON_PRETTY_PRINT);

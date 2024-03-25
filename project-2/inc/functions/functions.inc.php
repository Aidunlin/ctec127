<?php

/**
 * Stringifies parameters into a valid URL query parameter list.
 * Simple wrapper for `http_build_query()`.
 * @param array $params An associative array of query parameters.
 * @return string The query string.
 * - Includes a `?` at the beginning of the output if there's at least one parameter.
 */
function build_query_string(array $params)
{
    ksort($params);
    $output = http_build_query($params);
    if ($output) return "?$output";
    return "";
}

/**
 * Checks if a `yyyy-mm-dd` string is a valid Gregorian date.
 * @param string $date The date string formatted as `yyyy-mm-dd`.
 * @return bool Whether the date is valid.
 */
function is_valid_date(string $date)
{
    [$year, $month, $day] = explode("-", $date);
    return strtotime($date) !== false && checkdate($month, $day, $year);
}

/**
 * Gets URL parameters for displaying and organizing records.
 * @return array An associative array.
 * - Values for `sortby`, `order`, and `page` will always be validated and returned.
 * - Values for `filter` and `search` can be unset if not present or invalid.
 */
function get_display_records_parameters()
{
    $params = [];

    $filter = trim($_GET["filter"] ?? "");
    if (in_array($filter, range("A", "Z"))) {
        $params["filter"] = $filter;
    }

    $sortby = trim($_GET["sortby"] ?? "");
    if (in_array($sortby, array_keys(RECORD_COLUMN_HEADINGS))) {
        $params["sortby"] = $sortby;
    } else {
        $params["sortby"] = "last_name";
    }

    $order = trim($_GET["order"] ?? "");
    if (in_array($order, ORDERINGS)) {
        $params["order"] = $order;
    } else {
        $params["order"] = "ASC";
    }

    $page = trim($_GET["page"] ?? "");
    if (is_numeric($page)) {
        $params["page"] = max(intval($page), 1);
    } else {
        $params["page"] = 1;
    }

    $search = trim($_GET["search"] ?? "");
    if ($search) {
        $params["search"] = $search;
    }

    return $params;
}

/**
 * Sanitizes and returns form data from the POST response.
 * @param bool $require_id Whether the record id must be included in the POST response.
 * @return array An associative array that contains an inner array of valid `data` from the form.
 * - May include a list of `errors` to display to the user.
 */
function get_record_form_data($require_id = false)
{
    $data = [];
    $errors = [];

    if ($require_id) {
        $id = trim($_POST["id"] ?? "");
        if (is_numeric($id)) {
            $data["id"] = $id;
        } else {
            $errors[] = "Missing or invalid record id.";
        }
    }

    $student_id = trim($_POST["student_id"] ?? "");
    if (is_numeric($student_id)) {
        $data["student_id"] = intval($student_id);
    } else {
        $errors[] = "A <strong>student ID</strong> is required.";
    }

    $first_name = trim($_POST["first_name"] ?? "");
    if ($first_name) {
        $data["first_name"] = $first_name;
    } else {
        $errors[] = "A <strong>first name</strong> is required.";
    }

    $last_name = trim($_POST["last_name"] ?? "");
    if ($last_name) {
        $data["last_name"] = $last_name;
    } else {
        $errors[] = "A <strong>last name</strong> is required.";
    }

    $gpa = trim($_POST["gpa"] ?? "");
    if (is_numeric($gpa)) {
        $data["gpa"] = floatval($gpa);
    }

    $degree_program = trim($_POST["degree_program"] ?? "");
    if ($degree_program === "" || in_array($degree_program, DEGREES)) {
        $data["degree_program"] = $degree_program;
    } else {
        $errors[] = "Invalid <strong>degree program</strong>.";
    }

    $graduation_date = trim($_POST["graduation_date"] ?? "");
    if ($graduation_date === "" || is_valid_date($graduation_date)) {
        $data["graduation_date"] = $graduation_date;
    } else {
        $errors[] = "Invalid <strong>graduation date</strong>.";
    }


    $financial_aid = trim($_POST["financial_aid"] ?? "");
    if ($financial_aid === "0" || $financial_aid === "1") {
        $data["financial_aid"] = $financial_aid;
    } else {
        $errors[] = "An option for <strong>financial aid</strong> is required.";
    }

    $email = trim($_POST["email"] ?? "");
    if ($email) {
        $data["email"] = $email;
    } else {
        $errors[] = "An <strong>email address</strong> is required.";
    }

    $phone = trim($_POST["phone"] ?? "");
    if ($phone) {
        $data["phone"] = $phone;
    } else {
        $errors[] = "A <strong>phone number</strong> is required.";
    }

    $output = ["data" => $data];
    if ($errors) {
        $output["errors"] = $errors;
    }
    return $output;
}

/**
 * Sanitizes data to be used for advanced search.
 * Unlike `get_record_form_data()`, columns are optional and are quietly skipped if invalid.
 * @param array $from An associative array that contains the raw data.
 * - Could be from `$_POST` or `$_SESSION`.
 * @return array The sanitized data.
 */
function get_advanced_search_data(array $from)
{
    $data = [
        "student_id" => "",
        "first_name" => "",
        "last_name" => "",
        "gpa" => "",
        "degree_program" => "",
        "graduation_date" => "",
        "financial_aid" => 0,
        "email" => "",
        "phone" => "",
    ];

    if (!empty($from["student_id"])) {
        $data["student_id"] = intval($from["student_id"]);
    }

    if (!empty($from["first_name"])) {
        $data["first_name"] = $from["first_name"];
    }

    if (!empty($from["last_name"])) {
        $data["last_name"] = $from["last_name"];
    }

    if (!empty($from["gpa"])) {
        $data["gpa"] = floatval($from["gpa"]);
    }

    if (!empty($from["degree_program"])) {
        $data["degree_program"] = $from["degree_program"];
    }

    if (!empty($from["graduation_date"]) && is_valid_date($from["graduation_date"])) {
        $data["graduation_date"] = $from["graduation_date"];
    }

    if (!empty($from["financial_aid"])) {
        $data["financial_aid"] = intval($from["financial_aid"]);
    }

    if (!empty($from["email"])) {
        $data["email"] = $from["email"];
    }

    if (!empty($from["phone"])) {
        $data["phone"] = $from["phone"];
    }

    return $data;
}

/**
 * Calls two APIs from API Ninjas in parallel, using a cURL multi handle.
 * @return array An associative array containing `quote` and `image` values.
 * - `quote`: object with `quote` and `author` properties
 * - `image`: base64-encoded string to be used in an img src attribute
 * @link https://api-ninjas.com/
 */
function call_api_ninjas()
{
    // Code taken from:
    // https://www.php.net/manual/en/function.curl-multi-init.php#118142

    $quote_handle = curl_init("https://api.api-ninjas.com/v1/quotes?category=happiness");
    curl_setopt($quote_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($quote_handle, CURLOPT_HTTPHEADER, ["X-Api-Key: 5L9X651BXIToLj2S4qPXaw==p58aWSgHthwoZFud"]);

    $image_handle = curl_init("https://api.api-ninjas.com/v1/randomimage?width=320&height=240");
    curl_setopt($image_handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($image_handle, CURLOPT_HTTPHEADER, ["X-Api-Key: 5L9X651BXIToLj2S4qPXaw==p58aWSgHthwoZFud", "Accept: image/jpg"]);

    $multi_handle = curl_multi_init();
    curl_multi_add_handle($multi_handle, $quote_handle);
    curl_multi_add_handle($multi_handle, $image_handle);

    $still_running = null;
    do {
        curl_multi_exec($multi_handle, $still_running);
    } while ($still_running);

    curl_multi_remove_handle($multi_handle, $quote_handle);
    curl_multi_remove_handle($multi_handle, $image_handle);
    curl_multi_close($multi_handle);

    $quote_data = json_decode(curl_multi_getcontent($quote_handle))[0];
    $image_data = "data:image/png;base64," . base64_encode(curl_multi_getcontent($image_handle));

    return ["quote" => $quote_data, "image" => $image_data];
}

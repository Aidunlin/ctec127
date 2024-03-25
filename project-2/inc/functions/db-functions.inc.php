<?php

/**
 * Selects a single record from the database.
 * @param int $id The id of the record to fetch.
 * @return array|false Either the record as an associative array on success, or false on error.
 */
function select_record(int $id)
{
    global $db;

    $sql = "SELECT * FROM " . DB_TABLE . " WHERE id=:id LIMIT 1";
    $statement = $db->prepare($sql);

    try {
        $statement->execute(["id" => $id]);
    } catch (Exception $e) {
        return false;
    }
    
    return $statement->fetch();
}

/**
 * Selects all records that match input parameters and/or form values.
 * 
 * @param array $params An associative array that may include:
 * - `page`: integer greater than zero, `sortby`: column name to be sorted, and `order`: `ASC` or `DESC`;
 * - OR `search`: search string;
 * - OR `filter`: single letter to filter by last name
 * 
 * @param array|null $form An optional associative array.
 * - If supplied, only `page`, `sortby`, and `order` values from `$params` will be used.
 * - Items will filter down the results: strings will match any substring, and numeric values exactly match.
 * - Only item keys from `RECORD_COLUMN_HEADINGS` will be used.
 * 
 * @return array An associative array that contains a list of `records` and the `total` number of results.
 * - The list of records is paginated by `$params`, but the total count disregards any pagination.
 */
function select_records($params, $form = null)
{
    global $db;

    // First, create the conditions to filter down results.

    $where_sql = "";

    if (isset($form)) {
        // Advanced search.
        $search_conditions = [];
        foreach ($form as $name => $value) {
            if (!in_array($name, array_keys(RECORD_COLUMN_HEADINGS))) {
                continue;
            }

            if (is_numeric($value)) {
                $search_conditions[] = "$name = $value";
            } elseif (!empty($value)) {
                $search_conditions[] = "$name LIKE '%$value%'";
            }
        }
        if ($search_conditions) {
            $where_sql = "WHERE " . implode(" AND ", $search_conditions);
        }
    } elseif (isset($params["search"]) && $params["search"]) {
        // Simple search from the navbar.
        // First name, last name, and degree program will match by substring,
        // and student id, email, and phone will exactly match.
        $where_sql =
            "WHERE student_id LIKE '{$params["search"]}'
            OR first_name LIKE '%{$params["search"]}%'
            OR last_name LIKE '%{$params["search"]}%'
            OR degree_program LIKE '%{$params["search"]}%'
            OR email LIKE '{$params["search"]}'
            OR phone LIKE '{$params["search"]}'";
    } elseif (isset($params["filter"]) && $params["filter"]) {
        // Home page with last name filters.
        $where_sql = "WHERE last_name LIKE '{$params["filter"]}%'";
    }

    // Next, grab the total results before working on pagination.

    $total_sql = "SELECT COUNT(*) AS total FROM " . DB_TABLE . " $where_sql";
    $total = $db->query($total_sql)->fetchAll()[0]["total"];

    // Finally, grab the records and return them, as well as the total results.

    $records_sql = "SELECT * FROM " . DB_TABLE . " $where_sql";

    if (isset($params["sortby"]) && in_array($params["sortby"], array_keys(RECORD_COLUMN_HEADINGS))) {
        $records_sql .= " ORDER BY {$params["sortby"]}";
        if (isset($params["order"]) && in_array($params["order"], ORDERINGS)) {
            $records_sql .= " {$params["order"]}";
        }
    }
    
    if (isset($params["page"]) && is_numeric($params["page"])) {
        $offset = ($params["page"] - 1) * PAGINATE_LIMIT;
        $records_sql .= " LIMIT " . PAGINATE_LIMIT . " OFFSET $offset";
    }

    $records = $db->query($records_sql)->fetchAll();

    return [
        "total" => $total,
        "records" => $records,
    ];
}

/**
 * Inserts a record into the database.
 * @param array $record An associative array representing the record data.
 * @return bool Whether the insert was successful.
 */
function insert_record(array $record)
{
    global $db;

    $record_keys = array_keys($record);

    $columns_string = join(",", $record_keys);

    $bound_params = [];
    foreach ($record_keys as $key) {
        if (!in_array($key, array_keys(RECORD_COLUMN_HEADINGS))) {
            continue;
        }

        $bound_params[] = ":$key";
    }
    $bound_params_string = join(", ", $bound_params);

    $sql = "INSERT INTO " . DB_TABLE . " ($columns_string) VALUES ($bound_params_string)";
    $statement = $db->prepare($sql);

    try {
        return $statement->execute($record);
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Updates an existing record.
 * @param array $record An associative array representing the record data.
 * - Must contain a valid `id`, as it will determine which record to update in the database.
 * @return bool Whether the update was successful.
 */
function update_record(array $record)
{
    global $db;

    $params_to_update = [];
    foreach ($record as $name => $value) {
        if (!in_array($name, array_keys(RECORD_COLUMN_HEADINGS))) {
            continue;
        }

        $params_to_update[] = "$name = :$name";
    }
    $params_string = join(", ", $params_to_update);

    $sql = "UPDATE " . DB_TABLE . " SET $params_string WHERE id=:id LIMIT 1";
    $statement = $db->prepare($sql);

    try {
        return $statement->execute($record);
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Deletes an existing record.
 * @param int $id The id of the record to delete.
 * @return bool Whether the deletion was successful.
 */
function delete_record(int $id)
{
    global $db;

    $sql = "DELETE FROM " . DB_TABLE . " WHERE id=:id LIMIT 1";
    $statement = $db->prepare($sql);
    try {
        return $statement->execute(["id" => $id]);
    } catch (Exception $e) {
        return false;
    }
}

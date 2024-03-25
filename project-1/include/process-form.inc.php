<?php

function get_post_data($formData)
{
    foreach ($_POST as $name => $value) {
        if (in_array($name, array_keys($formData))) {
            $formData[$name] = is_string($value) ? trim($value) : $value;
        }
    }

    return $formData;
}

function get_errors($formData)
{
    $errors = [];

    if (empty($formData["first"])) $errors[] = "First Name field is blank";
    if (empty($formData["last"])) $errors[] = "Last Name field is blank";
    if (empty($formData["email"])) $errors[] = "Email field is blank";
    if (empty($formData["phone"])) $errors[] = "Phone field is blank";

    if (empty($formData["degree"])) {
        $errors[] = "Degree Program of Interest field is not selected";
    } elseif (!in_array($formData["degree"], DEGREES)) {
        $errors[] = "Degree Program of Interest field has an invalid value ({$formData["degree"]})";
    }

    if (empty($formData["age"])) {
        $errors[] = "Age field is not selected";
    } elseif (!in_array($formData["age"], AGES)) {
        $errors[] = "Age field has an invalid value ({$formData["age"]})";
    }

    foreach ($formData["interests"] as $interest) {
        if (!in_array($interest, INTERESTS)) {
            $errors[] = "Interests field has an invalid selection ($interest)";
            break;
        }
    }

    if (empty($formData["communication"])) {
        $errors[] = "Preferred Communication Method field is not selected";
    } elseif (!in_array($formData["communication"], COMM_METHODS)) {
        $errors[] = "Preferred Communication Method field has an invalid value ({$formData["communication"]})";
    }

    if (empty($formData["questions"])) $errors[] = "Questions field is blank";

    return $errors;
}

function displayPostData($formData)
{
    echo "<section class=\"data\">";
    echo "<h2>You submitted:</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Field</th>";
    echo "<th>Value</th>";
    echo "</tr>";

    foreach ($formData as $name => $value) {
        if (!empty($value)) {
            echo "<tr>";
            echo "<td class=\"titlecase\">$name</td>";
            echo "<td>";

            if (is_array($value)) {
                echo "<ul>";
                foreach ($value as $innerValue) {
                    echo "<li>$innerValue</li>";
                }
                echo "</ul>";
            } else {
                echo $value;
            }
            
            echo "</td>";
            echo "</tr>";
        }
    }
    
    echo "</table>";
    echo "</section>";
}

function displayErrors($errors)
{
    echo "<section class=\"errors\">";
    echo "<h2>Errors:</h2>";

    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";

    echo "<p>Please try again!</p>";
    echo "</section>";
}

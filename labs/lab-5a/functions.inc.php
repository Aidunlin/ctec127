<?php

/** Calculates temperature converted from one unit to another */
function convertTemp($temp, $fromUnit, $toUnit)
{
    if (!is_numeric($temp)) return "";

    // conversion formulas
    // Celsius to Fahrenheit = T(°C) × 9/5 + 32
    if ($fromUnit == "celsius" && $toUnit == "fahrenheit") {
        return $temp * 9 / 5 + 32;
    }
    // Celsius to Kelvin = T(°C) + 273.15
    elseif ($fromUnit == "celsius" && $toUnit == "kelvin") {
        return $temp + 273.15;
    }
    // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
    elseif ($fromUnit == "fahrenheit" && $toUnit == "celsius") {
        return ($temp - 32) * 5 / 9;
    }
    // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
    elseif ($fromUnit == "fahrenheit" && $toUnit == "kelvin") {
        return ($temp + 459.67) * 5 / 9;
    }
    // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
    elseif ($fromUnit == "kelvin" && $toUnit == "fahrenheit") {
        return $temp * 9 / 5 - 459.67;
    }
    // Kelvin to Celsius = T(K) - 273.15
    elseif ($fromUnit == "kelvin" && $toUnit == "celsius") {
        return $temp - 273.15;
    }

    return "";
}

/** Returns an array of error messages to display. If the array is empty, then no errors were found. */
function validate($temp, $fromUnit, $toUnit)
{
    $errors = [];
    if (!is_numeric($temp)) {
        array_push($errors, "Temperature value is not a number");
    }

    if ($fromUnit == "") {
        array_push($errors, "Please select a temperature unit");
    } elseif (!in_array($fromUnit, array_keys(UNIT_SELECTIONS))) {
        array_push($errors, "Invalid temperature unit");
    }

    if ($toUnit == "") {
        array_push($errors, "Please select a unit to convert to");
    } elseif (!in_array($toUnit, array_keys(UNIT_SELECTIONS))) {
        array_push($errors, "Invalid unit to convert to");
    }

    if ($fromUnit == $toUnit) {
        array_push($errors, "Temperature unit and unit to convert to are the same");
    }

    return $errors;
}

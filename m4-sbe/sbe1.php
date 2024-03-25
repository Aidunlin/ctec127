<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBE 1</title>
</head>

<body>
    <h1>SBE 1</h1>
    <?php
    function putTogether($first, $second)
    {
        return $first . $second;
    }

    function displayArray($array)
    {
        echo "<ol>";
        foreach ($array as $value) {
            echo "<li>$value</li>";
        }
        echo "</ol>";
    }

    function displayArray2($array)
    {
        $str = "<ol>";
        foreach ($array as $value) {
            $str .= "<li>$value</li>";
        }
        $str .= "</ol>";
        return $str;
    }

    function reverseIt($value)
    {
        return strrev($value);
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBE 2</title>
</head>

<body>
    <h1>SBE 2</h1>

    <h2>Problem 1</h2>
    <?php
    $cars = ["Ford", "Chevy", "Mazda", "Honda", "Lexus", "Toyota"];
    ?>
    <label for="cars">Cars</label>
    <select id="cars">
        <?php foreach ($cars as $car) {
            echo "<option>$car</option>";
        } ?>
    </select>

    <h2>Problem 2</h2>
    <?php
    function displayCarsNew($items)
    {
        $str = "<label for=\"cars\">Cars</label>";
        $str .= "<select id=\"cars\">";
        foreach ($items as $item) {
            $str .= "<option>$item</option>";
        }
        $str .= "</select>";
        return $str;
    }

    displayCarsNew($cars);
    ?>

    <h2>Problem 3</h2>

    <h2>Problem 4</h2>
    <?php
    function displayCarsRadioButtons($items)
    {
        $str = "";
        foreach ($items as $item) {
            $str .= "<input type=\"radio\" id=\"car-$item\" name=\"car\" value=\"$item\">";
            $str .= "<label for=\"car-$item\">$item</label>";
        }
        return $str;
    }
    ?>
</body>

</html>
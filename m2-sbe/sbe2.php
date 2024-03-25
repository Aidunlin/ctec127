<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBE 2</title>
</head>

<body>
    <h1>SBE 2</h1>

    <h2>Part 1</h2>
    <?php
    $food = "Ham Sandwich";
    if ($food == "Turkey Sandwich") {
        echo "Thanks for selecting a <strong>turkey sandwich</strong> from our online menu ordering system. Your sandwich will be ready for pickup in 30 minutes.";
    } else if ($food == "Ham Sandwich") {
        echo "Thanks for selecting a <strong>ham sandwich</strong> from our online menu ordering system. Your sandwich will be ready for pickup in 36 minutes.";
    } else if ($food == "Veggie Sandwich") {
        echo "Thanks for selecting our healthiest sandwich option, the <strong>veggie sandwich</strong>. It will be ready for pickup in 22 minutes.";
    } else {
        echo "<strong>I’m sorry but we did not understand your order correctly. Please go back and try again.</strong>";
    }
    ?>

    <h2>Part 2</h2>
    <?php
    $food = "Grilled Cheese Sandwich";
    switch ($food) {
        case "Turkey Sandwich":
            echo "Thanks for selecting a <strong>turkey sandwich</strong> from our online menu ordering system. Your sandwich will be ready for pickup in 30 minutes.";
            break;
        case "Ham Sandwich":
            echo "Thanks for selecting a <strong>ham sandwich</strong> from our online menu ordering system. Your sandwich will be ready for pickup in 36 minutes.";
            break;
        case "Veggie Sandwich":
            echo "Thanks for selecting our healthiest sandwich option, the <strong>veggie sandwich</strong>. It will be ready for pickup in 22 minutes.";
            break;
        default:
            echo "<strong>I’m sorry but we did not understand your order correctly. Please go back and try again.</strong>";
            break;
    }
    ?>
</body>

</html>
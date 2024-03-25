<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBE 1</title>
    
    <style>
        table {
            border-collapse: collapse;
            font-size: xx-large;
            text-align: center;
        }

        td,
        th {
            border: 1px solid;
            height: 4ch;
            width: 4ch;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h1>SBE 1</h1>

    <h2>Problem 1</h2>
    <form>
        <select name="number">
            <?php for ($i = 2; $i <= 100; $i++) { ?>
                <option><?= $i ?></option>
            <?php } ?>
        </select>
        <input type="submit">
    </form>

    <h2>Problem 2</h2>
    <?php
    $alphabet = range("a", "z");
    $i = 0;
    while ($i < count($alphabet)) {
        if ($alphabet[$i] == "q") {
            echo "<p>Thanks, I needed that break</p>";
            break;
        }
        echo $alphabet[$i];
        $i++;
    }
    ?>

    <h2>Problem 3</h2>
    <table>
        <?php for ($y = 0; $y <= 7; $y++) { ?>
            <tr>
                <?php for ($x = 0; $x <= 7; $x++) {
                    if ($x == 0 && $y == 0) {
                        echo "<th>X</th>";
                    } else if ($x == 0) {
                        echo "<th>$y</th>";
                    } else if ($y == 0) {
                        echo "<th>$x</th>";
                    } else {
                        echo "<td>" . $x * $y . "</td>";
                    }
                } ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
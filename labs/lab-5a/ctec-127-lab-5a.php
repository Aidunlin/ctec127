<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 5a - Temperature Converter</title>
</head>

<body>
    <?php
    require "functions.inc.php";

    const UNIT_SELECTIONS = [
        "celsius" => "Celsius",
        "fahrenheit" => "Fahrenheit",
        "kelvin" => "Kelvin"
    ];

    $originalTemperature = "";
    $originalUnit = "";
    $conversionUnit = "";
    $convertedTemp = "";
    ?>

    <div class="container mt-0 mt-lg-5">
        <header class="row">
            <div class="col-12 col-md-12 mx-auto text-center mb-5 p-5 bg-black text-white bg-black text-white shadow">
                <!-- Form starts here -->
                <h1 class="display-4 fw-bold">Temperature Converter</h1>
            </div>
        </header>

        <main class="row">
            <div class="col-12 col-md-12 mx-auto bg-white p-5 shadow rounded rounded-3 mb-5">
                <section class="bg-light p-3 border mb-3 shadow-sm">
                    <h2 class="border-bottom rounded-end-pill pill p-3 mb-3 shadow-sm">How to Use - Step by Step</h2>
                    <ol>
                        <li>Enter a temperature in the <span class="fw-bold">Temperature to Convert</span> field</li>
                        <li>Select <span class="fw-bold">Temperature Unit</span> from the dropdown</li>
                        <li>Select <span class="fw-bold">Convert to</span> and select which unit you want to convert the temperature to</li>
                        <li>Click the <span class="fw-bold">Convert</span> button to perform the conversion</li>
                        <li>Look in the <span class="fw-bold">Converted Temperature</span> field to see the result</li>
                    </ol>
                </section>

                <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                    <?php
                    $errors = [];

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $originalTemperature = trim($_POST["originaltemp"]);
                        $originalUnit = trim($_POST["originalunit"]);
                        $conversionUnit = trim($_POST["conversionunit"]);

                        $errors = validate($originalTemperature, $originalUnit, $conversionUnit);
                        $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);
                        if (is_numeric($convertedTemp)) $convertedTemp = round($convertedTemp, 2);
                    }
                    ?>

                    <?php if (count($errors) > 0) { ?>
                        <div class="mt-5 text-danger">
                            <span class="fw-bold h3">Errors</span>
                            <ul>
                                <?php foreach ($errors as $error) { ?>
                                    <li><?= $error ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <div class="mt-5 mb-3">
                        <label for="temp" class="form-label fw-bold h3">Temperature to Convert</label><br>
                        <input type="text" class="form-control shadow-sm" value="<?= $originalTemperature ?>" name="originaltemp" size="14" maxlength="7" id="temp">
                    </div>

                    <div class="mb-3">
                        <label for="originalunit" class="form-label h3 fw-bold">Temperature Unit</label>
                        <select name="originalunit" class="form-select shadow-sm" id="originalunit">
                            <option value="" <?= $originalUnit == "" ? "selected" : "" ?>>Make a selection</option>

                            <?php foreach (UNIT_SELECTIONS as $selection => $text) { ?>
                                <option value="<?= $selection ?>" <?= $originalUnit == $selection ? "selected" : "" ?>><?= $text ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="conversionunit" class="form-label h3 fw-bold">Unit to Convert to</label>
                        <select name="conversionunit" class="form-select shadow-sm" id="conversionunit">
                            <option value="" <?= $originalUnit == "" ? "selected" : "" ?>>Make a selection</option>

                            <?php foreach (UNIT_SELECTIONS as $selection => $text) { ?>
                                <option value="<?= $selection ?>" <?= $conversionUnit == $selection ? "selected" : "" ?>><?= $text ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Convert" class="btn btn-dark fs-3 shadow-sm">
                    </div>

                    <div class="mb-3 mt-5">
                        <label for="convertedtemp" class="form-label fw-bold h3">Converted Temperature</label><br>
                        <input type="text" class="form-control bg-light shadow-sm border-0" value="<?= $convertedTemp ?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" readonly>
                    </div>
                </form>
            </div>
        </main>

        <footer class="col-12 my-5 text-center">
            <p>&copy; 2024 by CTEC 127<br>Student Aidan Linerud</p>
        </footer>
    </div>
</body>

</html>
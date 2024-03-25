<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CTEC 127 - Project 1</title>
</head>

<body>

    <header>
        <h1>Fill out this cool form!</h1>
    </header>

    <main>
        <?php
        require "include/constants.inc.php";
        require "include/process-form.inc.php";

        $formData = [
            "first" => "",
            "last" => "",
            "email" => "",
            "phone" => "",
            "degree" => "",
            "age" => "",
            "interests" => [],
            "communication" => "",
            "questions" => "",
        ];

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $formData = get_post_data($formData);
            $errors = get_errors($formData);

            if (empty($errors)) {
                displayPostData($formData);
            } else {
                displayErrors($errors);
            }
        }
        ?>

        <form method="post" novalidate>
            <p>Fields marked with * are required.</p>

            <label>
                First Name*
                <input name="first" size="50" value="<?= $formData["first"] ?>">
            </label>

            <label>
                Last Name*
                <input name="last" size="50" value="<?= $formData["last"] ?>">
            </label>

            <label>
                Email*
                <input type="email" name="email" size="60" value="<?= $formData["email"] ?>">
            </label>

            <label>
                Phone*
                <input type="tel" name="phone" value="<?= $formData["phone"] ?>">
            </label>

            <label>
                Degree Program of Interest*
                <select name="degree">
                    <option value="" <?= $formData["degree"] == "" ? "selected" : "" ?>>-- Select --</option>

                    <?php foreach (DEGREES as $degree) { ?>
                        <option <?= $formData["degree"] == $degree ? "selected" : "" ?>><?= $degree ?></option>
                    <?php } ?>
                </select>
            </label>

            <label>
                Age*
                <select name="age">
                    <option value="" <?= $formData["age"] == "" ? "selected" : "" ?>>-- Select --</option>

                    <?php foreach (AGES as $age) { ?>
                        <option <?= $formData["age"] == $age ? "selected" : "" ?>><?= $age ?></option>
                    <?php } ?>
                </select>
            </label>

            <fieldset>
                <legend>Interests</legend>
                <?php foreach (INTERESTS as $interest) { ?>
                    <label>
                        <input type="checkbox" name="interests[]" value="<?= $interest ?>" <?= in_array($interest, $formData["interests"]) ? "checked" : "" ?>>
                        <?= $interest ?>
                    </label>
                <?php } ?>
            </fieldset>

            <fieldset>
                <legend>Preferred Communication Method*</legend>

                <?php foreach (COMM_METHODS as $method) { ?>
                    <label>
                        <input type="radio" name="communication" value="<?= $method ?>" <?= $formData["communication"] == $method ? "checked" : "" ?>>
                        <?= $method ?>
                    </label>
                <?php } ?>
            </fieldset>

            <label>
                Questions You Have*
                <textarea name="questions"><?= $formData["questions"] ?></textarea>
            </label>

            <input type="submit" value="Submit">
        </form>
    </main>

    <footer>
        <em>&copy; 2024 Aidan Linerud - CTEC 127 - Project 1</em>
    </footer>
</body>

</html>
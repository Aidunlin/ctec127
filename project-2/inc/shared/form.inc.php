<form method="post">
    <div class="mb-3">
        <label class="col-form-label" for="student_id">Student ID</label>
        <input class="form-control" type="number" id="student_id" name="student_id" value="<?= $form_data["student_id"] ?? null ?>">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="first_name">First Name</label>
        <input class="form-control" type="text" id="first_name" name="first_name" value="<?= $form_data["first_name"] ?? null ?>">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="last_name">Last Name</label>
        <input class="form-control" type="text" id="last_name" name="last_name" value="<?= $form_data["last_name"] ?? null ?>">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="gpa">GPA</label>
        <input class="form-control" type="number" id="gpa" name="gpa" step="0.01" min="0" max="4" value="<?= $form_data["gpa"] ?? null ?>">
    </div>

    <div class="mb-3">
        <label class="col-form-label" for="degree_program">Degree Program</label>
        <select class="form-select" name="degree_program" id="degree_program">
            <option value=""><?= $default_degree_label ?? "Undeclared" ?></option>
            <?php
            foreach (DEGREES as $degree) {
                if (isset($form_data["degree_program"]) && $form_data["degree_program"] == $degree) {
                    echo "<option selected>$degree</option>";
                } else {
                    echo "<option>$degree</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="col-form-label" for="graduation_date">Graduation Date</label>
        <input class="form-control" type="date" name="graduation_date" id="graduation_date" value="<?= $form_data["graduation_date"] ?? null ?>">
    </div>

    <fieldset class="mb-2">
        <legend class="col-form-label">Financial Aid</legend>
        <?php $has_financial_aid = isset($form_data["financial_aid"]) && $form_data["financial_aid"] == 1; ?>
        <div class="form-check">
            <input class='form-check-input' type='radio' name='financial_aid' id='aid-yes' value='1' <?= $has_financial_aid ? "checked" : "" ?>>
            <label class="form-label" for="aid-yes">Yes</label>
        </div>
        <div class="form-check">
            <input class='form-check-input' type='radio' name='financial_aid' id='aid-no' value='0' <?= $has_financial_aid ? "" : "checked" ?>>
            <label class="form-label" for="aid-no">No</label>
        </div>
    </fieldset>

    <div class="mb-3">
        <label class="col-form-label" for="email">Email</label>
        <input class="form-control" type="text" id="email" name="email" value="<?= $form_data["email"] ?? null ?>">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="phone">Phone</label>
        <input class="form-control" type="text" id="phone" name="phone" value="<?= $form_data["phone"] ?? null ?>">
    </div>

    <div class="mt-4 mb-3">
        <a class="btn btn-light border me-2" href="display-records.php">Cancel</a>
        <button class="btn btn-dark" type="submit"><?= $button_label ?? "Submit" ?></button>
    </div>

    <?php
    if (isset($form_data["id"]) && is_numeric($form_data["id"])) {
        echo "<input type='hidden' name='id' value='{$form_data["id"]}'>";
    }
    ?>
</form>
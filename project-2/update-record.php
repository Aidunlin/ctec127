<?php
$page_title = "Update Record";
$button_label = "Update";
require_once "inc/layout/header.inc.php";
?>

<main class="container">
    <div class="row justify-content-center my-5">
        <div class="col-12 col-lg-6">
            <h2 class="alert alert-primary"><?= $page_title ?></h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $id = trim($_GET["id"] ?? "");
                if (!is_numeric($id)) {
                    header("Location: display-records.php?error=No record id was specified.");
                }

                $form_data = select_record(intval($id));
                if (!$form_data) {
                    header("Location: display-records.php?error=Could not find a record with id '$id'.");
                }
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                $result = get_record_form_data(true);
                $form_data = $result["data"];
                $errors = $result["errors"] ?? null;

                if (empty($errors) && $form_data) {
                    $successful = update_record($form_data);
                    if ($successful) {
                        header("Location: display-records.php?message=The record for {$form_data["first_name"]} has been updated.");
                    }

                    echo "<div class='alert alert-danger' role='alert'>I am sorry, but I could not update that record for you.</div>";
                } else {
                    display_error_bucket($errors);
                }
            }

			// Any data in $form_data will be used to pre-populate the form.
            require_once "inc/shared/form.inc.php";
            ?>
        </div>
    </div>
</main>

<?php require_once "inc/layout/footer.inc.php"; ?>
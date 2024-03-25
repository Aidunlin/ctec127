<?php
$page_title = "Create Record";
$button_label = "Create";
require_once "inc/layout/header.inc.php";
?>

<main class="container">
	<div class="row justify-content-center my-5">
		<div class="col-12 col-lg-6">
			<h2 class="alert alert-primary"><?= $page_title ?></h2>
			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$result = get_record_form_data();
				$form_data = $result["data"];

				if (isset($result["errors"])) {
					display_error_bucket($result["errors"]);
				} else {
					$successful = insert_record($form_data);
					if ($successful) {
						header("Location: display-records.php?message=The record for {$form_data["first_name"]} has been created.");
					}

					echo "<div class='alert alert-danger' role='alert'>I am sorry, but I could not save that record for you.</div>";
				}
			}

			// Any data in $form_data will be used to pre-populate the form.
			require_once "inc/shared/form.inc.php";
			?>
		</div>
	</div>
</main>

<?php require_once "inc/layout/footer.inc.php"; ?>
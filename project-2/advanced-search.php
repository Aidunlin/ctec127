<?php
// We will store search form data in the user session,
// so navigating through sorts/pages won't reset the form.
session_start();

$page_title = "Advanced Search";
$default_degree_label = "Any";
$button_label = "Search";
require_once "inc/layout/header.inc.php";
?>

<main class="container-xxl">
	<div class="row my-5">
		<div class="col-12 col-md-3">
			<h2 class="alert alert-primary"><?= $page_title ?></h2>
			<?php
			// If the reset form was submitted, clear the search data in the user session.
			if (isset($_POST["reset"])) {
				unset($_SESSION["advanced_search"]);
			}

			// There are two ways that the search form can be pre-populated.

			$form_was_submitted = $_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["reset"]);
			$search_session_data_exists = isset($_SESSION["advanced_search"]);

			if ($form_was_submitted) {
				// Get the search fields from the submitted form.
				$form_data = get_advanced_search_data($_POST);

				// Save the form data to the user session.
				$_SESSION["advanced_search"] = $form_data;
				$search_session_data_exists = true;
			} elseif ($search_session_data_exists) {
				// Get the search fields from the user session.
				$form_data = get_advanced_search_data($_SESSION["advanced_search"]);
			}

			// Only accessible after submitting the form.
			if ($search_session_data_exists) {
				display_reset_form();
			}

			// Display the search form. Any data in $form_data will be used to pre-populate the form.
			require_once "inc/shared/form.inc.php";
			?>
		</div>
		<div class="col-12 col-md-9">
			<?php
			if (isset($form_data)) {
				$params = get_display_records_parameters();
				$result = select_records($params, $form_data);
				$total = $result["total"];
				$records = $result["records"];

				display_records_count($total);
				if ($records) {
					display_records_sort_controls($params);
					display_records_pagination($params, $total);
					display_records_table($records, $params);
					display_records_pagination($params, $total);
				}
			} else {
				echo "<p class='alert alert-info'>Search results will appear here.</p>";
			}
			?>
		</div>
	</div>
</main>

<?php require_once "inc/layout/footer.inc.php"; ?>
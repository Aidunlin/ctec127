<?php require_once "inc/app/app.inc.php"; ?>

<!-- Setting margin top to auto keeps the footer at the bottom of the viewport. -->
<footer class="bg-body-secondary mt-auto py-3">
    <div class="container-xxl">
        <?php
        if (APP_STATUS == "Production") {
            display_production_footer();
        } else {
            display_development_footer();
        }
        ?>
    </div>
</footer>

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
$category ??= "";
$search ??= "";
?>

<nav class="navbar navbar-expand-md bg-body-tertiary" aria-label="Site navigation">
    <div class="container-fluid container-xxl">
        <a class="navbar-brand" href="amazon.php">MOCKAZON</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <form class="d-flex ms-auto flex-column mt-2 mt-md-0 flex-sm-row" role="search">
                <select name="category" aria-label="Category" class="form-select w-auto text-capitalize">
                    <option value="">Any category</option>
                    <?php foreach (CATEGORIES as $value) {
                        $selected = $value == $category ? " selected" : "";
                        $label = str_replace("-", " ", $value);
                        echo "<option value='$value'$selected>$label</option>\n";
                    } ?>
                </select>
                <input type="search" name="q" placeholder="Search" aria-label="Search" value="<?= $search ?>" class="form-control">
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </div>
</nav>
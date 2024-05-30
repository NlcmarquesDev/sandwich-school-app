<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');

var_dump($_SESSION['order']);
?>

<h1>Choose your ingredients</h1>
<p>Choose 3 ingredients. </p>
<p>From the 3rd ingredient onwards, you pay the value of each ingredient.</p>
<div class="container px-4 py-5">
    <form action="/broodjes_app/order" method="POST">
        <div class="col">
            <div class="row">
                <?php foreach ($ingredients as $ingredient) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 text-center ">
                        <img src="<?= $ingredient['image'] ?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

                        <h4 class="fw-normal my-2"><?= $ingredient['name'] ?></h4>
                        <p><?= $ingredient['price'] ?>&euro; </p>
                        <input type="checkbox" name="ingredients[]" value="<?= $ingredient['id'] ?>">
                    </div>

                <?php endforeach ?>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">

            <a href="/broodjes_app/brood" class="btn btn-primary">Previus</a>
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </form>
</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
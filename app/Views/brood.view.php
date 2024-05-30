<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');
?>

<h1>Welcome to brood shop</h1>
<div class="container px-4 py-5">
    <div class="col">
        <div class="row">
            <?php foreach ($breads as $bread) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 text-center ">
                    <img src="<?= $bread['image'] ?>" class="bd-placeholder-img rounded-circle" width="140" height="140">

                    <h4 class="fw-normal my-2"><?= $bread['type'] ?></h4>
                    <form action="/broodjes_app/beleg" method="POST">
                        <input type="hidden" name="brood" value="<?= $bread['id'] ?>">
                        <button type="submit" class="btn btn-secondary btn-sm" href="#">Choose</button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
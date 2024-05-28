<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');

?>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="./public/images/broodje1.jpg" class="d-block mx-lg-auto img-fluid border rounded-3 shadow-lg mb-4" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Welcome to School Sandwich Hub! <?= isset($title) ? $title : '' ?></h1>
            <p class="lead">Hungry? Order your favorite sandwiches right from our app! We provide a convenient way for students to browse, customize, and order delicious sandwiches for delivery straight to school. With a variety of fresh ingredients and mouth-watering options, you'll always find something to satisfy your cravings.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="/broodjes_app/dashboard" class="btn btn-primary btn-lg px-4 me-md-2">Menu</a>
                <?php else : ?>
                    <a href="/broodjes_app/login" class="btn btn-primary btn-lg px-4 me-md-2">Login</a>
                    <a href="/broodjes_app/register" class="btn btn-outline-secondary btn-lg px-4">Sign-up</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
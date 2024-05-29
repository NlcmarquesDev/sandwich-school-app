<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');
?>

<div class="container px-4 py-5">

    <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">


        <div class="col">
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <h1>Welcome to checkout Page... you can pay!!!</h1>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between">

        <a href="/broodjes_app/beleg" class="btn btn-primary">Previus</a>
        <!-- <a href="/broodjes_app/pay" class="btn btn-primary">Next</a> -->
    </div>
</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
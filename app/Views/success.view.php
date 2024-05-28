<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');

?>

<div class="container my-5">
    <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">

        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
        </svg>
        <div class="alert alert-<?= $color ?> m-5 " role="alert">
            <h1 class="text-body-emphasis"><?= $msg ?></h1>
        </div>
        <a href="/broodjes_app/login" class="btn btn-primary btn-lg px-5 mb-3" type="button">
            <?= $msgBtn ?>
        </a>
    </div>
</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
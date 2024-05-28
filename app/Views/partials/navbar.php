<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/broodjes_app/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="./public/images/vdab-logo.png" alt="" width="75" height="50">
            </a>
        </div>
        <div class="col-md-3 text-end">
            <?php if (isset($_SESSION['user'])) : ?>
                <div class="d-flex justify-content-center align-items-center gap-4 ">

                    <p class="my-auto">Welcome, <span class="fw-bolder text-uppercase"><?= $_SESSION['user']['name'] ?></span></p>
                    <a href="/broodjes_app/logout" type="button" class="btn btn-primary">logout</a>
                </div>
            <?php else : ?>
                <a href="/broodjes_app/login" type="button" class="btn btn-outline-primary me-2">Login</a>
                <a href="/broodjes_app/register" type="button" class="btn btn-primary">Sign-up</a>


            <?php endif ?>
        </div>
    </header>
</div>
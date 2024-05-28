<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');

?>

<div class="container px-4 py-5">
    <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
        <div class="col d-flex flex-column align-items-start gap-2">
            <h4 class="text-body-secondary fst-italic fw-bold">"Never miss out on your favorite sandwich – order now and enjoy a tasty meal every day!"</h4>
        </div>

        <div class="col">
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <main class="form-signin w-100 m-auto">
                    <form method="POST" action="/broodjes_app/forgotpassword">
                        <h1 class="h3 mb-3 fw-normal">Reset Password</h1>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control mb-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <?php if (isset($errors)) : ?>
                            <div class="alert alert-danger fw-light fs-6 " role="alert">
                                <?= isset($errors['email']) ? $errors['email'] : '' ?>
                            </div>
                        <?php endif  ?>

                        <button class="btn btn-primary w-100 py-2" type="submit">Reset Password</button>

                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
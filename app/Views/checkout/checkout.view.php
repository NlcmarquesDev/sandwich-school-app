<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');
$orders = $_SESSION['order'];
// dd($orders);
?>

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill"><?= count($orders) ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($orders as $key => $order) : ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0 mb-1">Product name</h6>
                                <span class="text-body-secondary">Bread - </span>
                                <small class="text-body-secondary"> <?= $order['brood']['type'] ?></small>
                                <br />

                                <span class="text-body-secondary fs-7"> 1 X &euro;<?= $pricebread[$key] ?> </span>

                                <br />
                                <span class="text-body-secondary ">Ingredients -</span>
                                <?php foreach ($order['ingredients'] as $ingredient) : ?>
                                    <small class="text-body-secondary"> <?= $ingredient['name'] ?>,</small>
                                <?php endforeach ?>
                                <br />
                                <span class="text-body-secondary fs-7"> <?= count($order['ingredients']) . ' X &euro;  = &euro;' . $totalPriceIngredients[$key]  ?> </span>
                            </div>
                            <span class="text-body-secondary">&euro;<?= $totalPriceSandwish[$key] ?></span>
                        </li>

                    <?php endforeach ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (&euro;)</span>
                        <strong>&euro;<?= $total ?></strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" action="/broodjes_app/validation-order" method="POST">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="<?= $_SESSION['user']['name'] ?>" disabled>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="<?php echo $emailUser['email'] ?>" disabled>
                        </div>
                        <hr class="my-4">
                        <h4 class="mb-3">Payment</h4>
                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" value="payed" type="radio" class="form-check-input" checked required>
                                <label class="form-check-label" for="credit">Payed</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" value="later" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="debit">Pay later</label>
                            </div>
                        </div>
                        <hr class="my-4">
                        <input type="hidden" name="totalPrice" value="<?= $total ?>">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </main>


</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
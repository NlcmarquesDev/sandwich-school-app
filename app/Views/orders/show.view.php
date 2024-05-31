<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');

?>

<h1>Orders</h1>

<div class=" container table-responsive small">
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">Order Number</th>
                <th scope="col">Date</th>
                <th scope="col">Bread</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Payed</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)) : ?>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['orders_created_at'] ?></td>
                        <td><?= $order['bread_type'] ?></td>
                        <td><?= $order['ingredient_names'] ?></td>
                        <td><span class="badge text-bg-<?= $order['payment'] === 'payed' ? 'success' : 'danger' ?> "><?= $order['payment'] ?></span></td>
                        <td>&euro; <?= $order['total_price'] ?></td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center fw-bolder"> No order at this moment</td>
                </tr>
            <?php endif ?>

        </tbody>
    </table>
</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>
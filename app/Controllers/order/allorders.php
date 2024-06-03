<?php

use App\Models\Orders;

$order = new Orders();

$orders = $order->getAllOrdersByUser($_SESSION['user']['id']);

// dd($orders);
view('/orders/show', [
    'orders' => $orders
]);

<?php

use App\Models\Orders;

$order = new Orders();

$data = [
    'id' => $_SESSION['user']['id'],
    'total_price' => $_POST['totalPrice'],
    'payment_done' => $_POST['paymentMethod'],
    'order' => $_SESSION['order']
];

$order->create($data);

view('/success', [
    'msg' => 'Your order is added successfully',
    'msgBtn' => 'Home page',
    'color' => 'success'
]);

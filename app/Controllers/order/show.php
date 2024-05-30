<?php

use App\Core\Database;

$db = new Database();

$emailUser = $db->query('SELECT email FROM users WHERE id=:id', [
    ':id' => $_SESSION['user']['id'],
])->find();



$breadPrice = [];
for ($i = 0; $i < count($_SESSION['order']); $i++) {
    $breadPriceUnit = $db->query('SELECT price FROM bread_types WHERE type=:type', [
        ':type' => $_SESSION['order'][$i]['brood'],
    ])->find();
    array_push($breadPrice, $breadPriceUnit);
}


view('/checkout/checkout', ['emailUser' => $emailUser, 'breadPrice' => $breadPrice]);

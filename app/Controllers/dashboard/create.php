<?php

use App\Core\Database;

$_SESSION['breadcrumbs'] = [
    'brood' => [
        'page' => true,
        'class' => false
    ],
    'beleg' => [
        'page' => true,
        'class' => true
    ],
    'checkout' => [
        'page' => false,
        'class' => false
    ],
];
$_SESSION['orderNumber'] = $_SESSION['orderNumber'] ? $_SESSION['orderNumber'] : 1;

if (isset($_POST['brood']) && $_POST['brood']) {

    $_SESSION['order'][$_SESSION['orderNumber']] = [
        'brood' => $_POST['brood'],
    ];
}

$ingredients = (new Database)->query('SELECT * FROM ingredients')->findAll();


view('/beleg', ['ingredients' => $ingredients]);

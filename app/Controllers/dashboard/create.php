<?php

use App\Models\Bread;
use App\Models\Ingredient;

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
$breads = new Bread();
$ingredient = new Ingredient();

$_SESSION['orderNumber'] = $_SESSION['orderNumber'] ?? 0;
// $_SESSION['orderNumber'] = $_SESSION['orderNumber'] ? $_SESSION['orderNumber'] : 0;


if (isset($_POST['brood']) && $_POST['brood']) {
    $bread = $breads->getById($_POST['brood']);
    $_SESSION['order'][$_SESSION['orderNumber']] = [
        'brood' => $bread,
    ];
}

$ingredients = $ingredient->getAll();


view('/beleg', ['ingredients' => $ingredients]);

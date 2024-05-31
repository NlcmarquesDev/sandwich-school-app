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
if (empty($_SESSION['orderNumber'])) {
    $_SESSION['orderNumber'] = 0;
} else {
    $_SESSION['orderNumber'] = $_SESSION['orderNumber'];
}
// $_SESSION['orderNumber'] = $_SESSION['orderNumber'] ? $_SESSION['orderNumber'] : 0;


if (isset($_POST['brood']) && $_POST['brood']) {
    $bread = (new Database)->query('SELECT * FROM bread_types WHERE id=:id', [':id' => $_POST['brood']])->find();
    $_SESSION['order'][$_SESSION['orderNumber']] = [
        'brood' => $bread,
    ];
}

$ingredients = (new Database)->query('SELECT * FROM ingredients')->findAll();


view('/beleg', ['ingredients' => $ingredients]);

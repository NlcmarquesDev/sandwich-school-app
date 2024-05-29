<?php

use App\Core\Database;


$_SESSION['breadcrumbs'] = [
    'brood' => [
        'page' => true,
        'class' => true
    ],
    'beleg' => [
        'page' => false,
        'class' => false
    ],
    'checkout' => [
        'page' => false,
        'class' => false
    ],
];


$breads = (new Database)->query('SELECT * FROM bread_types')->findAll();

if (isset($_GET['new'])) {
    $_SESSION['orderNumber']++;
}



view('/brood', [
    'breads' => $breads
]);

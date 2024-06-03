<?php

use App\Models\Bread;
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



$breads = new Bread();
$allBreads = $breads->getAll();

if (isset($_GET['new'])) {
    $_SESSION['orderNumber']++;
}



view('/brood', [
    'breads' => $allBreads
]);

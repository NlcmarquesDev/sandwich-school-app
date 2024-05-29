<?php


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

view('/beleg');

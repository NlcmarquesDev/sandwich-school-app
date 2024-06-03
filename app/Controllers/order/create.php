<?php

use App\Models\Ingredient;

$ingredients = new Ingredient();

if (isset($_POST['ingredients'])) {
    $ingredientsData = [];
    for ($i = 0; $i < count($_POST['ingredients']); $i++) {
        $ingreds = $ingredients->getById($_POST['ingredients'][$i]);
        array_push($ingredientsData, $ingreds);
    }


    $_SESSION['order'][$_SESSION['orderNumber']] = [...$_SESSION['order'][$_SESSION['orderNumber']], 'ingredients' => $ingredientsData];
}

view('/checkout/order');

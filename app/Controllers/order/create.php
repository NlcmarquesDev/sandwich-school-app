<?php

use App\Core\Database;

if (isset($_POST['ingredients'])) {
    $ingredientsData = [];
    for ($i = 0; $i < count($_POST['ingredients']); $i++) {
        $ingredients = (new Database)->query("SELECT * FROM ingredients WHERE id = :id", [':id' => $_POST['ingredients'][$i]])->find();

        // dd($ingredients);
        array_push($ingredientsData, $ingredients);
    }
    // dd($ingredientsData);

    $_SESSION['order'][$_SESSION['orderNumber']] = [...$_SESSION['order'][$_SESSION['orderNumber']], 'ingredients' => $ingredientsData];
}

// dd($_SESSION['order']);
view('/checkout/order');

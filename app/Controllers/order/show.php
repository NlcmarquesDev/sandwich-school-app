<?php

use App\Models\User;
use App\Models\Orders;

$user = new User();
$order = new Orders();

$emailUser = $user->getById($_SESSION['user']['id']);


//criar o total valor dos ingredientes

// $totalIngredientesPorSand=[
//     '0'=>[$valor Total de ingredientes],
//     '1'=>[$valor Total de ingredientes],

// ]
// $totalPriceIgredientPerSandwish = $order->totalPriceIngredientsPerSandwish($_SESSION['order']);
//Cria o total por cada sandwish
// pegar no valor da sande e somar por cada index respectivo de cada totalIngredientes
$totalPriceIgredientPerSandwishArray = [];
$getPriceBreadArray = [];
$totalPriceSandwiahArray = [];

for ($i = 0; $i < count($_SESSION['order']); $i++) {
    // dd($_SESSION['order'])[$i];
    $totalPriceSandwish = $order->totalPricePerSandwish($_SESSION['order'][$i]);
    $getPriceBread = $order->getPriceBreadPerSandwish($_SESSION['order'][$i]);
    $totalPriceIgredientPerSandwish = $order->totalPriceIngredientsPerSandwish($_SESSION['order'][$i]);
    array_push($totalPriceSandwiahArray, $totalPriceSandwish);
    array_push($getPriceBreadArray, $getPriceBread);
    array_push($totalPriceIgredientPerSandwishArray, $totalPriceIgredientPerSandwish);
}

//criar o valor total da ordem
//pegar to total de cada sandwish e somar todos os index.

$totalPriceOrder = array_sum($totalPriceSandwiahArray);



view('/checkout/checkout', [
    'emailUser' => $emailUser,
    'totalPriceSandwish' => $totalPriceSandwiahArray,
    'pricebread' => $getPriceBreadArray,
    'totalPriceIngredients' => $totalPriceIgredientPerSandwishArray,
    'total' => $totalPriceOrder
]);

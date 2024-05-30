<?php

use App\Core\Database;
use App\Models\Orders;

$db = new Database();

$emailUser = $db->query('SELECT email FROM users WHERE id=:id', [
    ':id' => $_SESSION['user']['id'],
])->find();


//criar o total valor dos ingredientes

// $totalIngredientesPorSand=[
//     '0'=>[$valor Total de ingredientes],
//     '1'=>[$valor Total de ingredientes],

// ]
$totalPriceIgredientPerSandwish = (new Orders())->totalPriceIngredientsPerSandwish($_SESSION['order']);
dd($totalPriceIgredientPerSandwish);
//Cria o total por cada sandwish
// pegar no valor da sande e somar por cada index respectivo de cada totalIngredientes


//criar o valor total da ordem
//pegar to total de cada sandwish e somar todos os index.




view('/checkout/checkout', ['emailUser' => $emailUser]);

<?php

use App\Models\Orders;

$order = new Orders();


$totalPrice = $order->totalPriceOrder();
$data = [
    'id' => $_SESSION['user']['id'],
    'total_price' => $totalPrice,
    'order' => $_SESSION['order']
];

dd($data);
// Informcao para a order ser feita
// $data = [
//     'id' => $_SESSION['user']['id'],
//     'total_price' => $totalPrice,
//     'order'=>[
//         0 =>[
//             'brood'=> [ toda a informacao do brood],
//             'ingredients' => [
//                 0 =>[toda a informcao do ingrediente],
//                 1 =>[toda a informacao do ingrediente],
//                 2 =>[toda a informacao do ingrediente],
//                 3 =>[toda a informacao do ingrediente],
//                 4 =>[toda a informacao do ingrediente],
//             ],
//         ],
//         1 =>[
//             'brood'=> [ toda a informacao do brood],
//             'ingredients' => [
//                 0 =>[toda a informcao do ingrediente],
//                 1 =>[toda a informacao do ingrediente],
//                 2 =>[toda a informacao do ingrediente],
//                 3 =>[toda a informacao do ingrediente],
//                 4 =>[toda a informacao do ingrediente],
//             ],
//         ],
//     ]
// ]

$order->create($data);



view('/success', [
    'msg' => 'Your order is added successfully',
    'msgBtn' => 'menu',
    'color' => 'success'
]);

<?php

use App\Core\Database;

$token = $_GET["token"];


$checkToken = (new Database)->query('SELECT  * FROM users WHERE account_activation_hash = :account_activation_hash', [
    'account_activation_hash' => $token
])->find();

if (empty($checkToken)) {
    return view('/success', [
        'msg' => 'Token not found ',
        'msgBtn' => 'Login',
        'color' => 'danger'
    ]);
}

$tokenUpdateToNull = (new Database)->query('UPDATE users SET account_activation_hash = null WHERE id=:id', [
    ':id' => $checkToken['id']
]);

view('/success', [
    'msg' => 'Your account is now activated',
    'msgBtn' => 'Login',
    'color' => 'success'
]);
// 1716892750
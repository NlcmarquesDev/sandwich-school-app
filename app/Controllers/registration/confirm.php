<?php

use App\Models\Login;

$login = new Login();

$token = $_GET["token"];


$checkToken = $login->confirmToken($token);

if (empty($checkToken)) {
    return view('/success', [
        'msg' => 'Token not found ',
        'msgBtn' => 'Login',
        'color' => 'danger'
    ]);
}

$tokenUpdateToNull = $login->tokenUpdateToNull($checkToken['id']);

view('/success', [
    'msg' => 'Your account is now activated',
    'msgBtn' => 'Login',
    'color' => 'success'
]);

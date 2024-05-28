<?php

use App\Core\Database;

$token = $_GET["token"];


$checkToken = (new Database)->query('SELECT  * FROM users WHERE reset_token_hash = :reset_token_hash', [
    'reset_token_hash' => $token
])->find();

if (empty($checkToken) || strtotime($checkToken['reset_token_expire_at']) <= time()) {
    return view('/success', [
        'msg' => 'Token not found or token is expired ',
        'msgBtn' => 'Login',
        'color' => 'danger'
    ]);
}

$tokenUpdateToNull = (new Database)->query('UPDATE users SET reset_token_hash = null, reset_token_expire_at =null  WHERE id=:id', [
    ':id' => $checkToken['id']
]);

view('/success', [
    'msg' => 'New Password was restore successfully',
    'msgBtn' => 'Login',
    'color' => 'success'
]);

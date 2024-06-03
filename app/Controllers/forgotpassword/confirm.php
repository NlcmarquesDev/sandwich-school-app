<?php

use App\Models\User;

$token = $_GET["token"];

$users = new User();

$checkToken = $users->getResetTokenHash($token);

if (empty($checkToken) || strtotime($checkToken['reset_token_expire_at']) <= time()) {
    return view('/success', [
        'msg' => 'Token not found or token is expired ',
        'msgBtn' => 'Login',
        'color' => 'danger'
    ]);
}

$tokenUpdateToNull = $users->updateResetTokenHash($checkToken['id']);

view('/success', [
    'msg' => 'New Password was restore successfully',
    'msgBtn' => 'Login',
    'color' => 'success'
]);

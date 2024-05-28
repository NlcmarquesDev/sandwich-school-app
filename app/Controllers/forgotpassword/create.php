<?php

use App\Core\Mailer;
use App\Core\Database;
use App\Core\ValidateForm;

$db = new Database();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        //tratar da validacao
        if (!ValidateForm::email($_POST['email'])) {
            $errors['email'] = 'Please provide a valid email adress.';
        }
        if (empty($db->query('SELECT email FROM users WHERE email = :email', [
            'email' => $_POST['email'],
        ])->find())) {
            $errors['email'] = 'This email doesn\'t exists.';
        };
    } else {
        $errors['email'] = 'Please insert all the fields';
    }


    if (!empty($errors)) {
        return view('/forgotpassword', [
            'errors' => $errors
        ]);
    }

    //generate a new reset token for a password
    $resetToken = generateToken();
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
    $newPass = generatePassword();
    $pass = password_hash($newPass, PASSWORD_DEFAULT);
    $activationToken = generateToken();


    // chamar a base de dados
    $db->query('UPDATE users SET password = :password, temp_pass =:temp_pass, reset_token_hash=:reset_token_hash, reset_token_expire_at= :reset_token_expire_at  , account_activation_hash = :account_activation_hash WHERE email=:email', [
        'email' => htmlspecialchars($_POST['email']),
        'password' => $pass,
        'temp_pass' => $newPass,
        'reset_token_hash' => $resetToken,
        'reset_token_expire_at' => $expiry,
        'account_activation_hash' => $activationToken
    ]);

    //Criar o email de verificaçao

    $mail = new Mailer();

    try {
        $mail->buildEmail('noreply@gmail.com', $_POST['email']);
        $mail->forResetPassword(['newPass' => $newPass, 'resetToken' => $resetToken]);
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->errors()}";
    }


    view('/success', [
        'msg' => 'New Password send successfully',
        'msgBtn' => 'Login',
        'color' => 'success'
    ]);
}

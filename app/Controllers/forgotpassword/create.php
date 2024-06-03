<?php

use App\Core\Mailer;
use App\Models\User;
use App\Core\ValidateForm;

$users = new User();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        //tratar da validacao
        if (!ValidateForm::email($_POST['email'])) {
            $errors['email'] = 'Please provide a valid email adress.';
        }
        if (empty($users->getUserByEmail($_POST['email']))) {
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


    $users->updateUserForForgetPassword($_POST['email'], $pass, $newPass, $resetToken, $expiry, $activationToken);


    //Create Mail for verification

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

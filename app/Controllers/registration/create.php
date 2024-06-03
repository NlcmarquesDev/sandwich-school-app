<?php

use App\Core\Mailer;
use App\Models\User;
use App\Core\Database;
use App\Core\ValidateForm;

$db = new Database();
$user = new User();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['name'])) {
        //tratar da validacao

        if (!ValidateForm::string($_POST['name'])) {
            $errors['name'] = 'Please insert a name between 3 and 255 characters';
        }
        if (!ValidateForm::email($_POST['email'])) {
            $errors['email'] = 'Please provide a valid email adress.';
        }

        if (!empty($user->getUserByEmail($_POST['email']))) {
            $errors['email'] = 'This email already exists.';
        };
    } else {
        $errors['email'] = 'Please insert all the fields';
    }


    if (!empty($errors)) {
        return view('/register', [
            'errors' => $errors
        ]);
    }
    //caso seja correcto, criar uma notificacao

    $newPass = generatePassword();
    $pass = password_hash($newPass, PASSWORD_DEFAULT);
    $activationToken = generateToken();


    // chamar a base de dados
    $user->createUser($_POST['name'], $_POST['email'], $pass, $newPass, $activationToken);


    $mail = new Mailer();

    try {
        $mail->buildEmail('noreply@gmail.com', $_POST['email']);
        $mail->forValidateRegistration(['password' => $newPass, 'token' => $activationToken]);
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent . Mailer Error : ' . $mail->errors();
    }


    view('/success', [
        'msg' => 'Signup successful, Please verify your email address',
        'msgBtn' => 'Login',
        'color' => 'success',
    ]);
}

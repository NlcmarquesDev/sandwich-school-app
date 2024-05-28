<?php

use App\Core\Mailer;
use App\Core\Database;
use App\Core\ValidateForm;

$db = new Database();

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

        if (!empty($db->query('SELECT email FROM users WHERE email = :email', [
            'email' => $_POST['email'],
        ])->find())) {
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
    $db->query('INSERT INTO users (name,email, password, temp_pass, account_activation_hash) VALUES(:name, :email, :password, :temp_pass,:account_activation_hash)', [
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'password' => $pass,
        'temp_pass' => $newPass,
        'account_activation_hash' => $activationToken
    ]);


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

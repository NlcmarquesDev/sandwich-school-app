<?php

use App\Core\Database;
use App\Core\ValidateForm;

$db = new Database();
// dd($_POST);
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


    // chamar a base de dados
    $db->query('INSERT INTO users (name,email, password, temp_pass) VALUES(:name, :email, :password, :temp_pass)', [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $pass,
        'temp_pass' => $newPass
    ]);


    view('/success', [
        'msg' => 'Login made with success',
        'msgBtn' => 'Login'
    ]);

    // Enviar e-mail com a senha gerada
    // $emailSent = sendEmail(
    //     $_POST['email'],
    //     'Sua nova conta foi criada',
    //     "Olá " . $_POST['name'] . ",\n\nSua conta foi criada com sucesso. Aqui estão suas credenciais:\n\nEmail: " . $_POST['email'] . "\nSenha: " . $newPass . "\n\nPor favor, altere sua senha após o primeiro login.\n\nAtenciosamente,\nEquipe"
    // );

    // if ($emailSent) {
    //     echo "Registro concluído com sucesso! Verifique seu e-mail para a senha.";
    // } else {
    //     echo "Registro concluído, mas ocorreu um erro ao enviar o e-mail.";
    // }



    //fazer a verificacao por email

    // so depois do email verificado ai sim pode ir para a zona dos alunos



}

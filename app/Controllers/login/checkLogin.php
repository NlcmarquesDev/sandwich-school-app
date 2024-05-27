<?php

use App\Core\ValidateForm;
use App\Core\Authentication;

$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        //tratar da validacao

        if (!ValidateForm::email($_POST['email'])) {
            $errors['email'] = 'Please provide a valid email adress.';
        }
    }
}





// checkar a pssword se esta correcta
$auth = new Authentication();
$login = $auth->attempt($_POST['email'], $_POST['password']);
if ($login) {

    //buscra todas as notas referentes a este usuario
    // redirect('/notes');
    view('/brood');


    // verificar se já fez a validacao do email , da confirmacao do email

    //caso tenha feito validar e rederecionar para a pagina principal do aluno
}

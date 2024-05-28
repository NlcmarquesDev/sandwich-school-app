<?php

use App\Core\ValidateForm;
use App\Core\Authentication;

// $errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Reset the password
    if (isset($_POST['forgot']) && (int) $_POST['forgot'] === 1) {
        redirect('/broodjes_app/forgotpassword');
    }


    if (isset($_POST['email']) && isset($_POST['password'])) {
        //tratar da validacao

        if (!ValidateForm::email($_POST['email'])) {
            $_SESSION['errors'] = 'Invalid login';
        }
        // checkar a pssword se esta correcta
        $auth = new Authentication();
        $login = $auth->attempt($_POST['email'], $_POST['password']);
        if ($login) {


            view('/brood');
        } else {
            $_SESSION['errors'] = 'Invalid login';
            $_SESSION['oldEmail'] = $_POST['email'];
        }
    } else {
        $_SESSION['oldEmail'] = $_POST['email'];
        $_SESSION['errors'] = 'Please insert all the fields';
    }
}

if (isset($_SESSION['errors'])) {
    redirect('/broodjes_app/login');
}

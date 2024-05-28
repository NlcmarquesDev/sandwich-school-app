<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}


function view($view, $params = [])
{
    extract($params);
    include(BASE_PATH . 'app/Views' . $view . '.view.php');
    return $params;
}

function generatePassword($lenghtPassword = 4)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $pass = '';
    for ($i = 0; $i < $lenghtPassword; $i++) {

        $randNumber = rand(0, 62);
        $pass .= $characters[$randNumber];
    }
    return $pass;
}

function redirect($path)
{
    header('location: ' . $path);
    exit();
}

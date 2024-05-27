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

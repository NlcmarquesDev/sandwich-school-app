<?php
$_SESSION['order'][$_SESSION['orderNumber']] = [...$_SESSION['order'][$_SESSION['orderNumber']], 'ingredients' => $_POST['ingredients']];



view('/checkout/order');

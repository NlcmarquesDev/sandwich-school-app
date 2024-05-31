<?php

use App\Core\Database;

$db = new Database();

$orders = $db->query("SELECT
o.id AS order_id,
o.created_at AS orders_created_at,
o.payment_done AS payment,
u.name AS user_name,
s.id AS sandwich_id,
b.type AS bread_type,
GROUP_CONCAT(i.name SEPARATOR ', ') AS ingredient_names,
o.total_price
FROM
orders o
JOIN
users u ON o.user_id = u.id
JOIN
sandwiches s ON o.id = s.order_id
JOIN
bread_types b ON s.bread_id = b.id
JOIN
sandwich_ingredients si ON s.id = si.sandwich_id
JOIN
ingredients i ON si.ingredient_id = i.id
WHERE
u.id = :user_id
GROUP BY
o.id,o.created_at,o.payment_done , u.name, s.id, b.type, o.total_price", [
    ':user_id' => $_SESSION['user']['id'],
])->findAll();

// dd($orders);
view('/orders/show', [
    'orders' => $orders
]);

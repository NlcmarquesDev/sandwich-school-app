<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Orders
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM orders")->findAll();
    }
    public function getById(int $id)
    {
        return $this->db->query("SELECT * FROM orders WHEREid=:id", [':id' => $id])->find();
    }

    public function create(array $data)
    {
        $order = $this->db->query("INSERT INTO orders (user_id, total_price)  VALUES (:user_id, :total_price)", [':user_id' => $data['id'], ':total_price' => $data['total_price']]);

        $lastId = $order->lastInsertId('orders');

        for ($i = 0; $i < count($data['']); $i++) {
        };

        $sandwish = $this->db->query('INSERT INTO sandwiches (order_id, bread_id) VALUES (:order_id, :bread_id)', ['order_id' => $lastId, 'bread_id' => '']);


        dd($lastId);
    }

    public function getPriceBreadPerSandwish($sandwish)
    {
        return $sandwish['brood']['price'];
    }

    public function totalPriceIngredientsPerSandwish($order)
    {

        $totalPriceIgredientPerSandwish = 0;

        $ingredients = $order['ingredients'];
        for ($j = 0; $j < count($ingredients); $j++) {
            $totalPriceIgredientPerSandwish += $ingredients[$j]['price'];
        }

        return  $totalPriceIgredientPerSandwish;
    }


    public function totalPricePerSandwish($sandwish)
    {
        $getPriceBread = $this->getPriceBreadPerSandwish($sandwish);
        $totalPriceIgredientPerSandwish = $this->totalPriceIngredientsPerSandwish($sandwish);
        $totalPricePerSandwish = $getPriceBread + $totalPriceIgredientPerSandwish;


        return $totalPricePerSandwish;
    }

    public function totalPriceOrder()
    {
        $totalPrice = 10;

        return $totalPrice;
    }
}

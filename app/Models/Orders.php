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
        $order = $this->db->query("INSERT INTO orders (user_id, total_price, payment_done)  VALUES (:user_id, :total_price, :payment_done)", [':user_id' => $data['id'], ':total_price' => $data['total_price'], ':payment_done' => $data['payment_done']]);

        $lastId = $order->lastInsertId('orders');

        for ($i = 0; $i < count($data['order']); $i++) {
            $breadPrice = $data['order'][$i]['brood']['price'];
            $bread_id = $data['order'][$i]['brood']['id'];
            $sandwish = $this->db->query('INSERT INTO sandwiches (order_id, bread_id, price) VALUES (:order_id, :bread_id, :price)', [':order_id' => $lastId, ':bread_id' => $bread_id, ':price' => $breadPrice]);

            $lastIdSandwish = $order->lastInsertId('sandwiches');
            // dd($lastIdSandwish);
            // dd($data['order'][$i]['ingredients']);

            for ($j = 0; $j < count($data['order'][$i]['ingredients']); $j++) {

                $ingredients = $this->db->query('INSERT INTO sandwich_ingredients (sandwich_id, ingredient_id, price) VALUES (:sandwish_id, :ingredinet_id,:price)', [
                    ':sandwish_id' => $lastIdSandwish,
                    ':ingredinet_id' => $data['order'][$i]['ingredients'][$j]['id'],
                    ':price' => $data['order'][$i]['ingredients'][$j]['price'],
                ]);
            }
        };
        unset($_SESSION['order']);
        unset($_SESSION['orderNumber']);
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
}

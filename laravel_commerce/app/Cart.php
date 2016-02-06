<?php
/**
 * Created by PhpStorm.
 * User: highor
 * Date: 31/01/16
 * Time: 13:29
 */

namespace CodeCommerce;


class Cart
{
    private $items;

    public function __contruct()
    {
        $this->items = [

        ];
    }

    public function add($id, $name, $price)
    {
        //id -> qtd, price, name
        $this->items + [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name,

            ]
        ];

    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;

        foreach($this->items as $items)
        {
            $total += $items['qtd'] * $items['price'];
        }
        return $total;
    }
    //add
    //remove
    //all
    //getTotal



}
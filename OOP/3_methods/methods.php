<?php
/*
Реализуйте в классе Shop\Cart следующие методы:

    add - для добавления товаров в корзину
    count - для получения количества товаров в корзине
    total - для получения общей суммы товаров в корзине
    remove - для удаления товара из корзины по id
    clear - для очистки корзины

Пример:

use Shop\Cart;

$cart = new Cart();

$cart->add(new Item(1, "milk", 5))
$cart->add(new Item(2, "water", 2));

$cart->count(); // 2
$cart->total(); // 7

$cart->remove(2);

$cart->count(); // 1
$cart->total(); // 5

$cart->clear();

$cart->count(); // 0
$cart->total(); // 0

*/

namespace Shop;

class Cart
{
    private $items = [];

    // BEGIN
    public function add(Item $item)
    {
        $this->items[] = $item;
    }

    public function count()
    {
        return count($this->items);
    }

    public function total()
    {
        return array_reduce($this->items, function ($sum, $item) {
            return $sum + $item->price;
        }, 0);
    }

    public function remove($id)
    {
        $this->items = array_values(array_filter($this->items, function (Item $item) use ($id) {
            return $id !== $item->id;
        }));
    }

    public function clear()
    {
        $this->items = [];
    }
    // END
}


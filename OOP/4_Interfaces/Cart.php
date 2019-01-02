<?php
/*
В PHP есть множество встроенных интерфейсов. Они позволяют добавить в класс дополнительные возможности. Примерами таких интерфейсов являются Countable и IteratorAggregate.

Чтобы реализовать интерфейс Countable, нужно в класе определить метод count. Тогда объекты этого класса можно передавать в качестве аргумента функции count и sizeof.

Пример использования интерфейса Countable:

namespace App;

class SomeClass implements \Countable
{
  public function count()
  {
    return 10;
  }
}

$object = new SomeClass();

count($object); // 10

Объект, реализовавший IteratorAggregate, может быть использован в цикле foreach. Для этого необходимо определить метод getIterator и вернуть в нем внутренний итератор.

Пример использования интерфейса IteratorAggregate:

namespace App;

class MyClass implements \IteratorAggregate
{
  private $innerArray = ['foo', 'bar', 'baz'];

  public function getIterator()
  {
    return new \ArrayIterator($this->innerArray);
  }
}

$object = new MyClass();

foreach ($object as $value) {
  echo $value;
}
// foobarbaz

Cart.php

Реализуйте в классе Cart методы, определенные в интерфейсах \Countable и \IteratorAggregate. Метод count() должен возвращать число товаров в корзине. Кроме того, если передать объект корзины в конструкцию foreach, то должны перечислиться все товары, находящиеся в ней.

Пример использования:

use Shop\Cart;

$cart = new Cart();

$cart->add(new Item(1, "milk", 5))
$cart->add(new Item(2, "water", 2));

// Вызов функции `count` или `sizeof` на объекте корзины должен вернуть количество товаров в ней
count($cart); // 2

// При использовании корзины в `foreach` должны перечисляться товары в корзине
foreach ($cart as $item) {
  echo "id: " . $item->id . ", name: " . $item->name . ", price: " . $item->price . PHP_EOL;
}
// id: 1, name: milk, price: 5
// id: 2, name: water, price: 2

$cart->remove(2);

count($cart); // 1

$cart->clear();

count($cart); // 0


*/
<?php

namespace Shop;

class Cart implements \Countable, \IteratorAggregate
{
    private $items = [];

    public function add(Item $item)
    {
        $this->items = array_merge($this->items, [ $item ]);
    }

    // BEGIN (write your solution here)
    public function count()
  {
    return count($this->items);
  }


    public function getIterator()
  {
    return new \ArrayIterator($this->items);
  }
    // END

    public function total()
    {
        return array_reduce($this->items, function ($sum, $item) {
            return $sum + $item->price;
        }, 0);
    }

    public function remove($id)
    {
        $this->items = array_filter($this->items, function (Item $item) use ($id) {
            return $id !== $item->id;
        });
    }

    public function clear()
    {
        $this->items = [];
    }
}


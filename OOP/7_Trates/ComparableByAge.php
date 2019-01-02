<?php
/*

В этом упражнении нужно реализовать трейт ComparableByAge. Он полезен в случае, когда у нас есть класс сущностей, имеющих возраст, и нам нужно производить сравнения по возрасту.

Трейт требует реализовать функцию compare в классе, куда его подмешивают. Эта функция сравнивает переданный аргумент (того же типа) с текущим объектом. И работает так:

    Если текущий объект старше переданного, то функция возвращает 1.
    Если текущий объект младше переданного, то функция возвращает -1.
    Функция возвращает 0 в случае, если объекты одного возраста.

Функция compare - это все, что требует ComparableByAge от классов. На основе этой функции можно реализовать множество полезных методов.

Пример использования:

$user1 = new User(20);
$user2 = new User(30);

$user2->isOlderThan($user1); // true
$user1->isYoungerThan($user2); // true
$user1->isAgeTheSame($user2); // false

$car1 = new Car('bmw', 1985);
$car2 = new Car('lexus', 2000);

$car2->isOlderThan($car1); // false
$car1->isYoungerThan($car2); // false
$car1->isAgeTheSame($car2); // false

ComparableByAge.php

Реализуйте трейт ComparableByAge.
User.php

Реализуйте функцию compare.
Car.php

Реализуйте функцию compare.

*/

namespace App;

trait ComparableByAge
{
    abstract public function compare($entity);

    // BEGIN (write your solution here)
    public function isOlderThan($entity)
    {
        $result = ($this->compare($entity)==1)? true : false;
        return $result;
    }

     public function isYoungerThan($entity)
    {
        $result = ($this->compare($entity)==-1)? true : false;
        return $result;
    }

     public function isAgeTheSame($entity)
    {
        $result = ($this->compare($entity)==0)? true : false;
        return $result;
    }
    // END
}


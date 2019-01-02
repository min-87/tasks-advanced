<?php
/*
Создайте класс-обертку над ассоциативным массивом. Назовите его DynamicProps. Он должен принимать в конструктор ассоциативный массив.

    Реализуйте доступ к значениям этого массива через __get.
    Реализуйте установку значений через __set.
    Реализуйте проверку на существования ключа через __isset.
    Реализуйте удаление ключа через __unset.

При попытке обратиться через __set или __get к динамическому свойству, для которого нет ключа в массиве, необходимо выбрасывать исключение DynamicPropsUndefinedProp.
*/

namespace App;

require_once "DynamicPropsUndefinedProp.php";

// BEGIN (write your solution here)
class DynamicProps
{
    private $map=[];

	// КОНСТРУКТОР!!
    function __construct($map)
    {
        $this->map=$map;
    }


    function __get($key)
    {
        if (!array_key_exists($key, $this->map)){
            throw new DynamicPropsUndefinedProp("Key! {$key} doesn't exist");
        }
        return $this->map[$key];
    }

    function __set($key, $value)
    {
        if (!array_key_exists($key, $this->map)){
            throw new DynamicPropsUndefinedProp("Key {$key} doesn't exist");
        }
        $this->map[$key]=$value;
    }

    function __isset($key)
    {
        return array_key_exists($key, $this->map);
    }

    function __unset($key)
    {
        unset($this->map[$key]);
    }

}
// END

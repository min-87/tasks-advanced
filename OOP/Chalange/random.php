<?php

/*
Реализуйте генератор рандомных чисел представленный классом Random. Класс должен удовлетворять интерфейсу RandomInterface.

Пример использования:

  $seq = new Random(100);
  $result1 = $seq->getNext();
  $result2 = $seq->getNext();

  $this->assertNotEquals($result1, $result2);

  $seq->reset();

  $result21 = $seq->getNext();
  $result22 = $seq->getNext();

  $this->assertEquals($result1, $result21);
  $this->assertEquals($result2, $result22);

Простейший способ реализовать случайные числа это линейный конгруэнтный метод.

*/

//Variant 1
namespace App;

require_once 'RandomInterface.php';

class Random implements RandomInterface
{
    // BEGIN (write your solution here)
    const a=3;
    const c=5;
    const m=13;

    private $seed;
    private $nextNumber;

    public function __construct ($seed)
    {
        $this->nextNumber=$this->seed = $seed;
    }

    public function getNext()
    {
        $this->nextNumber=(self::a * $this->nextNumber + self::c) % self::m;
        return $this->nextNumber;
    }

    public function reset()
    {
        $this->nextNumber=$this->seed;
    }
    // END
}



//Variant 2

    // BEGIN
    protected $seed;
    protected $init;

    public function __construct($seed)
    {
        $this->seed = $seed;
        $this->init = $seed;
    }

    public function reset()
    {
        $this->seed = $this->init;
    }

    public function getNext()
    {
        $a = 45;
        $c = 21;
        $m = 67;

        $this->seed = ($a * $this->seed + $c) % $m;

        return $this->seed;
    }
    // END


<?php

namespace App;

class Car
{
    use ComparableByAge;

    private $year;
    private $brand;

    public function __construct($brand, $year)
    {
        $this->year = $year;
        $this->brand = $brand;
    }

    public function getYear()
    {
        return $this->year;
    }

    // BEGIN (write your solution here)
     public function compare($entity)
    {
        if ($this->year < $entity->year) { return 1;}
        elseif ($this->year > $entity->year) { return -1;}
        elseif ($this->year = $entity->year) { return 0;}
    }
    // END
}


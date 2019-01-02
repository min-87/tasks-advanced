<?php

namespace App;

require_once "ComparableByAge.php";

class User
{
    use ComparableByAge;

    private $age;

    public function __construct($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    // BEGIN (write your solution here)
    public function compare($entity)
    {
        if ($this->age > $entity->age) { return 1;}
        elseif ($this->age < $entity->age) { return -1;}
        elseif ($this->age = $entity->age) { return 0;}
    }
    // END
}


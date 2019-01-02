<?php
/*
Реализуйте функцию findIndexOfNearest, которая принимает на вход массив чисел и искомое число. Задача функции — найти в массиве ближайшее число к искомому и вернуть его индекс в массиве.

<?php

findIndexOfNearest([], 2); // => null
findIndexOfNearest([15, 10, 3, 4], 0); // => 2

*/

// Variant 1

namespace App\Arrays;

// BEGIN (write your solution here)
function findIndexOfNearest($arr, $num)
{
    if (empty($arr)) { return null;}
    $difference = array_map(function ($user) use ($num) { 
        return abs($num - $user);
        }, $arr);
    $result = array_search(min($difference), $difference);
    return $result;
}
// END


//Variant 2

// BEGIN
function findIndexOfNearest(array $items, $value)
{
    if (sizeof($items) === 0) {
        return null;
    }
    return array_reduce(array_keys($items), function ($acc, $i) use ($items, $value) {
        return abs($items[$i] - $value) < abs($items[$acc] - $value) ? $i : $acc;
    }, 0);
}
// END


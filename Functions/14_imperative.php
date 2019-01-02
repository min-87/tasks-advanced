<?php
//Реализуйте функцию getDifference, которая принимает на вход два массива, а возвращает массив, составленный из элементов первого, которых нет во втором.

namespace App\Arrays;

// BEGIN (write your solution here)
function getDifference($arr1, $arr2)
{
    $result =[];
    foreach ($arr1 as $value){
        if (!in_array($value, $arr2)){
            $result[]=$value;
        }
    }
    return $result;
}
// END

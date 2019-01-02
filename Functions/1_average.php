<?php
/*
Реализуйте функцию average, которая возвращает среднее арифметическое всех переданных аргументов. Функция принимает на вход от одного числа и больше.

<?php

average(0); // => 0
average(0, 10); // => 5
average(-3, 4, 2, 10); // => 3.25


*/



namespace App\Math;

// BEGIN (write your solution here)
function average($num, ...$numbers)
{
    $sum = $num + array_sum($numbers);
    $size = 1+sizeof($numbers);
    $result = $sum/$size;
    return $result;
}
// END

<?php
/*
Реализуйте функцию union, которая находит объединение всех переданных массивов. Функция принимает на вход от одного массива и больше. Ключи не сохраняются.

<?php

union([3]); // => [3]
union([3, 2], [2, 2, 1]); // => [3, 2, 1]
union(['a', 3, false], [true, false, 3], [false, 5, 8]); // => ['a', 3, false, true, 5, 8]

*/


namespace App\Arrays;

function union($first, ...$rest)
{
    // BEGIN (write your solution here)
   $result = array_values(array_unique(array_merge($first, ...$rest)));
   return $result;
    // END
}

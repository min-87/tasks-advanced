<?php
/*

ЗАМЫКАНИЯ

Реализуйте функцию without, которая работает по такому же принципу, что и функция из теории, кроме одного аспекта. Эта функция должна принимать любое число аргументов, где все аргументы кроме первого, элементы, которые нужно исключить из исходного массива.

<?php

without([3, 4, 10, 4, 'true'], 4); // => [3, 10, 'true']
without(['3', 2], 0, 5, 11); // => ['3', 2]
*/

// BEGIN (write your solution here)
function without($coll, ...$args)
{
    $filtered = array_filter($coll, function($item) use ($args){
        return !in_array($item, $args);
    });
    return array_values($filtered);
}
// END

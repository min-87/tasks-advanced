<?php
/*
Реализуйте функцию getChildren, которая принимает на вход список пользователей и возвращает плоский список их детей. Дети каждого пользователя хранятся в виде массива в ключе children
*/

namespace App\Users;

use function \Funct\Collection\flatten;

// BEGIN (write your solution here)
function getChildren($users)
{
    return flatten(array_map(function($users) {
        return $users['children'];
    }, $users));
}
// END

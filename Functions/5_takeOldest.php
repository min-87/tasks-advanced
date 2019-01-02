<?php

/*
Реализуйте функцию takeOldest, которая принимает на вход список пользователей и возвращает самых
 взрослых. Количество возвращаемых пользователей задается вторым параметром, который по-умолчанию равен единице.

<?php
$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27']
];

takeOldest($users);
# => Array (
#   ['name' => 'Rob', 'birthday' => '1975-01-11']
# )

Подсказки

    Для преобразования даты в unixtimetamp используйте функцию strtotime
    firstN
    usort
*/

//Variant 1

namespace App\Users;

use function \Funct\Collection\firstN;

// BEGIN (write your solution here)
function takeOldest($users, $n=1)
{    
    // алгоритм сортировки
    $cmp = function ($a, $b) {
         if ($a['birthday'] === $b['birthday']) {
         return 0;
    }
    return strtotime($a['birthday']) > strtotime($b['birthday']) ? 1 : -1;
    };
    usort($users, $cmp);
    // выборка первых элементов в коллекции
    $result=firstN($users, $n);
    return $result;
}

// END

//Variant 2

// BEGIN
function takeOldest(array $users, int $count = 1)
{
    usort($users, function ($user1, $user2) {
        return strtotime($user1['birthday']) >= strtotime($user2['birthday']) ? 1 : -1;
    });

    return firstN($users, $count);
}
// END

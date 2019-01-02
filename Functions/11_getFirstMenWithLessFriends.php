<?php
/*

Реализуйте функцию getFirstMenWithLessFriends, которая принимает список пользователей и возвращает первого пользователя у которого меньше всего друзей. Если список пользователей пустой, то возвращается null.

<?php

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

getFirstMenWithLessFriends($users);
// => ['name' => 'Bronn', 'friends' => []];

*/

<?php

namespace App\Users;

use Funct\Collection;

// BEGIN (write your solution here)
function getFirstMenWithLessFriends($users)
{
    if (empty($users)) { return null;}
    $result = Collection\minValue($users, function($item) {
        return count($item['friends']);
    });
    return $result;
}
// END

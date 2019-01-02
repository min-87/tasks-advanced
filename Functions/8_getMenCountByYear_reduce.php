<?php
/*
Реализуйте функцию getMensCountByYear, которая принимает на вход список пользователей и возвращает массив, в котором ключ это год рождения, а значение это количество мужчин, родившихся в этот год.

<?php

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Jon', 'gender' => 'male', 'birthday' => '1980-11-03'],
    ['name' => 'Robb','gender' => 'male', 'birthday' => '1980-05-14'],
    ['name' => 'Tisha', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Rick', 'gender' => 'male', 'birthday' => '2012-11-03'],
    ['name' => 'Joffrey', 'gender' => 'male', 'birthday' => '1999-11-03'],
    ['name' => 'Edd', 'gender' => 'male', 'birthday' => '1973-11-03']
];

getMensCountByYear($users);
# => Array (
#     1973 => 3,
#     1963 => 1,
#     1980 => 2,
#     2012 => 1,
#     1999 => 1
# );

*/

// Variant 1

namespace App\Users;

// BEGIN (write your solution here)
function getMensCountByYear($users)
{
    // men
    $men = array_filter($users, function($user){        
        return $user['gender']=='male';
    });
    // result
    $result = array_reduce($men,function($acc, $user){
        $key = date('Y', strtotime($user['birthday']));
        if (!array_key_exists($key, $acc)){
            $acc[$key]=0;
        }
        $acc[$key]+=1;
        return $acc;
    },[] );
    return $result;
}
// END

// Variant 2

// BEGIN
function getMensCountByYear(array $users)
{
    $menfolk = array_filter($users, function ($user) {
        return $user['gender'] === 'male';
    });

    $years = array_map(function ($user) {
        return date('Y', strtotime($user['birthday']));
    }, $menfolk);

    return array_reduce($years, function ($acc, $year) {
        if (!array_key_exists($year, $acc)) {
            $acc[$year] = 1;
        } else {
            $acc[$year] += 1;
        }

        return $acc;
    }, []);
}
// END

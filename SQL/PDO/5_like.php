<?php
/*
file: Solution.php

Реализуйте функцию like, которая принимает на вход pdo и массив. Строит запрос по данным из массива, выполняет его и возвращает данные в формате PDO::FETCH_COLUMN. Запрос должен возвращать id из таблицы users. У массива структура следующая: 1) ключ - это название поля; 2) значение - это часть запроса, которую нужно использовать в like выражении. Лайки из этого массива нужно соединять с помощью OR. Если массив пустой, то запрос должен выполнять следующий sql: select id from users.

Пример:

$pdo->exec("create table users (id integer, first_name string, email string)");
$pdo->exec("insert into users values (1, 'john', 'john@gmail.com')");
$pdo->exec("insert into users values (3, 'adel', 'adel@yahoo.org')");

$params = ['email' => '%gmail%', 'first_name' => 'ad%'];

[1, 3] == like($pdo, $params); // select id from users where email LIKE ? OR first_name LIKE ?


*/

namespace App\Solution;

function like($pdo, array $params)
{
    	//Variant 1
	// BEGIN (write your solution here)

    $likeParts = array_reduce(array_keys($params), function ($acc, $item) {
        $acc[] = "$item LIKE ?";
        return $acc;
    }, []);
    $sqlParts = [];
    $sqlParts[] = "select id from users";
    if (!empty($likeParts)) {
        $sqlParts[] = "where";
        $sqlParts[] = implode(" OR ", $likeParts);
    }
    $sql = implode(" ", $sqlParts);
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array_values($params));

    return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    
    
    // END    


	//Variant 2 (dont work)
    // BEGIN (write your solution here)

    // построение запроса ч.1
    function buildWhere ($params)
    {
     $partsWhere = array_map(function($key, $value) {
     return "$key LIKE $value";
     }, array_keys($params), $params);
     return implode('OR', $partsWhere);
    }

    // построение запроса ч.2
    function toSql($params)
    {
       $sqlParts = [];
       $sqlParts[] = "SELECT id FROM users";
        if ($params) {
            $where = buildWhere($params);
            $sqlParts[] = "WHERE $where";
        }

        return implode(' ', $sqlParts);
    }  

    // выполнение запроса и возвращение данных
    function getLike($pdo, array $params)
    {
        $stmt=$pdo->query(toSql($params));
        var_dump(toSql($params));
        var_dump($stmt);
        //$stmt->execute();
        $result=$stmt->fetchAll(\PDO::FETCH_COLUMN);
        var_dump($result);
        return $result;
    }   


    return getLike($pdo, $params);
    // END
}


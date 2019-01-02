<?php

/*
Реализуйте функцию where, которая принимает на вход соединение с базой данных и массив описывающий условия выборки. Функция должна вернуть список идентификаторов пользователей отсортированных по возрастанию.

Пример:

where($pdo, []); // select id from users order by id
where($pdo, ['id' => []]); // select id from users order by id

// select id from users where first_name in ('john', 'adel')
where($pdo, ['first_name' => ['john', 'adel']])

// select id from users where first_name = 'ada' or source in ('bing', 'gmail')
where($pdo, ['first_name' => 'ada', 'source' => ['bing', 'gmail']])

*/

namespace App\Solution;

function where($pdo, array $params)
{
        // BEGIN
    $whereParts = array_reduce(
        array_keys($params),
        function ($acc, $key) use ($pdo, $params) {
            $values = (array) $params[$key];
            if ($values) {
                $in = array_map(function ($item) use ($pdo) {
                    return $pdo->quote($item);
                }, $values);
                $joinedIn = implode(", ", $in);
                $acc[] = "$key IN ($joinedIn)";
            }
            return $acc;
        },
        []
    );

    $where = $whereParts ? 'WHERE ' . implode(' OR ', $whereParts) : '';
    $query = sprintf("SELECT id FROM users %s ORDER BY id", $where);
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    // END
}


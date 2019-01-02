<?php
/*
Реализуйте интерфейс App\DDLManagerInterface в классе App\DDLManager

Пример использования:

$dsn = 'sqlite::memory:';
$ddl = new DDLManager($dsn);

$ddl->createTable('users', [
    'id' => 'integer',
    'name' => 'string'
]);

Получившийся запрос в базу:

CREATE TABLE users (
    id integer,
    name string
);

*/

<?php

namespace App;

class DDLManager implements DDLManagerInterface
{
    private $pdo;

    // BEGIN (write your solution here)
     function __construct ($dsn, $user = null, $pass = null)
    {        
        $opt = array (\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION);
        $this->pdo = new \PDO($dsn, $user, $pass, $opt);
    }

    public function createTable($table, array $params)
    {
        $fieldPars = array_map(function ($key, $param) {
            return "{$key} {$param}";}, array_keys($params), $params);
        $fieldDescription=implode(", ", $fieldPars);
        $sql=sprintf("Create Table %s (%s)", $table, $fieldDescription);
        return $this->pdo->exec($sql);
    }


    // END

    public function getConnection()
    {
        return $this->pdo;
    }
}

<?php

/*

BaseModel - это класс, реализующий логику взаимодействия с базой данных. От него могут наследоваться классы нашей предметной области. В данном примере это User, Member и Teacher. В BaseModel определен статический метод getTableName, который возвращает имя таблицы для хранения экземпляров текущего класса вашего приложения. Вычисляется он по следующим правилам:

    Если задано статическое свойство $tableName, то возвращается его значение.
    В противном случае берется имя класса (без неймспейса) и приводится к нижнему регистру.

file: BaseModel.php

    Необходимо реализовать статический метод getTableName.


*/

//Variant 1

namespace App;

class BaseModel
{
    // BEGIN (write your solution here)
    static function getTableName()
    {
        if (isset(static::$tableName)) {
            $name = static::$tableName;
        } else {
            $path = explode('\\', static::class);
            $name= strtolower(array_pop($path));
            
        }
        return $name;
    }
    // END
}



//Variant 2

 // BEGIN
    public static $tableName = null;

    public static function getTableName()
    {
        return static::$tableName ? static::$tableName : self::tableize(get_called_class());
    }

    public static function tableize($className)
    {
        $parts = explode('\\', $className);
        $lastPart = end($parts);
        return strtolower($lastPart);
    }
    // END




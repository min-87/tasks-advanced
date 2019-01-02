<?php

/*
file: Repository.php

    Реализуйте динамические методы findAllBy<FieldName>.
    Название MyFieldNameId должно преобразовываться в my_field_name_id.
    Методы должны возвращать sql запрос. Используйте метод where, уже написанный для Repository.
    Бросайте исключение WrongFinderNameException, если название метода не соответствует шаблону /findAllBy([A-Z].*)/.

Подсказки

    Для работы с регулярными выражениями используйте функцию preg_match_all.
*/


<?php

namespace App;

require_once "RepositoryInterface.php";
require_once "WrongFinderNameException.php";

class Repository implements RepositoryInterface
{
    // BEGIN (write your solution here)
    private $tableName;

    public function __construct($tableName)
    {
        $this->tableName=$tableName;
    }

   public function __call($finder, $arguments)
    {
        //Бросайте исключение WrongFinderNameException, если название
        // метода не соответствует шаблону /findAllBy([A-Z].*)/.
        preg_match("/findAllBy([A-Z].*)/", $finder, $outputArray);
        // сработает, если массив пустой
        if (!$outputArray) {
            throw new WrongFinderNameException();
        }

        //Название MyFieldNameId должно преобразовываться в
        // my_field_name_id.
        $fieldUpperName = $outputArray[1];
        //MyFieldNameId кусочки ищутся по регулярному выражению
        preg_match_all("/([A-Z][^A-Z]+)/", $fieldUpperName, $matches);
        $fieldName = implode('_', array_map(function ($part) {
            return mb_strtolower($part);
        }, $matches[0]));

        return $this->where($fieldName, $arguments[0]);
    }
    // END

    public function where($fieldName, $value)
    {
        $format = "select * from %s where %s = '%s'";
        return sprintf(
            $format,
            $this->_escape($this->tableName),
            $this->_escape($fieldName),
            $this->_escape($value)
        );
    }

    private function _escape($value)
    {
        // NOTE: we must to implement escape logic over here in real world
        return $value;
    }
}


<?php
/*
file: Markdown.php

    Создайте класс Markdown.
    Создайте у класса константу OUTPUT_FORMAT со значением html.
    Создайте метод getOutputFormat, который возвращает значение константы.

*/
namespace App;

class Markdown
{
    // BEGIN (write your solution here)
    const OUTPUT_FORMAT ='html';

    public function getOutputFormat()
    {
        return self::OUTPUT_FORMAT;
    }
    // END
}

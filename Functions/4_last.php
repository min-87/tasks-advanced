<?php
/*
Реализуйте анонимную функцию, которая принимает на вход строку и возвращает ее последний символ (или null если строка пустая). Запишите созданную функцию в переменную $last.
*/
namespace App\Strings;

function run(string $text)
{
    // BEGIN (write your solution here)
    if ($text === "") {return null; }
    $last = function($sentence)
    {       
        return $sentence[strlen($sentence) - 1];
    };
    // END

    return $last($text);
}

<?php

/*
Реализуйте функцию getSentenceType, которая принимает на вход текст, определяет его тип и возвращает наружу его название. Тип предложения определяется по последнему символу в тексте.

    ? - question
    ! - shouting
    Все остальное - common

Если передана пустая строчка, то функция должна вернуть null.

<?php

getSentenceType(''); // => null;
getSentenceType('what?'); // => question
getSentenceType('wow!'); // => shouting
getSentenceType('haha'); // => common

Подсказки

    Funct\Strings\right
*/
//Variant 1
namespace App\Strings;
use Funct;

// BEGIN (write your solution here)
function  getSentenceType($text)
{
    if ($text == "") {
        return null;
    }
    $last = Funct\Strings\right($text,1);
    switch ($last){
        case "?":
            return "question";
        case "!":
            return "shouting";
        default:
            return "common";
    }
}
// END

//Variant 2

// BEGIN
function getSentenceType($sentence)
{
    if ($sentence === '') {
        return null;
    }

    $types = [
        '?' => 'question',
        '!' => 'shouting'
    ];
    $symbol = \Funct\Strings\right($sentence, 1);
    return array_key_exists($symbol, $types) ? $types[$symbol] : 'common';
}
// END


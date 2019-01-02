<?php

//Реализуйте функцию sayPrimeOrNot, которая проверяет переданное число на простоту и печатает на экран yes или no.

namespace App\Prime;

// BEGIN (write your solution here)
function sayPrimeOrNot($num)
{
    for ($i=2; $i<$num/2; $i+=$i+1){
        if ($num%$i==0){
        return print_r('no');
        }    
    }
    return print_r('yes');
}
// END

<?php

//Написать функцию, которая принимает на вход число, а затем возвращает
//булевский ответ – простое ли оно.

function isSimple(int $number): bool
{
    $checkedNumber = $number - 1;
    if($number === 1){
        return false;
    } else {
        while($checkedNumber > 1) {
            if($number % $checkedNumber == 0) {
                return false;
            }
            $checkedNumber--;
        }
    }
    return true;
}

echo var_dump(isSimple(1));

//можно оптимизировать квадратным корнем
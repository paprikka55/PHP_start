<?php
//6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
//22 часа 15 минут
//21 час 43 минуты.

//$n % 10;
/*
0 часов	минут	10 часов минут 20 часов минут	30 минут  40 минут
1 час	минута	11 часов минут 21 час	минута	31 минута 41 минута
2 часа	минуты	12 часов минут 22 часа	минуты	32 минуты 42 минуты
3 часа	минуты	13 часов минут 23 часа	минуты	33 минуты 43 минуты
4 часа	минуты	14 часов минут 24 часа	минуты	34 минуты 44 минуты
5 часов	минут	15 часов минут 25		минут	35 минут  45 минут
6 часов	минут	16 часов минут 26		минут	36 минут  46 минут
7 часов минут	17 часов минут 27		минут	37 минут  47 минут
8 часов	минут	18 часов минут 28		минут	38 минут  48 минут
9 часов минут	19 часов минут 29		минут	39 минут  49 минут
*/

function getEnding(int $value, bool $isHour): string
{
    $forHour = [" ", "а ", "ов "];
    $forMinute = ["а ", "ы ", " "];
    $chosen = [];
    if($isHour){
        $chosen = $forHour;
    } else {
        $chosen = $forMinute;
    }
    switch($value % 10){
        case 1:
            if($value == 11){
                return $chosen[2];
            }
            return $chosen[0];
            break;
        case 2:
        case 3:
        case 4:
            if($value >= 12 && $value <= 14){
                return $chosen[2];
            } else {
                return $chosen[1];
            }
            break;
        default:
            return $chosen[2];
    }
}

function showTimeAsString(int $hours, int $minutes): string
{
    $result = "";
    $result .= $hours . " час";
    $result .= getEnding($hours, true);
    $result .= $minutes . " минут";
    $result .= getEnding($minutes, false);
    return $result;
}

echo showTimeAsString(21, 43);

<?php
//5. *С помощью рекурсии организовать функцию возведения числа в степень. Формат:
//function power($val, $pow), где $val – заданное число, $pow – степень.




function power($val, $pow): float|string{
    if($pow == 0){
        return "Невозможно возвести в степень 0";
    }
    if($pow == 1){
        return $val;
    }
    return $val * power($val, $pow - 1);
}

echo power(2,3) . PHP_EOL;
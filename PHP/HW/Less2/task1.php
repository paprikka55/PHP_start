<?php

//1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа,
// третий – операция. Обязательно использовать оператор return.

//2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
// где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
// В зависимости от переданного значения операции выполнить одну из арифметических операций
// (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).


function add(float $agr1, float $arg2): float {
    return $agr1 + $arg2;
}
function sub(float $agr1, float $arg2): float {
    return $agr1 - $arg2;
}

function multi(float $agr1, float $arg2): float
{
    return $agr1 * $arg2;
}
function div(float $arg1, float $arg2): float|string
{
    if ($arg2 === 0.0) {
        return "Ошибка! Недопустимый элемент 0 - на ноль делить нельзя!";
    }
    return $arg1 / $arg2;
}

function mathOperation($arg1, $arg2, $operation): float|string
{
    return match ($operation) {
        "+" => add($arg1, $arg2),
        "-" => sub($arg1, $arg2),
        "*" => multi($arg1, $arg2),
        "/" => div($arg1, $arg2),
    };
}

echo mathOperation(4, 25, "/");
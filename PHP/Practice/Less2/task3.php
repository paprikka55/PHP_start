<?php

/*
 * Задание 3
В функцию передается строка скобок. Например:
Надо на выходе показать, корректна ли последовательность
*/

function checkCorrectHooks(string $inputString): bool
{
    $openHook = false;
    $hookCount = 0;
    for ($i = 0; $i < strlen($inputString); $i++) {
        if ($inputString[$i] == ")") {
            if (!$openHook) {
                return false;
            } else {
                if ($hookCount > 0) {
                    $hookCount--;
                } else {
                    $openHook = false;
                }
            }
        } else if ($inputString[$i] == "(") {
            if ($openHook) {
                $hookCount++;
            } else {
                $openHook = true;
            }
        }
    }
    if ($openHook || $hookCount > 0) {
        return false;
    }
    return true;
}

var_dump(checkCorrectHooks("(()())"));

function checkCorrectHooks2(string $inputString): bool
{
    $hooksCount = 0;
    for ($i = 0; $i < strlen($inputString); $i++) {
        if ($inputString[$i] == ")") {
            if ($hooksCount == 0) {
                return false;
            } else {
                $hooksCount--;
            }
        } else if ($inputString[$i] == "(") {
            $hooksCount++;
        }
    }
    return $hooksCount === 0;
}

var_dump(checkCorrectHooks2("(()())"));

// last time 2:40
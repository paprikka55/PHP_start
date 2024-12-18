<?php

//Задание 1
//Даны два упорядоченных массива, например,
//[1, 4, 6, 6, 8]
//[2, 5, 7, 9]
//Нужно написать логику, которая сольёт массивы в один упорядоченный по
//возрастанию значений
//[1, 2, 4, 5, 6, 6, 7, 8, 9]
//Важно учесть граничные условия:
//- элементы могут повторяться
//- массивы могут быть произвольной длины

$arr1 = [1, 4, 6, 6, 8];
$arr2 = [2, 5, 7, 9];

function mergeTwoArrays(array $arr1, array $arr2) : array
{
    $result = array_merge($arr1, $arr2);
    asort($result);
    return $result;
}

function arrayToString(array $arr1) : string
{
    $result = "";
    foreach (array_keys($arr1) as $key) {
        $result .= $arr1[$key]." ";
    }
    return $result;
}

function mergeArrays(array $arr1, array $arr2) : array
{
    $result = [];
    foreach ($arr1 as $value) {
        $result[] = $value;
    }
    foreach ($arr2 as $value) {
        $result[] = $value;
    }
    asort($result);
    return $result;
}



echo arrayToString(mergeTwoArrays($arr1, $arr2)) . PHP_EOL;
echo arrayToString(mergeArrays($arr1, $arr2)) . PHP_EOL;
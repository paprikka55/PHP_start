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

$arr1 = [1, 4, 6, 6, 8, 10, 11];
$arr2 = [2, 5, 7, 9];
$result1 = [];
$count1 = 0;
$count2 = 0;

while($count1 < count($arr1) && $count2 < count($arr2)) {
    if($arr1[$count1] < $arr2[$count2]) {
        $result1[] = $arr1[$count1];
        $count1++;
    } else {
        $result1[] = $arr2[$count2];
        $count2++;
    }
}
if($count1 < count($arr1)) {
    while($count1 < count($arr1)) {
        $result1[] = $arr1[$count1];
        $count1++;
    }
}

if($count2 < count($arr2)) {
    while($count2 < count($arr2)) {
        $result1[] = $arr2[$count2];
        $count2++;
    }
}
print_r($result1);

$result = [];
while(count($arr1) > 0 || count($arr2) > 0) {
    if(count($arr1) > 0 && count($arr2) > 0) {
        if($arr1[0] > $arr2[0]) {
            $result[] = array_shift($arr2);
        } else {
            $result[] = array_shift($arr1);
        }
    } else {
        if(count($arr1) != 0){
            while (count($arr1) > 0) {
                $result[] = array_shift($arr1);
            }
        } else {
            while(count($arr2) > 0) {
                $result[] = array_shift($arr2);
            }
        }
    }





}
print_r($result);
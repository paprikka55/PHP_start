<?php
$abc = true;
if ($abc){
    echo 'stop';
} else {
    echo 'start';
}

//Тернарный

$message = ($abc) ? 'stop'.'\r\n' :'start'.'\r\n';

function never(): bool
{
    return false;
}

$arr = [1, 2, 3, 4, 5];
$ind = 0;

while($ind < count($arr)){
    echo $arr[$ind].' ';
    $ind++;
}


<?php
//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
//буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

$alfabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

function isUpper(string $str): bool {
    return mb_strtoupper($str, 'UTF-8') === $str;
}

function getTranslit(string $value, array $alfabet): string
{
    $result = "";
    for($i = 0; $i < mb_strlen($value); $i++) {
        $currentChar = mb_substr($value, $i, 1, 'UTF-8');
        $resultChar = "";
        $upperChar = false;

        if(isUpper($currentChar)) {
            $upperChar = true;
            $currentChar = mb_strtolower($currentChar);
        }
        if(array_key_exists($currentChar, $alfabet)) {
            $resultChar = $alfabet[$currentChar];
        } else {
            $resultChar = $currentChar;
        }
        if($upperChar){
            $result .= ucfirst($resultChar);
        } else {
            $result .= $resultChar;
        }
    }
    return $result;
}


echo getTranslit("Привет Александр paprikka", $alfabet);
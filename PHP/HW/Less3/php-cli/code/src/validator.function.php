<?php
function validateDate(string $date): bool
{
    $dateBlocks = explode("-", $date);
    if($dateBlocks[2] > date("Y")){
        return false;
    }
    return mb_ereg_match("^[0-9]{2}-[0-9]{2}-[0-9]{4}$", $date);
}

function validateName(string $name): bool
{
    if($name == "" || $name == " ") {
        return false;
    }
    return mb_ereg_match("^[a-zA-Zа-яА-Я ]*$", $name);
}

<?php

// function readAllFunction(string $address) : string {
function readAllFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "rb");

        $contents = '';

        while (!feof($file)) {
            $contents .= fread($file, 100);
        }

        fclose($file);
        return $contents;
    } else {
        return handleError("Файл не существует");
    }
}

// function addFunction(string $address) : string {
function addFunction(array $config): string
{
    $address = $config['storage']['address'];

    $name = readline("Введите имя: ");
    if (!validateName($name)) {
        return handleError("Некорректное имя! Имя может содержать только буквы!");
    }
    $date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");
    if (!validateDate($date)) {
        return handleError("Некорректный формат даты!");
    }
    $data = $name . ", " . $date . "\r\n";


    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        return "Запись $data добавлена в файл $address";
    } else {
        return handleError("Произошла ошибка записи. Данные не сохранены");
    }

}

// function clearFunction(string $address) : string {
function clearFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "w");

        fwrite($file, '');

        fclose($file);
        return "Файл очищен";
    } else {
        return handleError("Файл не существует");
    }
}

function helpFunction()
{
    return handleHelp();
}

function readConfig(string $configAddress): array|false
{
    return parse_ini_file($configAddress, true);
}

function readProfilesDirectory(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!is_dir($profilesDirectoryAddress)) {
        mkdir($profilesDirectoryAddress);
    }

    $files = scandir($profilesDirectoryAddress);

    $result = "";

    if (count($files) > 2) {
        foreach ($files as $file) {
            if (in_array($file, ['.', '..']))
                continue;

            $result .= $file . "\r\n";
        }
    } else {
        $result .= "Директория пуста \r\n";
    }

    return $result;
}

function readProfile(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!isset($_SERVER['argv'][2])) {
        return handleError("Не указан файл профиля");
    }

    $profileFileName = $profilesDirectoryAddress . $_SERVER['argv'][2] . ".json";

    if (!file_exists($profileFileName)) {
        return handleError("Файл $profileFileName не существует");
    }

    $contentJson = file_get_contents($profileFileName);
    $contentArray = json_decode($contentJson, true);

    $info = "Имя: " . $contentArray['name'] . "\r\n";
    $info .= "Фамилия: " . $contentArray['lastname'] . "\r\n";

    return $info;
}

function whoBirthBoy(array $config): string
{
    $currentDay = date("d");
    $currentMonth = date("m");
    $birthTodayExist = false;
    $birthMonthExist = false;
    $birthToday = "Сегодня день рождения: " . PHP_EOL;
    $birthMonth = "В этом месяце день рождения: " . PHP_EOL;
    $address = $config['storage']['address'];
    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "rb");
        while (!feof($file)) {
            $currentPerson = fgets($file);
            if($currentPerson != ""){
                $obj = explode(",", trim($currentPerson));
                $dateBlocks = explode("-", $obj[1]);

                if($dateBlocks[0] == $currentDay && $dateBlocks[1] == $currentMonth) {
                    $birthToday .= $currentPerson;
                    $birthTodayExist = true;
                }
                if($dateBlocks[1] == $currentMonth) {
                    $birthMonth .= $currentPerson;
                    $birthMonthExist = true;
                }
            }
        }
        fclose($file);
        if(!$birthTodayExist) {
            $birthToday .= "отсутствуют" . PHP_EOL;
        }
        if(!$birthMonthExist) {
            $birthMonth .= "отсутствуют" . PHP_EOL;
        }
    }
    return $birthToday . PHP_EOL . $birthMonth;
}

function rewriteFile(array $config, string $content): bool
{
    $address = $config['storage']['address'];
    if (file_exists($address) && is_readable($address)){
        $file = fopen($address, "w");

        fwrite($file, $content);

        fclose($file);
    } else {
        return handleError("Файл не существует");
    }
    return true;
}

function deleteFunction(array $config): string
{
    $searchString = readline("Введите строку для поиска и удаления данных(Имя или дату рождения в формате ДД-ММ-ГГГГ): ");
    $resultContent = "";
    $deletedString = "";
    $address = $config['storage']['address'];
    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "rb");
        while (!feof($file)) {
            $checkedString = fgets($file);
            match (mb_strpos(mb_strtolower($checkedString), mb_strtolower($searchString))){
                false => $resultContent .= $checkedString,
                default => $deletedString .= $checkedString,
            };
        }

        fclose($file);
    } else {
        return handleError("Файл не существует");
    }
    if($deletedString != ""){
        if(rewriteFile($config, $resultContent)){
            return "Строка удалена из файла: $deletedString ";
        } else {
            return "Ошибка записи файла!";
        }
    }
    return "Строка не найдена!";
}

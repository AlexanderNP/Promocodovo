<?php

    //Чтение содержимого JSON файла в строку
    $jsonString = file_get_contents('../config.json');
    //Преобразование JSON строки в ассоциативный массив
    $data = json_decode($jsonString, true);
    $config = $data["config"];

?>
<?php

    //Чтение содержимого JSON файла в строку
    $jsonString = file_get_contents('../promos.json');
    //Преобразование JSON строки в ассоциативный массив
    $data = json_decode($jsonString, true);
    $category = $data["category"];
    $codes = $data["promos"];
    $brand = $data["brand"];

?>
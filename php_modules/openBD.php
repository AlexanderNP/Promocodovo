<?php

    //Чтение содержимого JSON файла в строку
    $jsonString = file_get_contents('promos.json');
    //Преобразование JSON строки в ассоциативный массив
    $data = json_decode($jsonString, true);
    $category = $data["category"];
    $codes = $data["promos"];
    $brand = $data["brand"];
    $promos = $data['promos'];
    $length = count($promos);
    $lengthBrand = count($brand);

    for($i = 0; $i < $length; $i++) {

        $promos[$i]['item_id'] = $i; 

    }

    for($i = 0; $i < $lengthBrand; $i++) {

        $brand[$i]['brand_id'] = $i; 

    }

    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($promos[$j]['popular'] < $promos[$j + 1]['popular']) {
                $temp = $promos[$j];
                $promos[$j] = $promos[$j + 1];
                $promos[$j + 1] = $temp;
            }
        }
    }

    if($lengthBrand > 1) {

        for ($i = 0; $i < $lengthBrand - 1; $i++) {
            for ($j = 0; $j < $lengthBrand - $i - 1; $j++) {
                if ($brand[$j]['popular'] < $brand[$j + 1]['popular']) {
                    $temp = $brand[$j];
                    $brand[$j] = $brand[$j + 1];
                    $brand[$j + 1] = $temp;
                }
            }
        }

    }

?>
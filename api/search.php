<?php

    include('openBD_api.php');

    header('Content-Type: application/json');

    $search = $_GET['search'];
    $filteredPromos = [];

    for ($i = 0; $i < count($codes); $i++) {

        $item = $codes[$i];

        // Ищем совпадение в title или description
        if (strpos($item['title'], $search) !== false || strpos($item['description'], $search) !== false) {
            // Добавляем поле item_id
            $item['item_id'] = $i;
            $item['category'] = $category[$codes[$i]['category_id']]['title'];
            $filteredPromos[] = $item;
        }
        
    }

    usort($filteredPromos, function ($a, $b) {
        return $b['popular'] <=> $a['popular'];
    });

    $JSON_Responce = json_encode($filteredPromos, JSON_UNESCAPED_UNICODE);
    echo $JSON_Responce;

?>
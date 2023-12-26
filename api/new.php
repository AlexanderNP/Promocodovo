<?php

    include('openBD_api.php');

    header('Content-Type: application/json');

    for($index = 0; $index < count($codes); $index++) {

        $codes[$index]['item_id'] = $index;
        $codes[$index]['category'] = $category[$codes[$index]['category_id']]['title'];

    }

    $filteredPromos = array_reverse($codes);

    $JSON_Responce = json_encode($filteredPromos, JSON_UNESCAPED_UNICODE);
    echo $JSON_Responce;

?>
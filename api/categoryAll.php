<?php

    include('openBD_api.php');

    header('Content-Type: application/json');

    for($index = 0; $index < count($codes); $index++) {
        $codes[$index]['item_id'] = $index;
        $codes[$index]['category'] = $category[$codes[$index]['category_id']]['title'];
    }
    
    usort($codes, function ($a, $b) {
        return $b['popular'] <=> $a['popular'];
    });

    $JSON_Responce = json_encode($codes, JSON_UNESCAPED_UNICODE);
    echo $JSON_Responce;

?>
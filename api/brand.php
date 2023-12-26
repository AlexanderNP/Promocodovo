<?php

    include('openBD_api.php');

    header('Content-Type: application/json');

    $brand_id = $_GET['brand'];
    $brand_id = (int)$brand_id;

    $filteredPromos = array();
    for ($i = 0; $i < count($codes); $i++) {
        if ($codes[$i]['brand_id'] === $brand_id) {
            $codes[$i]['item_id'] = $i;
            $codes[$i]['category'] = $category[$codes[$i]['category_id']]['title'];
            $filteredPromos[] = $codes[$i];
        }
    }
    
    usort($filteredPromos, function ($a, $b) {
        return $b['popular'] <=> $a['popular'];
    });

    $JSON_Responce = json_encode($filteredPromos, JSON_UNESCAPED_UNICODE);
    echo $JSON_Responce;

?>
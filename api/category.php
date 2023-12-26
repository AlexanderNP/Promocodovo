<?php

    include('openBD_api.php');

    header('Content-Type: application/json');

    $category_ids = $_POST['category'];

    $filteredPromos = array();

    for ($i = 0; $i < count($codes); $i++) {
        for($j = 0; $j < count($category_ids); $j++) {
            $category_id = (int)$category_ids[$j];
            if ($codes[$i]['category_id'] === $category_id) {
                $codes[$i]['item_id'] = $i;
                $codes[$i]['category'] = $category[$codes[$i]['category_id']]['title'];
                $filteredPromos[] = $codes[$i];
            }
        }
    }
    
    usort($filteredPromos, function ($a, $b) {
        return $b['popular'] <=> $a['popular'];
    });

    $JSON_Responce = json_encode($filteredPromos, JSON_UNESCAPED_UNICODE);
    echo $JSON_Responce;

?>
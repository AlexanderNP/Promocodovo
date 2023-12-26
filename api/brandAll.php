<?php

    include('openBD_api.php');

    header('Content-Type: application/json');
    
    for($index = 0; $index < count($brand); $index++) {
        $brand[$index]['brand_id'] = $index;
    }

    usort($brand, function ($a, $b) {
        return $b['popular'] <=> $a['popular'];
    });

    $JSON_Responce = json_encode($brand, JSON_UNESCAPED_UNICODE);
    echo $JSON_Responce;

?>
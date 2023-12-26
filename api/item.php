<?php

    include('openBD_api.php');

    header('Content-Type: application/json');

    $item_id = $_GET['item'];
    $item_id = (int)$item_id;
    $item = $codes[$item_id];
    $item['category'] = $category[$item['category_id']]['title'];

    $JSON_Responce = json_encode($item, JSON_UNESCAPED_UNICODE);
    echo $JSON_Responce;

?>
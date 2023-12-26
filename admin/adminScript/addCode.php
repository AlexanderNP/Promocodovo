<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (! $_SESSION['admin']) header('Location: ../index.php');
    else {

        //Читаем пост-запросы
        $title = $_POST['title'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $href = $_POST['href'];
        $instructHref = $_POST['instructHref'];
        $numberHref = $_POST['numberHref'];

        if(isset($_FILES["image"]) and $_FILES["image"]['name'] != null) {

            $image = $_FILES['image'];
            $imagePathSaveTo = '../../assets/'.$image['name'];
            move_uploaded_file($image['tmp_name'], $imagePathSaveTo);
            $imagePathForConfig = './assets/'.$image['name'];

        }

        //Чтение содержимого JSON файла в строку
        $jsonString = file_get_contents('../../promos.json');
        //Преобразование JSON строки в ассоциативный массив
        $data = json_decode($jsonString, true);
        
        $newCode = array(
            "title" => $title,
            "description" => $description,
            "code" => $code,
            "category_id" => (int)$category_id,
            "brand_id" => (int)$brand_id,
            "href" => $href,
            "instructHref" => $instructHref,
            "numberHref" => $numberHref,
            "img_href" => $imagePathForConfig,
            "popular" => 0
        );
        
        $data["promos"][] = $newCode;

        $newJson = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        file_put_contents('../../promos.json', $newJson);

        $script = '../admin.php';
        header("Location: $script");

    }

?>
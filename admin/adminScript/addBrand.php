<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (! $_SESSION['admin']) header('Location: ../index.php');
    else {

        //Читаем пост-запросы
        $title = $_POST['title'];

        if(isset($_FILES["image"]) and $_FILES["image"]['name'] != null) {

            $image = $_FILES['image'];
            $imagePathSaveTo = '../../assets/popular/'.$image['name'];
            move_uploaded_file($image['tmp_name'], $imagePathSaveTo);
            $imagePathForConfig = './assets/popular/'.$image['name'];

        }
        

        //Чтение содержимого JSON файла в строку
        $jsonString = file_get_contents('../../promos.json');
        //Преобразование JSON строки в ассоциативный массив
        $data = json_decode($jsonString, true);
        
        $newBrand = array(
            "title" => $title,
            "img_href" => $imagePathForConfig,
            "popular" => 0
        );
        
        $data["brand"][] = $newBrand;

        $newJson = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        file_put_contents('../../promos.json', $newJson);

        $script = '../admin.php';
        header("Location: $script");

    }

?>
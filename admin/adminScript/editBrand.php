<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (! $_SESSION['admin']) header('Location: ../index.php');
    else {

        //Читаем пост-запросы
        $title = $_POST['title'];
        $index = $_POST['index'];
        $index = (int)$index;

        //Чтение содержимого JSON файла в строку
        $jsonString = file_get_contents('../../promos.json');
        //Преобразование JSON строки в ассоциативный массив
        $data = json_decode($jsonString, true);

        if(isset($_FILES["image"]) and $_FILES["image"]['name'] != null) {

            $image = $_FILES['image'];
            $imagePathSaveTo = '../../assets/'.$image['name'];
            move_uploaded_file($image['tmp_name'], $imagePathSaveTo);
            $imagePathForConfig = './assets/'.$image['name'];

        }
        else {

            $imagePathForConfig = $data['brand'][$index]['img_href'];

        }

        $data["brand"][$index]['title'] = $title;
        $data["brand"][$index]['img_href'] = $imagePathForConfig;

        $newJson = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        file_put_contents('../../promos.json', $newJson);

        $script = '../admin.php';
        header("Location: $script");

    }

?>
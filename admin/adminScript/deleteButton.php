<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (! $_SESSION['admin']) header('Location: ../index.php');
    else {

        //Читаем пост-запросы
        $index = $_POST['index'];
        $index = (int)$index;

        //Чтение содержимого JSON файла в строку
        $jsonString = file_get_contents('../../config.json');
        //Преобразование JSON строки в ассоциативный массив
        $data = json_decode($jsonString, true);
        $headerButtons = $data["config"]["headerButtons"];

        unset($headerButtons[$index]);
        $headerButtons = array_values($headerButtons);
        $data["config"]["headerButtons"] = $headerButtons;

        $newJson = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        file_put_contents('../../config.json', $newJson);

        $script = '../admin.php';
        header("Location: $script");

    }

?>
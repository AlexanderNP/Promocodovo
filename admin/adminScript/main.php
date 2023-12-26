<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (! $_SESSION['admin']) header('Location: ../index.php');
    else {

        //Читаем пост-запросы
        $seoTitle = $_POST['seoTitle'];
        $seoDesc = $_POST['seoDesc'];
        $seoTags = $_POST['seoTags'];
        $telegramHref = $_POST['telegramHref'];
        $instructHref = $_POST['instructHref'];
        $headerTitle1 = $_POST['headerTitle1'];
        $headerTitle2 = $_POST['headerTitle2'];
        $headerTitle3 = $_POST['headerTitle3'];
        $headerDescription = $_POST['headerDescription'];
        $footerTitle1 = $_POST['footerTitle1'];
        $footerTitle2 = $_POST['footerTitle2'];

        //Чтение содержимого JSON файла в строку
        $jsonString = file_get_contents('../../config.json');
        //Преобразование JSON строки в ассоциативный массив
        $data = json_decode($jsonString, true);

        $data['config']['seoTitle'] = $seoTitle;
        $data['config']['seoDesc'] = $seoDesc;
        $data['config']['seoTags'] = $seoTags;
        $data['config']['telegramHref'] = $telegramHref;
        $data['config']['instructHref'] = $instructHref;
        $data['config']['headerTitle1'] = $headerTitle1;
        $data['config']['headerTitle2'] = $headerTitle2;
        $data['config']['headerTitle3'] = $headerTitle3;
        $data['config']['headerDescription'] = $headerDescription;
        $data['config']['footerTitle1'] = $footerTitle1;
        $data['config']['footerTitle2'] = $footerTitle2;

        $newJson = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        file_put_contents('../../config.json', $newJson);

        $script = '../admin.php';
        header("Location: $script");

    }

?>
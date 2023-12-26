<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (isset($_SESSION['admin'])) {

        if (! $_SESSION['admin']) header('Location: index.php');

    }
    else {

        header('Location: index.php');

    }
    
    include('openBD.php');

    $id = $_GET['id'];

    $currentCode = $code[$id];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить промокод</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

    <main class="adminBody active">
        <form action="adminScript/editCode.php" method="POST">

            <span>Заголовок</span>
            <?php echo '<input type="text" name="title" value="'.$currentCode["title"].'">'; ?>
            <span>Описание</span>
            <?php echo '<input type="text" name="description" value="'.$currentCode["description"].'">'; ?>
            <span>Промо-код</span>
            <?php echo '<input type="text" name="code" value="'.$currentCode["code"].'">'; ?>
            <span>Категория</span>
            <select name="category_id">
                <?php
                    for($index = 0; $index < count($category); $index++) {

                        if($index == $currentCode["category_id"]) {
                            echo '<option value="'.$index.'" selected>'.$category[$index]['title'].'</option>';
                        }
                        else {
                            echo '<option value="'.$index.'">'.$category[$index]['title'].'</option>';
                        }

                    }
                ?>
            </select>
            <span>Брэнд</span>
            <select name="brand_id">
                <?php
                    for($index = 0; $index < count($brand); $index++) {

                        if($index == $currentCode["brand_id"]) {
                            echo '<option value="'.$index.'" selected>'.$brand[$index]['title'].'</option>';
                        }
                        else {
                            echo '<option value="'.$index.'">'.$brand[$index]['title'].'</option>';
                        }

                    }
                ?>
            </select>
            <span>Картинка</span>
            <input type="file" name="image">
            <span>Ссылка на применение</span>
            <?php echo '<input type="text" name="href" value="'.$currentCode["href"].'">'; ?>
            <span>Ссылка на инструкцию</span>
            <?php echo '<input type="text" name="instructHref" value="'.$currentCode["instructHref"].'">'; ?>
            <span>Ссылка на номера</span>
            <?php echo '<input type="text" name="numberHref" value="'.$currentCode["numberHref"].'">'; ?>
            <?php echo '<input type="hidden" name="index" value="'.$id.'">'; ?>
            <input type="submit" value="Изменить">

        </form>
    </main>
    
</body>
</html>
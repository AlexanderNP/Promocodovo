<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (isset($_SESSION['admin'])) {

        if (! $_SESSION['admin']) header('Location: index.php');

    }
    else {

        header('Location: index.php');

    }
    
    include('openConfig.php');
    include('openBD.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    
    <div class="adminContain">

        <div class="adminHeader">

            <span>Главная страница</span>
            <span>Категории</span>
            <span>Брэнды</span>
            <span>Промо-коды</span>
            <span>Новая страница</span>

        </div>

        <div class="adminBody active">

            <h1>Главная страница</h1>

            <form action="adminScript/main.php" method='POST'>

                <span>SEO Заголовок</span>
                <?php echo '<input type="text" value="'.$config['seoTitle'].'" name="seoTitle">'; ?>
                <span>SEO Описание</span>
                <?php echo '<input type="text" value="'.$config['seoDesc'].'" name="seoDesc">'; ?>
                <span>SEO Теги</span>
                <?php echo '<input type="text" value="'.$config['seoTags'].'" name="seoTags">'; ?>
                <span>Telegram Ссылка</span>
                <?php echo '<input type="text" value="'.$config['telegramHref'].'" name="telegramHref">'; ?>
                <span>Связаться Ссылка</span>
                <?php echo '<input type="text" value="'.$config['instructHref'].'" name="instructHref">'; ?>
                <?php echo '<input type="hidden" value="'.$config['headerTitle1'].'" name="headerTitle1">'; ?>
                <?php echo '<input type="hidden" value="'.$config['headerTitle2'].'" name="headerTitle2">'; ?>
                <?php echo '<input type="hidden" value="'.$config['headerTitle3'].'" name="headerTitle3">'; ?>
                <?php echo '<input type="hidden" value="'.$config['headerDescription'].'" name="headerDescription">'; ?>
                <?php echo '<input type="hidden" value="'.$config['footerTitle1'].'" name="footerTitle1">'; ?>
                <?php echo '<input type="hidden" value="'.$config['footerTitle2'].'" name="footerTitle2">'; ?>
                <input type="submit" value="СОХРАНИТЬ">

            </form>
            
            <h1>Кнопки</h1>

            <?php

                for($index = 0; $index < count($config['headerButtons']); $index++) {

                    echo '<form action="adminScript/deleteButton.php" method="POST" class="listElement">

                        <span>'.$config['headerButtons'][$index]['title'].'</span>
                        <span>'.$config['headerButtons'][$index]['href'].'</span>
                        <input type="hidden" name="index" value="'.$index.'">
                        <input type="submit" value="Удалить">

                    </form>';

                }

            ?>
            
            <h1>Добавить кнопку</h1>
            <form action="adminScript/addButton.php" method="POST">

                <span>Название</span>
                <input type="text" name="title">
                <span>Ссылка</span>
                <input type="text" name="href">
                <input type="submit" value="Добавить">

            </form>
            
        </div>

        <div class="adminBody">

            <h1>Добавить категорию</h1>

            <form action="adminScript/addCategory.php" method="POST">

                <span>Название категории</span>
                <input type="text" name="title">
                <span>Картинка (SVG-код) - Подробнее в документации</span>
                <input type="text" name="svgCode">
                <input type="submit" value="Добавить">

            </form>

            <h1>Категории</h1>

            <?php

                for($index = 0; $index < count($category); $index++) {

                echo '<form action="adminScript/deleteCategory.php" method="POST">

                        <span>'.$category[$index]['title'].'</span>
                        <span>Переходов: '.$category[$index]['popular'].'</span>
                        <input type="hidden" name="index" value="'.$index.'">
                        <a href="editCategory.php?index='.$index.'">Изменить</a>
                        <input type="submit" value="Удалить">

                    </form>';

                }

            ?>

        </div>

        <div class="adminBody">

            <h1>Добавить брэнд</h1>

                <form action="adminScript/addBrand.php" method="POST" enctype="multipart/form-data">

                    <span>Название брэнда</span>
                    <input type="text" name="title">
                    <span>Картинка</span>
                    <input type="file" name="image">
                    <input type="submit" value="Добавить">

                </form>

                <h1>Брэнды</h1>

                <?php

                    for($index = 0; $index < count($brand); $index++) {

                    echo '<form action="adminScript/deleteBrand.php" method="POST">

                            <span>'.$brand[$index]['title'].'</span>
                            <span>Переходов: '.$brand[$index]['popular'].'</span>
                            <input type="hidden" name="index" value="'.$index.'">
                            <a href="editBrand.php?index='.$index.'">Изменить</a>
                            <input type="submit" value="Удалить">

                        </form>';

                    }

                ?>

        </div>

        <div class="adminBody">

            <h1>Добавить промо-код</h1>

            <form action="adminScript/addCode.php" method="POST" enctype="multipart/form-data">

                <span>Заголовок</span>
                <input type="text" name="title">
                <span>Описание</span>
                <input type="text" name="description">
                <span>Промо-код</span>
                <input type="text" name="code">
                <span>Категория</span>
                <select name="category_id">
                    <?php
                        for($index = 0; $index < count($category); $index++) {

                            echo '<option value="'.$index.'">'.$category[$index]['title'].'</option>';

                        }
                    ?>
                </select>
                <span>Брэнд</span>
                <select name="brand_id">
                    <?php
                        for($index = 0; $index < count($brand); $index++) {

                            echo '<option value="'.$index.'">'.$brand[$index]['title'].'</option>';

                        }
                    ?>
                </select>
                <span>Картинка</span>
                <input type="file" name="image">
                <input type="hidden" value="hiddennone" name="href">
                <input type="hidden" value="hiddennone" name="instructHref">
                <input type="hidden" value="hiddennone" name="numberHref">
                <input type="submit" value="Добавить">

            </form>

            <h1>Промокоды</h1>

            <?php

                for($index = 0; $index < count($code); $index++) {

                echo '<form action="adminScript/deleteCode.php" method="POST">

                        <span>'.$code[$index]['title'].'</span>
                        <span>'.$code[$index]['description'].'</span>
                        <span>Код:</span>
                        <span>'.$code[$index]['code'].'</span>
                        <span>Переходов:'.$code[$index]['popular'].'</span>
                        <a href="edit.php?id='.$index.'">Изменить</a>
                        <input type="hidden" name="index" value="'.$index.'">
                        <input type="submit" value="Удалить">

                    </form>';

                }

            ?>

        </div>

        <div class="adminBody">

            <h1>Новая страница</h1>

            <form id='newPageForm' enctype="multipart/form-data" action="adminScript/addPage.php" method="POST">
            
                <span>Заголовок страницы</span>
                <input type="text" name="title">

                <span>Название в ссылке</span>
                <input type="text" name="url"> 

                <input type="submit" value="Создать">

            </form>

            <div class="newPageButtonsContain">
                <div class="newPageButton" id='addTitle'>Добавить заголовок</div>
                <div class="newPageButton" id='addText'>Добавить текст</div>
                <div class="newPageButton" id='addImg'>Добавить картинку</div>
                <div class="newPageButton" id='addHref'>Добавить кнопку</div>
            </div>

        </div>

    </div>

    <script src="./admin.js"></script>
    <script src="./newPage.js"></script>

</body>
</html>
<?php

header('Content-type: text/html; charset=utf-8');
session_start();
if (! $_SESSION['admin']) header('Location: ../index.php');
else {


    //Читаем пост-запросы
    $title = $_POST['title'];
    $url = $_POST['url'];

    // Путь к новому файлу
    $filePath = '../../page/'.$url.'.html';

    $content = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$title.'</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="./css/page.css">
        <script type="module" src="./js/page.js" ></script>
    </head>
    <body>
    
        <div class="menuMobileContain">
    
            <div class="menuMobile">
    
                <div class="menuMobileFooter">
    
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.99631 3.19224L3.08709 3.08709C3.41992 2.75425 3.94075 2.724 4.30776 2.99631L4.41291 3.08709L10 8.67375L15.5871 3.08709C15.9532 2.72097 16.5468 2.72097 16.9129 3.08709C17.279 3.4532 17.279 4.0468 16.9129 4.41291L11.3263 10L16.9129 15.5871C17.2457 15.9199 17.276 16.4408 17.0037 16.8078L16.9129 16.9129C16.5801 17.2457 16.0592 17.276 15.6922 17.0037L15.5871 16.9129L10 11.3263L4.41291 16.9129C4.0468 17.279 3.4532 17.279 3.08709 16.9129C2.72097 16.5468 2.72097 15.9532 3.08709 15.5871L8.67375 10L3.08709 4.41291C2.75425 4.08008 2.724 3.55925 2.99631 3.19224Z" fill="white"/>
                    </svg>
    
                </div>
    
                <div class="menuMobileContent">
    
                    <div class="menuHrefContain">
    
                        <a class="menuHref" href="#">Все промокоды</a>
    
                        <a class="menuHref" href="#">Обучение (инструкции)</a>
    
                        <a class="menuHref" href="#">Банковские предложения</a>
    
                        <a class="menuHref" href="#">Телеграм канал</a>
    
                        <a class="menuHref" href="#">Помощь</a>
    
                    </div>
    
                    <div class="telegramMobileButtonSectionContain">
    
                        <div class="telegramMobileButtonSection">
        
                            <p>Подписывайтесь на наш телеграм канал и получайте актуальные промокоды быстрее</p>
        
                            <a href="#" id="telegraMobileButton">
        
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2208 3.0975L2.44583 8.795C1.4375 9.2 1.44333 9.7625 2.26083 10.0133L6.05416 11.1967L14.8308 5.65917C15.2458 5.40667 15.625 5.5425 15.3133 5.81917L8.2025 12.2367H8.20083L8.2025 12.2375L7.94083 16.1475C8.32416 16.1475 8.49333 15.9717 8.70833 15.7642L10.5508 13.9725L14.3833 16.8033C15.09 17.1925 15.5975 16.9925 15.7733 16.1492L18.2892 4.2925C18.5467 3.26 17.895 2.7925 17.2208 3.0975Z" fill="white"/>
                                </svg>
        
                                <p>Подписаться</p>
        
                            </a>
        
                        </div>
        
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
        <header>
    
            <div class="navContain">
    
                <nav>
    
                    <svg id="menuButton" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.88634 3.08721C4.32983 3.08721 3.87845 2.63583 3.87845 2.07932C3.87845 1.52267 4.32983 1.07129 4.88634 1.07129H15.4181C15.9747 1.07129 16.426 1.52267 16.426 2.07932C16.426 2.63583 15.9747 3.08721 15.4181 3.08721H4.88634ZM4.88634 18.9983C4.32983 18.9983 3.87845 18.547 3.87845 17.9904C3.87845 17.4338 4.32983 16.9824 4.88634 16.9824H15.4181C15.9747 16.9824 16.426 17.4338 16.426 17.9904C16.426 18.547 15.9747 18.9983 15.4181 18.9983H4.88634ZM1.36531 11.042C0.808804 11.042 0.357422 10.5906 0.357422 10.0341C0.357422 9.47756 0.808804 9.02604 1.36531 9.02604H18.939C19.4955 9.02604 19.9471 9.47756 19.9471 10.0341C19.9471 10.5906 19.4955 11.042 18.939 11.042H1.36531Z" fill="white"/>
                    </svg>
    
                    <p>GruMarket</p>
    
                    <div>
    
                        <a href="#">Все промокоды</a>
                        <a href="#">Обучение (Инструкции)</a>
                        <a href="#">Банковские предложения</a>
                        <a href="#">Телеграм канал</a>
                        <a href="#">Помощь</a>
    
                    </div>
    
                    <svg id="searchButton" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    </svg>
    
                </nav>
    
            </div>
    
        </header>
        
        <main>

            <div class="mainContain">';


    for($index = 0; $index < 50; $index++) {

        if(isset($_POST['element'.$index]) or isset($_FILES['element'.$index])) {

            if($_POST['type'.$index] == 'title') {
                $content = $content.'<h1>'.$_POST['element'.$index].'</h1>';
            }
            else if($_POST['type'.$index] == 'text') {
                $content = $content.'<p>'.$_POST['element'.$index].'</p>';
            }
            else if($_POST['type'.$index] == 'href') {
                $content = $content.'<a href="'.$_POST['href'.$index].'">'.$_POST['element'.$index].'</a>';
            }
            else if($_POST['type'.$index] == 'img') {

                print_r('image');

                if(isset($_FILES['element'.$index]) and $_FILES['element'.$index]['name'] != null) {

                    $image = $_FILES['element'.$index];
                    $imagePathSaveTo = '../../assets/'.$image['name'];
                    move_uploaded_file($image['tmp_name'], $imagePathSaveTo);
                    $imagePathForConfig = '../assets/'.$image['name'];

                    $content = $content.'<img src="'.$imagePathForConfig.'" alt="image'.$index.'">';
        
                }

            }

        }

    }

    $content = $content.'</div>
        
        </main>

    </body>
    </html>';

    // Создание нового .html файла и запись в него содержимого
    file_put_contents($filePath, $content);

    // Проверка успешности создания файла
    if (file_exists($filePath)) {

        $script = $filePath;
        header("Location: $script");

    } 
    else {

        echo "Возникла ошибка при создании файла.";

    }

}

?>
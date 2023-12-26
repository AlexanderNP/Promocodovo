<?php

    include('./php_modules/openBD.php');
    include('./php_modules/openConfig.php');

?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <title><?php echo $config['seoTitle']; ?></title>
  <?php echo '<meta name="description" content="'.$config['seoDesc'].'">'; ?>
  <?php echo '<meta name="keywords" content="'.$config['seoTags'].'">'; ?>
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <div class="container">
        <div class="header__content">
          <a class="header__logo" href="/">
            <img class="logo__img" src="images/logo.svg" alt="logo">
          </a>
          <div class="form-wrap">
            <div class="header__form" action="" method="get" id="header__form">
              <div class="header__input-wrap">
                <input class="header__search" type="search" name="" placeholder="Поиск промокодов">
              </div>
            </div>
            <button class="header__btn-search button" form="header__form">Найти</button>
          </div>
        </div>
      </div>
    </header>
    <main class="main">
      <section class="main__category">
        <div class="container">
          <div class="category__inner">

          <div class="category__row">

            <ul class="category__tab-list">

          <?php

            for($index = 0; $index < count($category); $index++) {

                echo '<li class="category__tab-item" data-tub="#tab-1" data-category-id="'.$index.'">';

                    echo $category[$index]['svg_code'];
                    echo '<p class="category__tab-text">'.$category[$index]['title'].'</p>';

                echo '</li>';
            }

            ?>

            </ul>

          </div>
        </div>
      </section>
      <div class="container">
        <div class="wrap-cart-brands">
          <section class="main__cart">
            <div class="cart__inner">
              <ul class="cart__list">

                <?php

                $length_of_codes = count($promos);

                for($index = 0; $index < $length_of_codes; $index++) {

                  echo '<li class="cart__item">
                    <div class="cart__image-box">
                      <img class="cart__img" src="'.$promos[$index]['img_href'].'" alt="'.$promos[$index]['title'].'">
                    </div>
                    <div class="cart__wrap">
                      <p class="cart__category">'.$category[$promos[$index]['category_id']]['title'].'</p>
                      <p class="cart__descript">'.$promos[$index]['title'].'</p>
                      <p class="cart__promo-works">'.$promos[$index]['description'].'</p>
                      <button class="cart__promo-btn button" onclick="showCode(this, \''.$promos[$index]['code'].'\')">
                        <img class="cart__btn-icon" src="images/main/visibility.svg" alt="visibility">
                        <span class="cart__btn-label">Показать код</span>
                      </button>
                    </div>
                  </li>';

                }

                ?>

              </ul>
            </div>
          </section>
          <section class="main__brands">
            <div class="brands__inner">
              <div class="brands__heading">
                <h1 class="brands__title">Популярные бренды</h1>
              </div>
              <ul class="brands__list">
              
                <?php
                for($index = 0; $index < count($brand); $index++) {

                  echo '<li data-brand-id="'.$brand[$index]['brand_id'].'" class="brands__item">
                    <img class="brands__img" src="'.$brand[$index]["img_href"].'" alt="'.$brand[$index]["title"].'">
                    <span class="brands__label">'.$brand[$index]["title"].'</span>
                  </li>';

                }
                ?>

              </ul>
              <button class="brands__btn-more">Смотреть все</button>
              <button class="brands__btn-less" style="display: none;">Скрыть</button>
            </div>
            <div class="subscribe__inner">
              <p class="subscribe__text">Подписывайтесь на наш телеграм-канал и получайте промики быстрее</p>
              <?php echo '<a class="subscribe__link" href="'.$config['telegramHref'].'">'; ?>
                <img src="images/tg.svg" alt="tg">
                <span class="subscribe__link-text">Подписаться</span>
              </a>
            </div>
          </section>
        </div>
      </div>
    </main>
    <footer class="footer">
      <div class="container">
        <div class="footer__top">
          <a class="footer__logo" href="/">
            <img class="footer__logo-img" src="images/logo-footer.svg" alt="logo">
          </a>
          <div class="footer__contact">
            <?php echo '<a class="footer__link-btn" href="'.$config['instructHref'].'">'; ?>
              Связаться с нами
            </a>
            <?php echo '<a class="footer__link-icon" href="'.$config['telegramHref'].'">'; ?>
              <img class="footer__icon-img" src="images/tg.svg" alt="tg">
            </a>
          </div>
        </div>
        <nav class="footer__nav">
          <div class="footer__nav-link">
            <p class="footer__nav-title">Полезные ссылки</p>
            <div class=footer__wrap>
              <ul class="footer__list">
                <?php
                  for($index = 0; $index < count($config['headerButtons']); $index++) {
                    echo '<li class="footer__item"><a href="'.$config['headerButtons'][$index]['href'].'">'.$config['headerButtons'][$index]['title'].'</a></li>';
                  }
                  ?>
              </ul>
            </div>
          </div>
        </nav>
        <div class="footer__bottom">
          <div class="bottom-wrap">
            <p class="bottom-text">Промокодово, 2023</p>
            <p class="bottom-text">Политика конфиденциальности</p>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="js/app.js" defer></script>
  <script src="js/main.js" type="module"></script>
</body>

</html>
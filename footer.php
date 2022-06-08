<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package estore
 */
?>



<footer class="footer">
    <div class="container">
        <div class="footer__box flex-start-start">
            <figure class="footer_image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.svg" alt="Логотип Resta" class="footer_img">
            </figure>

            <ul class="footer__list">
                <li class="footer__li">
                    <a href="/o-nas" class="footer__link">
                        о компании
                    </a>
                </li>
                <li class="footer__li">
                    <a href="/dostavka-i-oplata" class="footer__link">
                        доставка и оплата
                    </a>
                </li>
                <li class="footer__li">
                    <a href="/otzyvy/" class="footer__link">
                        отзывы
                    </a>
                </li>
                <li class="footer__li">
                    <a href="/akcii/" class="footer__link">
                        акции
                    </a>
                </li>
                <li class="footer__li">
                    <a href="/voprosy-otvety" class="footer__link">
                        вопрос-ответ
                    </a>
                </li>
                <li class="footer__li">
                    <a href="/kontakty/" class="footer__link">
                        контакты
                    </a>
                </li>
            </ul>

            <address class="footer__addresses">
                <a href="tel:+7<?php the_field('телефон_1', 'option');?>" class="phones__address tel2"><?php the_field('телефон_1', 'option');?></a>               
                <a href="mailto:" class="phones__address mail2"><?php the_field('почта', 'option');?></a>
            </address>

            <ul class="footerSocial flex-start-between">
                <li class="footerSocial__item">
                    <a href="<?php the_field('vk', 'option'); ?>" class="footerSocial__link link1"></a>
                </li>
                <li class="footerSocial__item">
                    <a href="<?php the_field('telegram', 'option'); ?>" class="footerSocial__link link2"></a>
                </li>
                <li class="footerSocial__item">
                    <a href="<?php the_field('whatsapp', 'option');?>" class="footerSocial__link link3"></a>
                </li>
            </ul>
        </div>

        <span class="privacy">
                <p class="privacy__text">
                   <?php the_field('копирайт', 'option');?>
                </p>

                <a href="/privacy" class="privacy__text link">Политика конфиденциальности</a>

                <p class="privacy__text web">
                   Разработка сайта: <a href="https://sim-site.ru" target="_blank">веб-студия «Символ стиля»</a>
                </p>
            </span>
    </div>
</footer>

<!--Попап бургерное меню-->
<div class="blackContainer js-burgerMenu">
    <button type="submit" class="burger js-burgerClose">
        <span class="burger__stripe one js-stripeOne"></span>
        <span class="burger__stripe two js-stripeTwo"></span>
    </button>

    <ul class="burger__list">
        <li class="burger__item">
            <a href="/" class="header__link js-burgerLink">
                Главная
            </a>
        </li>

        <li class="burger__item">
            <a href="/o-nas" class="header__link js-burgerLink">
                О компании
            </a>
        </li>

        <li class="burger__item">
            <a href="/dostavka-i-oplata" class="header__link js-slideTo js-burgerLink">
                Доставка и оплата
            </a>
        </li>

        <li class="burger__item">
            <a href="/otzyvy/" class="header__link js-slideTo js-burgerLink">
                Отзывы
            </a>
        </li>

        <li class="burger__item">
            <a href="/akcii/" class="header__link js-slideTo js-burgerLink">
                Акции
            </a>
        </li>

        <li class="burger__item">
            <a href="/voprosy-otvety" class="header__link js-slideTo js-burgerLink">
                Вопрос-ответ
        </li>

        <li class="burger__item">
            <a href="/kontakty/" class="header__link js-slideTo js-burgerLink">
                Контакты
            </a>
        </li>
    </ul>
</div>

    <!--Попап Заказать звонок ОС-->
    <div id="zakaz" class="blackContainer application js-call">
        <div class="application__box">
            <button type="submit" class="application__close js-callClose"></button>

            <h3 class="categories__subheading formHeading">Закажите звонок уже сегодня!</h3>

            <?php echo do_shortcode('[contact-form-7 id="99" title="Контактная форма Заказать звонок"]'); ?>
        </div>
    </div>

    <!--Попап Получить консультацию по доставке-->
    <div id="delivery" class="blackContainer application js-delivery">
        <div class="application__box">
            <button type="submit" class="application__close js-callClose"></button>         

            <?php echo do_shortcode('[contact-form-7 id="103" title="Контактная форма Получить консультацию по оплате"]'); ?>
        </div>
    </div>

    <!--Попап Получить консультацию-->
    <div id="kons-popup" class="blackContainer application js-kons">
        <div class="application__box">
            <button type="submit" class="application__close js-callClose"></button>        

            <?php echo do_shortcode('[contact-form-7 id="101" title="Контактная форма в попапе Получить консультацию"]'); ?>
        </div>
    </div>

    <!-- Попап для формы на главной -->
    <div id="main" class="blackContainer okForm">
        <div class="application__box okBox">
            <p class="categories__subheading">
                Спасибо за ваше обращение!
            </p>

            <p class="categories__subheading">
                Наш менеджер скоро с Вами свяжется! 
            </p>
        </div>		
    </div>

<a href="#" class="to-top"></a>

 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slide_up.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        if('99' == event.detail.contactFormId ) {
            document.getElementById('zakaz-popup').style.display = 'block'; 
            setTimeout(function() { 
            document.getElementById('zakaz').style.display = 'none';
            document.getElementById('zakaz-popup').style.display = 'none'; }, 4000);

        } else if('100' == event.detail.contactFormId ) {
            document.getElementById('main').style.display = 'block'; 
            setTimeout(function() {      
            document.getElementById('main').style.display = 'none'; }, 4000);

        } else if('101' == event.detail.contactFormId ) {
            document.getElementById('main').style.display = 'block'; 
            setTimeout(function() { 
            document.getElementById('kons-popup').style.display = 'none';
            document.getElementById('main').style.display = 'none'; }, 4000);

        } else if('102' == event.detail.contactFormId ) {
            document.getElementById('main').style.display = 'block'; 
            setTimeout(function() {      
            document.getElementById('main').style.display = 'none'; }, 4000);

        } else if('103' == event.detail.contactFormId ) {
            document.getElementById('main').style.display = 'block'; 
            setTimeout(function() { 
            document.getElementById('delivery').style.display = 'none';
            document.getElementById('main').style.display = 'none'; }, 4000);

        } else if('104' == event.detail.contactFormId ) {
            document.getElementById('main').style.display = 'block'; 
            setTimeout(function() {      
            document.getElementById('main').style.display = 'none'; }, 4000);
        }

    });
    
</script>
</body>
</html>

<?php wp_footer(); ?>



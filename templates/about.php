<?php
/*
 * Template Name: о нас
 */

get_header();

?>


<section class="about">
    <div class="about__box">
        <div class="container">
            <a href="#" class="breadcrumbs">главная > о компании</a>

            <h1 class="about__heading">О компании</h1>
        </div>
    </div>

    <div class="container">
        <p class="del__text">
            <b style="color: #8C325B">Resta мебель&nbsp;&mdash; </b>это интернет-магазин мебели для баров,
            кафе, ресторанов по&nbsp;лучшей цене и&nbsp;на&nbsp;отличных условиях.
        </p>

        <p class="del__text">
            Мы&nbsp;готовы предложить вам большой выбор кресел, стульев, мягкой мебели, мебели для отелей,
            уличной мебели и&nbsp;предметов интерьера в&nbsp;наличии на&nbsp;складе в&nbsp;Сочи и&nbsp;
            под заказ. От&nbsp;стандартных решений до&nbsp;авторской, дизайнерской мебели.
        </p>

        <p class="del__text">
            Мы&nbsp;работаем с&nbsp;2004 года и&nbsp;за&nbsp;это время успешно реализовано уже
            более 50&nbsp;проектов по&nbsp;оснащению ресторанов, отелей, конференц-залов и&nbsp;баров
            высококачественной износоустойчивой мебелью. Наши клиенты&nbsp;&mdash; довольные клиенты!
            Вы&nbsp;можете не&nbsp;верить нам на&nbsp;слово, а&nbsp;почитать их&nbsp;<a href="/otzyvy/" class="blueLink">отзывы
                о&nbsp;нашем сотрудничестве.</a>
        </p>
    </div>

</section>

<section class="whyNeed">
    <div class="whyNeed__bg"></div>

    <div class="container index">
        <h2 class="whyNeed__heading">
            Почему стоит заказывать мебель у&nbsp;нас?
        </h2>

        <ul class="whyNeed__list">
            <li class="why__item whyNeed__item">
                <span class="itemBox whyNeed__img price"></span>

                <p class="whyNeed__text">
                    Работаем напрямую с&nbsp;производителями и&nbsp;гарантируем низкую цену
                </p>
            </li>
            <li class="why__item whyNeed__item">
                <span class="itemBox whyNeed__img delivery"></span>

                <p class="whyNeed__text">
                    Мы&nbsp;обеспечим бесплатную доставку по&nbsp;Сочи в&nbsp;любом количестве
                </p>
            </li>
            <li class="why__item whyNeed__item">
                <span class="itemBox whyNeed__img product"></span>

                <p class="whyNeed__text">
                    Большой выбор товара в&nbsp;наличии на&nbsp;складе Сочи
                </p>
            </li>
            <li class="why__item whyNeed__item">
                <span class="itemBox whyNeed__img color"></span>

                <p class="whyNeed__text">
                    Подберем фактуру и&nbsp;цвет ткани под ваш интерьер
                </p>
            </li>
        </ul>

        <span class="forButton kons js-konsOpen">
                <button class="button kons">получить бесплатную консультацию эксперта</button>
            </span>
    </div>
</section>

<section class="projects">
    <div class="container">
        <h2 class="clients__heading">
            Оцените наши проекты
        </h2>

        <div class="works__slider">

            <?php if( have_rows('add_new_project','options') ): ?>
                <?php while( have_rows('add_new_project','options') ): the_row();                   
                    $text_project = get_sub_field('project_text','options');
                    $project_photo = get_sub_field('img_project','options');                
                ?>

                    <div>
                        <div class="works__slide">
                            <figure class="works__image">
                                <img src="<?= $project_photo; ?>" alt="Работа1" class="works__img">
                            </figure>

                            <p class="works__text">
                                <?= $text_project; ?>
                            </p>
                        </div>
                    </div>

                <?php
                endwhile;
            endif;
            ?>
        </div>

        <h2 class="works">
            Наши клиенты
        </h2>

        <div class="clients__slider">
            <?php if( have_rows('add_new_logo', 'options') ): ?>
                <?php while( have_rows('add_new_logo', 'options') ): the_row();
                    $image_logo = get_sub_field('clients_logo', 'options');
                    ?>
                    <div>
                        <div class="clients__slide">
                            <img src="<?= $image_logo; ?>" class="clients__img">
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>


<section class="contacts forProjects">
    <div class="projects__bg"></div>

    <div class="container index">
        <h2 class="contacts__heading">
            Напишите нам! Мы на связи
        </h2>

        <div class="form">
            <?php echo do_shortcode('[contact-form-7 id="102" title="контактная форма на странице О компании"]'); ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>

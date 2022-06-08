<?php
/*
 * Template Name: FAQ
 */
get_header();

?>
<main class="rev white">
    <div class="container">
        <a href="#" class="breadcrumbs black">главная > <?php the_title(); ?></a>

        <section class="answers">
            <h1 class="payment__heading"><?php the_title(); ?></h1>

            <p class="del__text">
                <?php the_content(); ?>
            </p>



            <ul class="answers__list js-List">
                <?php
                // задаем нужные нам критерии выборки данных из БД
                $args = array(
                    'post_type' => 'faq',
                );
                    $query = new WP_Query( $args );
                    // Цикл
                    if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                    $query->the_post();
                ?>


                <li class="answers__item js-item">
                    <button aria-hidden="Развернуть вопрос" class="answers__arrow js-arrow"></button>

                    <p><b>
                            <?php the_title(); ?></b>
                    </p>

                    <div class="answers__bottom js-div" aria-expanded="false">
                        <?php the_content(); ?>
                    </div>
                </li>

                        <?php
                    }
                    } else {
                        // Постов не найдено
                    }
                wp_reset_postdata();?>


            </ul>
        </section>
    </div>
</main>

<section class="contacts call">
    <div class="contacts__bg"></div>

    <div class="container">
        <h2 class="contacts__heading">
            Если вы не нашли ваш вопрос
        </h2>

        <div class="form">

        </div>

        <div class="callTo">
            <h3 class="callme__heading">
                Написать сообщение или позвонить:
            </h3>

            <ul class="callme__contacts list-reset">
                <li class="topScreen__contact whatsapp_item">    
                    <a class="topScreen__link" target="blank" href="https://api.whatsapp.com/send?phone=7<?php the_field('whatsapp_link', 'option');?>">Whats App</a>
                </li>
                <li class="topScreen__contact viber_item">
                    <a class="topScreen__link" target="blank" href="https://viber://add?number=7<?php the_field('viber_link', 'option');?>">Viber</a>
                </li>
                <li class="topScreen__contact telegram_item">
                    <a class="topScreen__link" target="blank" href="https://t.me/<?php the_field('telegram', 'option');?>">Telegram</a>
                </li>
                <li class="topScreen__contact phone_item">
                    <a class="topScreen__link black"  href="tel:+7<?php the_field('phone1_link', 'option');?>"><?php the_field('телефон_1', 'option');?></a>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php
get_footer();
?>

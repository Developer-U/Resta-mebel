<?php
/*
 * Template Name: акции
 */
get_header();
?>


<main class="actions">
    <div class="container">
        <a href="#" class="breadcrumbs black">главная > <?php the_title(); ?></a>

        <section class="del">
            <h1 class="payment__heading"><?php the_title(); ?></h1>
            <p class="del__text">
                <?php the_content(); ?>
            </p>
            <a href="https://www.instagram.com/restoraciasochi/" target="_blank" class="instaLink">@restoraciasochi</a>
        </section>

        <ul class="actions__list">
            <?php
            // задаем нужные нам критерии выборки данных из БД
            $args = array(
                'post_type' => 'sale',
            );
            $query = new WP_Query( $args );
            // Цикл
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
                    <li class="actions__item">
                        <div class="actions_action" style='background: url("<?php echo the_post_thumbnail_url();?>"); background-repeat: no-repeat; background-size: cover;'>
                            <div class="actions__block">
                                <h2 class="actions__heading">
                                    <?php the_title(); ?>
                                </h2>

                                <span class="actions__box flex-start-between">
                                <p class="actions__descr">
                                    <?php the_content(); ?>
                                </p>

                                <!-- <span class="forButton fixed">
                                    <button class="button main__button">узнать больше</button>
                                </span> -->
                            </div>                            
                        </span>
                        </div>

                        <div class="share flex-center-between">
                            <p class="share__text">Поделиться:</p>

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/share.png" alt="" class="share__img">
                        </div>
                    </li>
                    <?php
                }
            } else {
                // Постов не найдено
            }
            // Возвращаем оригинальные данные поста. Сбрасываем $post.
            wp_reset_postdata();?>

        </ul>

        <section class="actions__bonus">
            <div class="container">
                <h2 class="special__heading">
                    Наши спецпредложения
                </h2>

                <ul class="special__list flex-start-start">
                    <?php
                    $product_ids_on_sale = wc_get_product_ids_on_sale();

                    $args = array(
                        'post_type' => 'product',
                        'post__in' => array_merge( array( 0 ), $product_ids_on_sale )
                    );
                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ) : $loop->the_post();
                            wc_get_template_part( 'content', 'product' );
                        endwhile;
                    } else {
                        echo __( 'Продуктов не найдено' );
                    }
                    wp_reset_postdata();
                    ?>
                </ul><!--/.products-->
            </div>
        </section>

        <section class="callme">
            <div class="container call">
                <div class="callme__bg"></div>


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
        </section>
    </div>
</main>

<?php
get_footer();
?>

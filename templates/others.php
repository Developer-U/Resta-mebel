<?php
/*
 * Template Name: Отзывы
 */
get_header();
?>

<main class="rev">
    <div class="container">
        <a href="#" class="breadcrumbs black">главная > <?php the_title(); ?></a>

        <section class="del">
            <h1 class="payment__heading"><?php the_title(); ?></h1>

            <p class="del__text">
                <?php
                 the_content();
                ?>
            </p>
        </section>

        <section class="ourReviews">
            <div class="container containerRew">
                <ul class="ourReviews__list">
                    <?php
                    // задаем нужные нам критерии выборки данных из БД
                    $args = array(
                        'post_type' => 'others',
                    );
                    $query = new WP_Query( $args );
                    // Цикл
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            ?>
                            <li class="ourReviews__item flex-start-between">
                                <div class="ourReviews__left flex-start-start">
                                    <figure class="ourReviews__image">
                                        <img src="<?php echo the_field('фото'); ?>" alt="Фото автора отзыва" class="ourReviews__img">
                                    </figure>

                                    <span class="ourReviews__box">
                                    <p class="ourReviews__name">
                                        <?php the_title(); ?>
                                    </p>

                                    <p class="ourReviews__post">
                                       <?php
                                            the_field('должность');
                                       ?>
                                    </p>

                                    <span class="rating flex-start-between">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Star.svg" alt="звезда рейтинга" class="rating__star">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Star.svg" alt="звезда рейтинга" class="rating__star">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Star.svg" alt="звезда рейтинга" class="rating__star">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Star.svg" alt="звезда рейтинга" class="rating__star">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Star.svg" alt="звезда рейтинга" class="rating__star">
                                    </span>
                                </span>
                                </div>

                                <div class="ourReviews__right">
                                    <p class="ourReviews__text">
                                        <?php the_content(); ?>
                                    </p>
                                </div>
                            </li>
                            <?php
                        }
                    } else {
                        // Постов не найдено
                    }
                    wp_reset_postdata();?>
                </ul>

                <span class="forButton kons">
                        <button class="button kons js-konsOpen">получить бесплатную консультацию эксперта</button>
                    </span>
            </div>
        </section>
    </div>
</main>



<?php
get_footer();
?>

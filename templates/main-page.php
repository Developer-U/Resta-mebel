<?php
/*
 * Template Name: Главная страница
 */
get_header();
?>


<section class="main">
    <div class="main__box">
        <div class="main__slider">
            <div>
                <?php if( have_rows('слайдер') ): ?>
                     <?php while( have_rows('слайдер') ): the_row();
                         $image = get_sub_field('get_slide');
                            $text = get_sub_field('текст_слайдера');
                    ?>
                    <div class="main__slide slide1" style='background: url("<?= $image; ?>"); background-size: cover; background-repeat: no-repeat;' >
                            <span class="actionSpan container mobile-none">
                                <h2 class="main__heads"><?= $text; ?></h2>
                                <div class="actionSpan__descr"></div>
                            </span>

                            <span class="forButton fixed">
                                <a class="button main__button" href="/akcii/">узнать больше</a>
                            </span>
                    </div>
            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>

            <div>
            </div>

            <div class="wideContain mainContain">
                <div class="container flex-start-between">
                    <h1 class="main__heading">Мебель для баров и ресторанов</h1>
                    
                    <span class="forButton main mobile-none">
                        <button class="button main__button js-callOpen">заказать звонок</button>
                    </span>
                </div>
            </div>
        </div>

        <div class="hero-mobile">
           <h2 class="hero-mobile__heading">
               Мебель для баров, ресторанов, отелей и кафе
           </h2> 
        </div>        

        <div class="wideContain forSocial">
            <ul class="social flex-start-between">
                <li class="social__item">
                    <a href="<?php the_field('vk', 'option'); ?>" class="social__link link1"></a>
                </li>
                <li class="social__item">
                    <a href="<?php the_field('telegram', 'option'); ?>" class="social__link link2"></a>
                </li>
                <li class="social__item">
                    <a href="<?php the_field('whatsapp_link', 'option'); ?>" class="social__link link3"></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main__bottom">
        <div class="wideContain">
            <ul class="main__list flex-center-between">
                <li class="main__item one">
                    <p class="main__paragraph">
                        Бесплатная доставка по&nbsp;Сочи
                    </p>
                </li>
                <li class="main__item two">
                    <p class="main__paragraph">
                        Богатый выбор товара в&nbsp;наличии
                    </p>
                </li>
                <li class="main__item three">
                    <p class="main__paragraph">
                        Любые расцветки
                    </p>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container">
        <div class="headingContainer flex-center-between">
            <h2 class="categories__heading">
                Категории товаров
            </h2>

            <a href="/shop" class="categoriesAll">смотреть все категории</a>
        </div>
        <ul class="categories__list flex-start-between">
        <?php
        $taxonomy     = 'product_cat';
        $orderby      = 'name';
			$number = 32; // ради интереса вынесем переменную отдельно
        $show_count   = 1;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no
        $title        = '';
        $empty        = 0;
		

        $args = array(
            'taxonomy'     => $taxonomy,
			'number' => $number,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty,
			
		
        );

        $all_categories = get_categories( $args );
        foreach ($all_categories as $cat) {
            if($cat->category_parent == 0) {
                $category_id = $cat->term_id;
                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image_s = wp_get_attachment_url( $thumbnail_id );
                ?>
            <li class="categories__item">
                <div class="categories__top flex-start-between">
                    <figure class="categories__image">
                        <img src="<?php echo $image_s; ?>" alt="Изображение категории" class="categories__img">
                    </figure>

                    <div class="categories__right">
                        <h3 class="categories__subheading"><?= $cat->name; ?></h3>
                        <?php
                        $category = get_term( $category_id, 'product_cat' );


                        ?>
                        <span class="categories__quality"><?php
                        if ($category->count == 1) {
                            echo $category->count . ' товар';
                        }elseif ( $category->count == 0) {
                            echo 'нет твоваров';
                        }else {
                            echo $category->count . ' товара';
                        }
                        ?>
                    </span>
                    </div>
                </div>

                <ul class="card__list flex-start-start">
                    <?php



                    $args2 = array(
                        'taxonomy'     => $taxonomy,
                        'child_of'     => 0,
                        'parent'       => $category_id,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty,
                        'number'   => 4
                    );

                    $sub_cats = get_categories( $args2 );
                    if($sub_cats) {
                        foreach($sub_cats as $sub_category) {
                            ?>
                            <li class="card__item">
                                <a href="<?= $cat->slug . $sub_category->slug; ?>" class="card__click"></a>
                                <span class="card__img"></span>

                                <a href="<?= '/product-category/' . $cat->slug . '/' . $sub_category->slug; ?>/" class="card__link">
                                    <?= $sub_category->name; ?>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>

                <div class="categories__more flex-start-start">
                    <a href="#" class="moreLink"></a>

                    <a href="<?= '/product-category/' . $cat->slug; ?>" class="allProducts">все товары этой категории</a>
                </div>
            </li>
        <?php
         }
      }
        ?>
        </ul>
    </div>
</section>

<section class="special">
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
                echo __( 'Узнать о спецпредложениях вы можете по номеру   <a class="phones__address tel2" href="tel:+79890430407"> +7(989) 083 04 07</a>' );
            }
            wp_reset_postdata();
            ?>
        </ul><!--/.products-->

    </div>
</section>

<section class="why">
    <div class="container index">
        <h2 class="why__heading">
            Почему стоит приобретать мебель в&nbsp;Resta?
        </h2>

        <p class="why__text">
            Наш бизнес создан для того, чтобы вы&nbsp;в&nbsp;любое время могли заказать
            качественную мебель для баров и&nbsp;ресторанов без лишних движений.
            В&nbsp;интернет-магазине компании Resta вы&nbsp;можете приобрести как стандартную,
            так и&nbsp;<strong>авторскую, дизайнерскую мебель.</strong>
        </p>

        <p class="why__text">
            <strong>Мы&nbsp;работаем напрямую с&nbsp;фабриками,</strong> поэтому гарантируем низкие цены.
            Приобретая мебель в&nbsp;компании Resta, вы&nbsp;получаете мебель особой прочности,
            так как к&nbsp;мебели для объектов общепита предъявляются особые требования к&nbsp;
            износоустойчивости. Вы&nbsp;можете приобрести мебель как для бара, кафе или
            ресторана, так и&nbsp;для дома и&nbsp;офиса.
        </p>

        <p class="why__text">
            <strong>Вот почему стоит приобретать мебель именно у&nbsp;нас:</strong>
        </p>

        <ul class="why__list flex-start-between">
            <li class="why__item">
                <span class="itemBox price"></span>

                <p class="itemBox__text">
                    Работаем напрямую с&nbsp;производителями, поэтому гарантируем низкую цену
                </p>
            </li>
            <li class="why__item">
                <span class="itemBox delivery"></span>

                <p class="itemBox__text">
                    Бесплатная доставка по&nbsp;Сочи
                </p>
            </li>
            <li class="why__item">
                <span class="itemBox product"></span>

                <p class="itemBox__text">
                    Большой выбор товара в&nbsp;наличии на&nbsp;складе Сочи
                </p>
            </li>
            <li class="why__item">
                <span class="itemBox color"></span>

                <p class="itemBox__text">
                    Вы&nbsp;можете выбрать любой цвет ткани под ваш интерьер
                </p>
            </li>
        </ul>

        <h2 class="must">
            Какой должна быть мебель для баров и&nbsp;ресторанов?
        </h2>
    </div>

    <div class="must__box">
        <div class="must__image"></div>

        <div class="container">
            <div class="must__contain">
                <p class="must__text">
                    Мебель в&nbsp;объектах общепита изнашивается гораздо быстрее, чем в&nbsp;офисах
                    и&nbsp;квартирах. Мы&nbsp;обращаем ваше внимание на&nbsp;то, что мебель для
                    кафе, столовых, ресторанов должна обладать особыми характеристиками, она должна
                    быть:
                </p>

                <ul class="must__list flex-start-between">
                    <li class="must__item">
                        <p>
                            износоустойчивой
                        </p>
                    </li>
                    <li class="must__item">
                        <p>
                            гипоаллергенной
                        </p>
                    </li>
                    <li class="must__item">
                        <p>
                            долговечной
                        </p>
                    </li>
                    <li class="must__item">
                        <p>
                            огнеупорной
                        </p>
                    </li>
                    <li class="must__item">
                        <p>
                            функциональной
                        </p>
                    </li>
                    <li class="must__item">
                        <p>
                            с оригинальным дизайном
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="clients">
    <div class="container">
        <h2 class="clients__heading">
            Наши клиенты
        </h2>

        <div class="clients__slider">
            <?php if( have_rows('add_new_logo', 'options') ): ?>
                <?php while( have_rows('add_new_logo', 'options') ): the_row();
                    $image_logo = get_sub_field('clients_logo', 'options');
                    ?>
            <div>
                <div class="clients__slide">
                    <img src="<?= $image_logo; ?>"  class="clients__img">
                </div>
            </div>
            <?php
                endwhile;
                endif;
            ?>
        </div>

        <h2 class="works">
            Наши выполненные проекты
        </h2>

        <div class="works__slider">
            <?php if( have_rows('add_new_project','options') ): ?>
                <?php while( have_rows('add_new_project','options') ): the_row();                   
                    $text_project = get_sub_field('project_text','options');
                    $project_photo = get_sub_field('img_project','options');                
                ?>
            <div>
                <div class="works__slide">
                    <a href="<?= $project_photo; ?>" data-fancybox>                  
                        <figure class="works__image">
                            <img src="<?= $project_photo; ?>" class="works__img">
                        </figure>
                    </a>              

                    <p class="works__text"><?= $text_project; ?></p>                                        
                </div>
            </div>
            <?php
            endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="contacts__bg"></div>

    <div class="container">
        <h2 class="contacts__heading">
            Напишите нам! Мы на связи
        </h2>

        <div class="form">
            <?php echo do_shortcode('[contact-form-7 id="100" title="Основная форма на главной"]');?>
        </div>
    </div>
</section>





<?php
get_footer();
?>

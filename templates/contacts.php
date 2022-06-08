<?php
/*
 * Template Name: контакты
 */
get_header();
?>


<main class="actions white">
    <div class="container">
        <a href="#" class="breadcrumbs black">главная > <?php the_title(); ?></a>

        <section class="del">
            <h1 class="payment__heading">Контакты компании «Resta мебель»</h1>

            <ul class="contacts__list flex-start-between">
                <li class="contacts__item">
                    <a class="contacts__link contactPhone" href="tel:+7<?php the_field('телефон_1', 'option');?>"><?php the_field('телефон_1', 'option');?></a>
                </li>

                <li class="contacts__item">
                    <a class="contacts__link contactGeo" target="_blank" href="https://yandex.ru/maps/-/CCUybAHPGC"><?php the_field('адрес', 'option');?></a>
                </li>

                <li class="contacts__item">
                    <a class="contacts__link contactWhatsApp" href="https://api.whatsapp.com/send?phone=7<?php the_field('телефон_1', 'option');?>"><?php the_field('whatsapp', 'option');?></a>
                </li>

                <li class="contacts__item">
                    <a class="contacts__link contactVk" target="_blank" href="#"><?php the_field('vk', 'option');?></a>
                </li>

                <li class="contacts__item">
                    <a class="contacts__link contactMail" target="_blank" href="#"><?php the_field('почта', 'option');?></a>
                </li> 
            </ul>
        </section>

        <section class="requisites">
            <?php
                the_content();
            ?>
        </section>
    </div>
</main>

<section class="info">
    <div class="container">
        <h2 class="contacts__heading">
            Юридическая информация
        </h2>

        <p class="del__text">
            ИП Просянников А.С.
        </p>

        <p class="del__text">
            Почтовый адрес: 354340 , Россия, Краснодарский край, г. Сочи, ул. Православная, д. 13А
        </p>

        <p class="del__text">
            ИНН: 6154124966904
        </p>

        <p class="del__text">
            ОГРНИП 314236721300030
        </p>

        <p class="del__text">
            Контакты: Просянников Андрей Сергеевич +7(928)-245-58-11; E-mail: sochi-132@yandex.ru
        </p>
    </div>
</section>

<section class="clients">
    <div class="container">
        <h2 class="works">
            Документы
        </h2>

        <div class="docs-slider">
            <?php if( have_rows('add_doc') ): ?>
                <?php while( have_rows('add_doc') ): the_row();                   
                    $text_doc = get_sub_field('doc_text');
                    $doc_photo = get_sub_field('doc__image');                
                ?>
            <div>
                <div class="works__slide">
                    <a href="<?= $doc_photo; ?>" data-fancybox>                  
                        <figure class="works__image">
                            <img src="<?= $doc_photo; ?>" class="works__img">
                        </figure>
                    </a>              

                    <p class="works__text"><?= $text_doc; ?></p>                                        
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
            <?php echo do_shortcode('[contact-form-7 id="104" title="Контактная форма на странице Контакты"]'); ?>
        </div>
    </div>
</section>


<?php
get_footer();
?>

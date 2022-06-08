<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package estore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
   
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css">
    <link rel="shortcut icon" href="https://restamebel.com/wp-content/uploads/2022/03/favicon.ico">
	<?php wp_head(); ?>
</head>
<?php
if(is_shop() || is_product_taxonomy()){ ?>
    <div class="categiriesMain cat">
        <div class="filterCat">
            <span class="filterCat__price">Цена</span>

            <img src="<?php echo template_directory_uri(); ?>/assets/img/priceLine.png" alt="" class="filterCat__img">

            <span class="filterCat__prices flex-start-between">
                <input type="text" class="priceInput" placeholder="1024">
                <input type="text" class="priceInput" placeholder="99999">
            </span>

            <div class="filterCat__type">
                <h3 class="filterCat__heading">По типу</h3>

                <input type="checkbox" class="typeInput">барные<br>
                <input type="checkbox" class="typeInput">обеденные<br>
                <input type="checkbox" class="typeInput">банкетные<br>
                <input type="checkbox" class="typeInput">уличные<br>
                <input type="checkbox" class="typeInput">складные<br>
                <input type="checkbox" class="typeInput">с мягкой спинкой<br>
                <input type="checkbox" class="typeInput">с мягким сиденьем<br>
                <input type="checkbox" class="typeInput">с жестким сиденьем
            </div>

            <div class="filterCat__type">
                <h3 class="filterCat__heading">По материалу</h3>

                <input type="checkbox" class="typeInput">деревянный каркас<br>
                <input type="checkbox" class="typeInput">металлокаркас<br>
                <input type="checkbox" class="typeInput">пластик
            </div>

            <div class="filterCat__type">
                <h3 class="filterCat__heading">По стилю</h3>

                <input type="checkbox" class="typeInput">Eames<br>
                <input type="checkbox" class="typeInput">mid-century modern<br>
                <input type="checkbox" class="typeInput">Tolix<br>
                <input type="checkbox" class="typeInput">венский<br>
                <input type="checkbox" class="typeInput">классический<br>
                <input type="checkbox" class="typeInput">дизайнерский
            </div>

            <div class="filterCat__type">
                <h3 class="filterCat__heading">По типу заведения</h3>

                <input type="checkbox" class="typeInput">банкетный зал<br>
                <input type="checkbox" class="typeInput">конференц-зал<br>
                <input type="checkbox" class="typeInput">ресторан / кафе / бар<br>
                <input type="checkbox" class="typeInput">столовая<br>
                <input type="checkbox" class="typeInput">уличное кафе / терраса<br>
                <input type="checkbox" class="typeInput">аппартаменты
            </div>

            <button type="submit" class="buttonFilter">применить</button>
        </div>

        <ul>
            <?php
            $parentid = get_queried_object_id();
            $args = array(
                'parent' => $parentid,
                'hide_empty' => false
            );
            $terms = get_terms( 'product_cat', $args );
            if ( $terms ) {
                echo '<div class="content-container__catalog-list"><ul class="catalog-list">';
                foreach ( $terms as $term ) {
                    echo '<li class="catalog-list-block">';
                    //woocommerce_subcategory_thumbnail( $term );
                    echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . ' catalog-list-block__title">';
                    echo $term->name;
                    echo '</a>';
                    echo '</li>';
                }
                echo '</ul></div>';
            }

            ?>
        </ul>
    </div>

<?php }
?>

<body>
<div class="topCat2 js-closeCat">
    <p>КЛИКНИТЕ, ЧТОБЫ СКРЫТЬ КАТЕГОРИИ</p>
</div>

<div class="topCat js-openCat">
    <p>КЛИКНИТЕ, ЧТОБЫ УВИДЕТЬ КАТЕГОРИИ</p>
</div>
<ul aria-hidden="false" class="categoriesMain js-Cat">
<?php
$args = array('taxonomy' => 'product_cat', 'parent' => 0, 'hide_empty' => false,);
$categories = get_categories( $args );
foreach( $categories as $item_cat ) {
	$category_id = $item_cat->term_id;
	$thumbnail_id = get_term_meta( $item_cat->term_id, 'thumbnail_id', true );
	$image_s = wp_get_attachment_url( $thumbnail_id );
    ?>
    <li class="categoriesMain__item">
 
		<div class="street mobile-none" style="background: url('<?php echo $image_s; ?>'); background-size:cover;"></div>
        <a href="/product-category/<?php echo $item_cat->slug; ?>">
        <?php
            echo $item_cat->name;
        ?>
        </a>
    </li>
    <?php
}
?>
</ul>

<header class="header">
    <div class="header__top">
        <div class="wideContain flex-start-between">
            <a href="/" class="header__logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Логотип Resta" class="header__img">
            </a>

            <button type="submit" class="burger js-burgerOpen">
                <span class="burger__stripe one"></span>
                <span class="burger__stripe two"></span>
            </button>

            <div class="burgerAfter">

            </div>
 <?php
          if (get_locale() == 'en_US') {
             ?>
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__li">
                        <a href="/en/o-nas" class="header__link">
                            about us
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/dostavka-i-oplata" class="header__link">
                            доставка и оплата
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/otzyvy/" class="header__link">
                            отзывы
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/akcii/" class="header__link">
                            акции
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/voprosy-otvety" class="header__link">
                            вопрос-ответ
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/kontakty/" class="header__link">
                            контакты
                        </a>
                    </li>
                </ul>
            </nav>	
          <?php

          }elseif(get_locale() == 'ru_RU') {
             ?>
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__li">
                        <a href="/o-nas" class="header__link">
                            о компании
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/dostavka-i-oplata" class="header__link">
                            доставка и оплата
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/otzyvy/" class="header__link">
                            отзывы
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/akcii/" class="header__link">
                            акции
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/voprosy-otvety" class="header__link">
                            вопрос-ответ
                        </a>
                    </li>
                    <li class="header__li">
                        <a href="/kontakty/" class="header__link">
                            контакты
                        </a>
                    </li>
                </ul>
            </nav>
          <?php
          }
?>

 <?php
          if (get_locale() == 'en_US') {
             ?>
            <div class="language mobile flex-start-between">
					<a href="/" class="language__button">
						RU
					</a>
				<a href="/en" class="language__button active">
						EN
				</a>
            </div>
          <?php

          }elseif(get_locale() == 'ru_RU') {
             ?>
            <div class="language mobile flex-start-between">
					<a href="/" class="language__button active">
						RU
					</a>
				<a href="/en" class="language__button">
						EN
				</a>
            </div>
          <?php
          }
?>


            <div class="phones flex-start-between">
                <address class="phones__addresses">
                    <a href="tel:+7<?php the_field('телефон_1', 'option');?>" class="phones__address tel"><?php the_field('телефон_1', 'option');?></a>
                    
                    <a href="mailto:" class="phones__address mail"><?php the_field('почта', 'option');?></a>
                </address>

                <div class="language flex-start-between">\
					<a href="/" class="language__button">
						RU
					</a>
					<a href="/en" class="language__button">
						EN
					</a>
                    
                </div>

                <div class="registerMobile">
					<a href="/my-account">
                    <button class="registerMobile__text"></button>
					</a>
                <a href="/cart">
                     <button class="registerMobile__button"></button>
					<span class="cart__cunt">
						    <?php
    global $woocommerce; ?>
					<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>
					</span>
                </a>
                 
                </div>
            </div>
        </div>
    </div>

    <div class="header__bottom">
        <div class="wideContain flex-start-between">
            <div class="header__research">
                <?php echo do_shortcode('[yith_woocommerce_ajax_search]');?>
            </div>

            <div class="register flex-start-between">
                <a href="/my-account">
                    <button class="register__text">
                        Личный кабинет
                    </button>
                </a>

                <a href="/cart">
                    <button class="register__button"></button>
					<span class="cart__cunt">
						    <?php
    global $woocommerce; ?>
					<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>
					</span>
                </a>
            </div>
        </div>
    </div>
</header>

<header class="headerFixed">
    <div class="container flex-start-between">
        <nav class="header__nav">
            <ul class="header__list">
                <li class="header__li">
                    <a href="/o-nas" class="header__link">
                        о компании
                    </a>
                </li>
                <li class="header__li">
                    <a href="/dostavka-i-oplata" class="header__link">
                        доставка и оплата
                    </a>
                </li>
                <li class="header__li">
                    <a href="/otzyvy/" class="header__link">
                        отзывы
                    </a>
                </li>
                <li class="header__li">
                    <a href="/akcii/" class="header__link">
                        акции
                    </a>
                </li>
                <li class="header__li">
                    <a href="/voprosy-otvety" class="header__link">
                        вопрос-ответ
                    </a>
                </li>
                <li class="header__li">
                    <a href="/kontakty/" class="header__link">
                        контакты
                    </a>
                </li>
            </ul>
        </nav>

        <div class="headerFixed__block flex-start-between">
            <address class="headerFixed__addresses">
                <a href="tel:+7<?php the_field('phone1_link', 'option');?>" class="phones__address tel"><?php the_field('телефон_1', 'option');?></a>
            </address>

            <span class="forButton fixed mobile-none">
                    <button class="button main__button">заказать звонок</button>
                </span>
        </div>
    </div>
</header>
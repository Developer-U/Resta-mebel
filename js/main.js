window.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('.js-openGal').forEach(function(btnTabs){
    btnTabs.addEventListener('click', function(event){
        const path = event.currentTarget.dataset.path;

        document.querySelector(`[data-target = "${path}"]`).classList.add('active');
    });
  });
});

jQuery (function($) { 

  // Слайдер на главной
  $('.main__slider').slick ({        
    infinite: true,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2800,
    arrows: true,
    prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
    nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>', 
    responsive: [
      {
        breakpoint: 780,
        settings: {
          arrows: false     
        }
      }    
  ]                   
  });

  // Слайдер клиенты
  $('.clients__slider').slick ({        
    infinite: true,
    dots: false,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2500,
    arrows: true,
    prevArrow: '<button class="slick-show-prev" aria-label="Previous" type="button">Previous</button>',
    nextArrow: '<button class="slick-show-next" aria-label="Next" type="button">Next</button>', 
    responsive: [
            {
              breakpoint: 1023,
              settings: {
                slidesToShow: 3,       
              }
            }, {
              breakpoint: 780,
              settings: {
                slidesToShow: 2       
              }
            }

    ]              
  });

  // Слайдер работы
  $('.works__slider').slick ({        
    infinite: true,
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2500,
    arrows: true,
    prevArrow: '<button class="slick-show-prev middle" aria-label="Previous" type="button">Previous</button>',
    nextArrow: '<button class="slick-show-next middle" aria-label="Next" type="button">Next</button>',  
    responsive: [
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 2,       
        }
      }, {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,       
        }
      }   
  ]                  
  });


   // Слайдер документы
   $('.docs-slider').slick ({        
    infinite: true,
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2500,
    arrows: true,
    prevArrow: '<button class="slick-show-prev middle" aria-label="Previous" type="button">Previous</button>',
    nextArrow: '<button class="slick-show-next middle" aria-label="Next" type="button">Next</button>',  
    responsive: [
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 2,       
        }
      }, {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,       
        }
      }   
  ]                  
  });


  // Скролл сайдбара на странице Категории

  $(window).scroll(function(){
    if($(this).scrollTop()>=700) {
      $('.categ').css({ 
        'top':'10px',
        'z-index': 10     
      }); 
    } else {
      $('.categ').css({        
        'top':'',
        'z-index': 99     
      }); 
    }
  });

  // Открытие категорий  

  let openCat = $('.topCat')
    ,closeCat = $('.topCat2')
    ,cat = $('.js-Cat')
    ,filterOpen = $('.js-catButton')
    ,filterCont = $('.categoriesMain')
    ,filterClose = $('.filterClose')
    ,filterButton = $('.buttonFilter'); 

  openCat.on('click', function(){
    $(this).fadeOut(200);
    closeCat.fadeIn(300);

    // if(cat.css('display') =='none') {
    //   cat.fadeIn('200');
    // }

    cat.attr('aria-hidden', 'true');

    if(filterCont.css('left') !== '-100vw') {
      filterCont.animate({
        'left':'-100vw',
        'top':''
      }, 700);    
    }

    

    if($(window).width()>=991) {
      cat
        .animate({
          'left':'59px',
          'top': '0'     
        }, 700)
        .css('position','fixed');

      filterOpen.css({
        'width':'80%',
        'margin-left':'auto'
      }, 400);
    } else {
      cat
        .animate({
          'left':'40px',
          'top': '0'       
        }, 700)
        .css('position','fixed');
    }      
  });

  closeCat.on('click', function(){
    $(this).fadeOut(200);
    openCat.fadeIn(300);

    
    cat.attr('aria-hidden', 'false');

    filterOpen.css({
      'width':'',
      'margin-left':''
    }, 400);

    if($(window).width()>=1600) {
      cat
      .animate({
        'left':'0',
        'top': ''       
      }, 700)
      .css('position','');

    } else {
      cat.animate({
        'left':'-100vw',
        'top': ''       
      }, 700)
      .css('position','');
    }

    // if(cat.css('display') =='block') {
    //   cat.fadeOut('200');
    // }
    
  });

 

  // Появление headerFixed хедера

  $(window).scroll(function(){
    if($(this).scrollTop()>=600) {
      $('.headerFixed').fadeIn(700);

      if($(this).width()>=1439) {
        $('.categoriesMain').css('top','5px');
      } else {
        $('.categoriesMain').css('top','59px');
      }
      
    } else {
      $('.headerFixed').fadeOut(600);

      $('.categoriesMain').css('top','');    
    }
  });


  // Открытие вопросов на странице Вопрос-ответ

  var List = $('.js-List');

  List.on('click', '.js-arrow', function(e){
    event.preventDefault();

    var Arrow = $(this)
       ,boxItem = Arrow.parents('.js-item')
       ,oneItem = boxItem.find('.js-div');

    if(oneItem.attr('aria-expanded') == 'false') {
      oneItem.attr('aria-expanded', 'true');
      Arrow.attr('aria-hidden', 'Свернуть вопрос');
    } else {
      oneItem.attr('aria-expanded', 'false');
      Arrow.attr('aria-hidden', 'Развернуть вопрос');
    }

    oneItem.slideToggle(700);
    Arrow.toggleClass('rotateArrow');
  });


      /*Бургерное меню*/

      var buttonOpen = $('.js-burgerOpen')
      ,popupBurger = $('.js-burgerMenu')
      ,buttonClose = $('.js-burgerClose')
      ,stripeOne = $('.js-stripeOne')
      ,stripeTwo = $('.js-stripeTwo')
      ,linkBurger = $('.js-burgerLink');

   buttonOpen.on('click', function(e){
       event.preventDefault();            

       popupBurger.fadeIn(700);

       buttonClose            
           .fadeIn(100)
           .animate({
           right: '40px'           
       }, 900); 

      

       stripeOne.toggleClass('burger__stripeOneActive');

       stripeTwo.toggleClass('burger__stripeTwoActive');
   });

   buttonClose.on('click', function(e){
       event.preventDefault();

       $(this)
           .fadeOut(300)
           .animate({
               right: '80vw'           
           }, 300); 

       popupBurger.fadeOut(400); 
       
       stripeOne.toggleClass('burger__stripeOneActive');

       stripeTwo.toggleClass('burger__stripeTwoActive');
   }); 

   linkBurger.on('click', function(){
       buttonClose
           .fadeOut(300)
           .animate({
               right: '80vw'           
       }, 300); 

       popupBurger.fadeOut(400); 
       
       stripeOne.toggleClass('burger__stripeOneActive');

       stripeTwo.toggleClass('burger__stripeTwoActive');
   });

  // Открытие фильтра выбора товаров       

  filterOpen.on('click', function(){
    if(filterClose.css('display') == 'none') {
      filterClose.css('display', 'inline-block');
    }

    // cat.fadeOut('200');

    filterCont.animate({
      'left':'66px',
      'top':'170px'
    }, 700); 

    if($('.js-Cat').attr('aria-hidden') =='false') {
      
      if($(window).width()<=767) {      
        filterCont.animate({
          'left':'40px',
          'top':'0'
        }, 700); 
      }       

    } else {   

      cat.attr('aria-hidden', 'false');

      cat.animate({
        'left':'-100vw',
        'top': ''       
      }, 700)
      .css('position','');
      
      if(closeCat.css('display') =='block') {
        closeCat.fadeOut(200);
        openCat.fadeIn(300);
      }
    }     

        
  });    

  filterClose.on('click', function(){      
    $('.categoriesMain').animate({
      'left':'-100vw',
      'top':''
    }, 700);        
  });

  filterButton.on('click', function(){
    $('.categoriesMain').animate({
      'left':'-100vw',
      'top':''
    }, 700);  
  });


  // Открытие попапа заказать звонок

  let CallOpen = $('.js-callOpen')
  ,CallItem = $('.js-call')
  ,CallClose = $('.js-callClose');

  CallOpen.on('click', function(e){
      event.preventDefault();

      CallItem.fadeIn(700);

      $('body').css ({
          'height': '100vh',
          'overflow-y': 'hidden',
          'padding-right': '15px' 
      }); 
  });

  CallClose.on('click', function(){
    CallItem.fadeOut(500);

      $('body').css ({
          'height': '',
          'overflow-y': '',
          'padding-right': '' 
      }); 
  });

  $('.js-call').on('click', function(event){
      if(this == event.target) {
        CallItem.fadeOut('500', function(){
          });
      }
  
      $('body').css ({
          'height': '',
          'overflow-y': '',
          'padding-right': '' 
      });      
  
  });


  // Открытие попапа Получить консультацию

  let KonsOpen = $('.js-konsOpen')
  ,KonsItem = $('.js-kons');

  KonsOpen.on('click', function(e){
      event.preventDefault();

      KonsItem.fadeIn(700);

      $('body').css ({
          'height': '100vh',
          'overflow-y': 'hidden',
          'padding-right': '15px' 
      }); 
  });

  CallClose.on('click', function(){
    KonsItem.fadeOut(500);

      $('body').css ({
          'height': '',
          'overflow-y': '',
          'padding-right': '' 
      }); 
  });

  $('.js-kons').on('click', function(event){
      if(this == event.target) {
        KonsItem.fadeOut('500', function(){
          });
      }

      $('body').css ({
          'height': '',
          'overflow-y': '',
          'padding-right': '' 
      });      

  });

  // Открытие попапа Получить консультацию по доставке

  let DelOpen = $('.js-delOpen')
  ,DelItem = $('.js-delivery');

  DelOpen.on('click', function(e){
      event.preventDefault();

      DelItem.fadeIn(700);

      $('body').css ({
          'height': '100vh',
          'overflow-y': 'hidden',
          'padding-right': '15px' 
      }); 
  });

  CallClose.on('click', function(){
    DelItem.fadeOut(500);

      $('body').css ({
          'height': '',
          'overflow-y': '',
          'padding-right': '' 
      }); 
  });

  $('.js-delivery').on('click', function(event){
      if(this == event.target) {
        DelItem.fadeOut('500', function(){
        });
      }
  
      $('body').css ({
          'height': '',
          'overflow-y': '',
          'padding-right': '' 
      });      
  
  });

});


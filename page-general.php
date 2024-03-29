<?php

/**
 * Template Name: Ген. план
 */

// Шаблон для записей

get_header();

?>
<!-- Blog Section Right Sidebar -->
<div class="page-builder genplan">

  <!-- hero section -->
  <div class="container hero-section section">
    <div class="row">
      <div class="col-sm-12 col-md-6 text-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pYMGH3Vp2qc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p>Посмотрите наглядное описание курса от его автора - Игоря Рогачева</p>
      </div>
      <div class="col-sm-12 col-md-6 plan-description">
        <h1 class="text-uppercase">ПОЛНЫЙ КУРС ПО<br/> ГЕН.ПЛАНУ В CIVIL 3D</h1>
        <p class="plan">Реализация генплана в рамках Civil 3D различными способами и инструментами</p>
        <a href="#pricing" class="btn btn-checkout btn-lg fixed-button">УЗНАТЬ ЦЕНУ</a>
      </div>
    </div>
  </div>
  <!-- end hero section -->

  <!-- course description -->
  <div class="container course-description section">
    <h2>ОПИСАНИЕ КУРСА</h2>
    <p>Раздел Генеральный план может быть реализован полностью в рамках Civil 3D. Отличительной особенностью данного раздела является то, что в Civil 3D он может быть выполнен совершенно различными способами и инструментами. Мы постарались охватить в этом курсе наиболее распространённые способы, с детальным объяснением всех преимуществ и недостатков. После прохождения курса вы сможете сами подобрать для себя наиболее оптимальный способ или разработать собственный.</p>
    <p>Внимание! Данный курс затрагивает функционал Civil 3D версии 2018 и старше. В более младших версиях выполнение данного курса будет может быть проблематично.</p>
    <p>Содержание курса:</p>
    <?php get_template_part('template-parts/course', 'program') ?>
  </div>
  <!-- end course descritpion -->

  <div class="course-author container-fluid section">
    <div class="container">
      <h1 class="text-center">У КОГО БУДЕТЕ ОБУЧАТЬСЯ?</h1>
      <div class="row">
        <div class="col-sm-12 col-md-8">
          <ul>
            <li><b>Один из ведущих специалистов в области BIM для инфраструктуры в России.  Более 12 лет практического обучения и внедрения Autodesk Civil 3D.</b> В 2011 году разработал первый базовый общедоступный видеокурс AutoCAD Civil 3D.  </li>
            <li><b>В 2014-2019 годах удостоен персональной наградой «BIM лидер в России» от компании Autodesk.</b> Состоит в клубах BIM лидеров России по архитектуре и инфраструктуре.   Состоит в клубах BIM лидеров России по архитектуре и инфраструктуре.</li>
            <li>Принимал участие в разработке открытого BIM стандарта Autodesk для архитектуры и инфраструктуры для России и последующих его редакций.</li>
            <li><b>Первым в России получил статус Autodesk Elite Expert в области инфраструктуры.</b></li>
            <li> Сертификаты Authorized Instructor Autodesk и Autodesk Civil 3D Certified Professional.</li>
            <li>Принимал участие в разработке пакета адаптации к нормам проектирования РФ (Country kit) для Autodesk Civil 3D и Autodesk InfraWorks.</li>            
            <!-- <li>Опыт преподавания AutoCAD Civil 3D более 10 лет. <b>Первым в России разработал и провел курс по Autodesk Infraworks</b> для партнеров Autodesk.  </li>
            <li><b>Включён в состав экспертного совета при Министерстве строительства РФ</b>, по вопросам поэтапного внедрения BIM-технологий в области промышленного и гражданского строительства.  </li>
            <li>Принимал участие в разработке перового открытого BIM стандарта Autodesk для архитектуры и инфраструктуры для России и последующих его редакций.  </li>
            <li>Входит в команду по разработке регламентов в области BIM для Федерального дорожного агентства «Росавтодор».  </li> -->
          </ul>
          <br>
          <br>
          <div class="pull-right">Игорь Рогачев</div>
        </div>
      </div>
    </div>

    <div class="author-clipped">
      <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/css/author.jpg" alt=""/>
    </div>
  </div>

  <div class="container participation-variants section" id="pricing">
    <h2 class="text-center">ВАРИАНТЫ УЧАСТИЯ</h2>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="panel panel-primary participation">
          <div class="panel-heading">
            <p class="tarif-name">СТАНДАРТ</p>
            <hr>
            <p class="price">15 000₽</p>
            <p class="old-price">18 000₽</p>
          </div>
          <div class="panel-body">
            <p>Полный курс генеральный план в Civil 3D</p>
            <p> 8 разделов, количество уроков - 70, более 10 часов видео</p>
            <div class="checkout">
              <a href="https://infrabim.pro/product/генеральный-план/" class="btn btn-checkout">В КОРЗИНУ</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="panel panel-primary participation">
          <div class="panel-heading">
            <p class="tarif-name">РАСШИРЕННЫЙ</p>
            <hr>
            <p class="price">25 000₽</p>
            <p class="old-price">32 000₽</p>
          </div>
          <div class="panel-body">
            <p>Полный курс генеральный план в Civil 3D</p>
            <p> 8 разделов, количество уроков - 70, более 10 часов видео</p>
            <p>+5 часов персональных консультаций</p>
            <div class="checkout">
              <a href="https://infrabim.pro/product/генеральный-план-расширенный/" class="btn btn-checkout">В КОРЗИНУ</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="panel panel-primary participation">
          <div class="panel-heading">
            <p class="tarif-name">ПРОФЕССИОНАЛ</p>
            <hr>
            <p class="price">50 000₽</p>
            <p class="old-price">78 000₽</p>
          </div>
          <div class="panel-body">
            <p>Полный курс генеральный план в Civil 3D</p>
            <p> 8 разделов, количество уроков - 70, более 10 часов видео</p>
            <p>+10 часов персональных консультаций  </p>
            <p> +Разработка шаблонов</p>
            <div class="checkout">
              <a href="https://infrabim.pro/product/генеральный-план-профиссонал/" class="btn btn-checkout">В КОРЗИНУ</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="panel panel-primary participation">
          <div class="panel-heading">
            <p class="tarif-name">ПРЕМИУМ</p>
            <hr>
            <p class="price">120 000₽</p>
            <p class="old-price">180 000₽</p>
          </div>
          <div class="panel-body">
            <p>Полный курс генеральный план в Civil 3D</p>
            <p> 8 разделов, количество уроков - 70, более 10 часов видео</p>
            <p><b>Полное ведение Ваших проектов</b></p>
            <div class="checkout">
              <a href="https://infrabim.pro/product/генеральный-план-премиум/" class="btn btn-checkout">В КОРЗИНУ</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end particitipation -->

  <!-- course price -->
  <div class="container course-price text-center section">
    <h3>В СТОИМОСТЬ КУРСА ВХОДИТ:  </h3>
    <p>Бессрочный доступ к онлайн курсу </p>
    <p>Ответы на вопросы по прохождению курса </p>
    <p>Шаблон для работы с ГП</p>
  </div>
  <!-- end course price -->

  <div class="container text-center any-questions section">
    <h2>ОСТАЛИСЬ ВОПРОСЫ? </h2>
    <p>Если возникли вопросы по составу курса или его оплате, то задайте их в нашем сообществе <a href=" https://vk.com/infrabim">InfraBIM.Pro</a></p>
    <a href=" https://vk.com/infrabim" class="btn btn-checkout btn-lg">ЗАДАТЬ ВОПРОС</a>
  </div>
  
</div>
<!-- /Blog Section Right Sidebar -->
<?php get_footer(); ?>

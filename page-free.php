<?php

/**
 * Template Name: Free course
 */

get_header();
?>

<div class="genplan">
  <div class="container-fluid author section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7">
          <h1>БЕСПЛАТНЫЙ БАЗОВЫЙ <br> КУРС AUTODESK CIVIL 3D</h1>
          <p class="course-description">7 основных разделов, которые<br> должен знать каждый инженер <br> работающий в Civil3D</p>
          <div class="text-center">
            <a href="#" class="btn btn-checkout btn-lg text-center">ПОЛУЧИТЬ КУРС</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end about author -->

  <!-- course review -->
  <div class="course-review section container">
    <h2>ЧТО ВЫ УЗНАЕТЕ НА КУРСЕ?</h2>
    <p>Курс, который был разработан <a href="httpss://infrabim.pro/рогачёв-игорь-витальевич/">Игорем Рогачёвым</a> и стал уже классическим. По нему выучилось не одно поколение инженеров. Курс стал очень популярным и своего рода стандартом для широкого круга инженеров применяющих Civil 3D в своей практике. Безусловно именно с него надо начинать изучение Civil 3D, тем более он бесплатный!</p>

    <details class="course-contents">
      <summary>Содержание курса</summary>
    </details>
  </div>
  <!-- end course review -->

  <!-- reviews -->
  <div class="container reviews section">
    <h2 class="text-center">ОТЗЫВЫ О КУРСЕ</h2>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/css/reviews.png" alt="" class="img-responsive">
  </div>
  <!-- end reviews -->
  
  <!-- c2a button -->
  <div class="c2a-button text-center section">
    <a href="#" class="btn btn-checkout btn-lg text-center">ПОЛУЧИТЬ КУРС</a>
  </div>
</div>

<?php
get_footer();
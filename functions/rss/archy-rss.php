<?php

add_action('init', 'customRSS');

function customRSS(){
  add_feed('zen', 'customRSSFunc');
}

function customRSSFunc(){
  get_template_part('rss', 'zen');
 }
?>
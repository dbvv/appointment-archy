<?php
function archy_qt_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = ''; // delimiter between crumbs
  $home = 'Главная'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb
 
  global $post;
  $homeLink = home_url();
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>';
 
  } else {
 
    echo '<li><a href="' . $homeLink . '">' . $home . '</a> ';// . '&nbsp &#47; &nbsp';
 
    if ( is_category() ) {
      // $thisCat = get_category(get_query_var('cat'), false);
      // if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
      // echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . '&nbsp &#47; &nbsp';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . '&nbsp &#47; &nbsp';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '&nbsp &#47; &nbsp';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      $self_post_type=get_post_type();
      if ($self_post_type == 'product'){
        $post_type = get_post_type_object($self_post_type);
        $slug = $post_type->rewrite;
        echo ' | <a href="' . $homeLink . '/курсы/">Курсы</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . '&nbsp &#47; &nbsp ' . $before . get_the_title() . $after;
      }
      else if ( $self_post_type != 'post' ) {
        $post_type = get_post_type_object($self_post_type);
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . '&nbsp &#47; &nbsp ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); 
        $w=json_encode($cat);
        $cat = $cat[0];
        switch ($cat->cat_ID){
          case (7):
            $cats='<a href="/%d0%ba%d1%83%d1%80%d1%81%d1%8b/">Курсы</a>'; break;
          default:
            $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . '&nbsp &#47; &nbsp');
            if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
            break;
          }
        echo '   |   '.$cats;
        // [{"term_id":7,"name":"\u041a\u0443\u0440\u0441\u044b","slug":"%d0%ba%d1%83%d1%80%d1%81%d1%8b","term_group":0,"term_taxonomy_id":7,"taxonomy":"category","description":"","parent":0,"count":4,"filter":"raw","cat_ID":7,"category_count":4,"category_description":"","cat_name":"\u041a\u0443\u0440\u0441\u044b","category_nicename":"%d0%ba%d1%83%d1%80%d1%81%d1%8b","category_parent":0}]
        // if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); 
	  if(!empty($cat)){
	  $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . '&nbsp &#47; &nbsp');
	  }
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      // if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>' . '&nbsp &#47; &nbsp';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter;
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
      echo ' ( ' . __('Page','appointment') . '' . get_query_var('paged'). ' )';
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }
 
    echo '</li>';
 
  }
} // end archy_qt_custom_breadcrumbs()
?>
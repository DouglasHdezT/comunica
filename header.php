<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <meta name="viewport" content="height=device-height, user-scalable=no, initial-scale=1.0">
  <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" media="screen" type="text/css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/breakpoints.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/Lux.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/effects.css">
  <link rel="icon" href="<?php bloginfo('template_url')?>/assets/images/favicon-1.ico">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/style.css">
  <?php if (is_single()) { ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/css/single-restrictions.css" />
  <?php } ?>
  <?php if (is_page()) { ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/css/page-restrictions.css" />
  <?php } ?>
  <?php wp_head();
  $siteurl=get_site_url(); ?>

</head>
<body>
  <?php
  $flag = true;
  if ( have_posts() ) {
    do {
      the_post();
      if($flag){
        ?>
        <div class='initial-banner-container'>
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('post-thumbnails',array('class'=>'initial-banner'));
          }?>
          <div class='filter-banner'></div>
          <div id="skip-banner" class="down-slide"><div style="padding:20px"><img src="http://comunicasv.com/wp-content/themes/comunica/assets/images/logo-navbar.png" width="15%"/>
            <span style="padding:5px;font-size:2em;display:block" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></div></div>
          </div>
          <?php
          $flag = false;
        }
      } while ( have_posts() );
    } // end if
    ?>
    <div class="logo-container">
      <a style="text-align:center" href="<?php home_url() ?>"><img src="<?php echo get_header_image(); ?>" alt="" width="50%"></a>
    </div>
    <!-- Barra de dezplazamiento inicial
    <a class="prevent"><h1 class="arrow-down"><span class=" glyphicon glyphicon-chevron-down" aria-hidden="true"></span></h1></a>
    Barra de barra de navegación principal-->
    <nav class="dark-blue-nav" id="first-nav">
      <?php
      wp_nav_menu(array(
        'theme_location'=>'secciones',
        'container'=>'div',
        'container_class'=>'section-containers',
        'items_wrap'=>'<ul class="drak-ul" id="style-7"> %3$s</ul>'
      ));
      ?>
    </nav>
    <!--menus desplegables-->
    <div class="container-fluid">
      <div class="row">
        <?php
        $theme_locations = get_nav_menu_locations();
        $menu_obj = get_term( $theme_locations['secciones'], 'nav_menu' );
        $menu_name = $menu_obj->name;
        query_posts('');
        for($i=0;$i<count($items);$i++){
          $flag = true;
          if ( have_posts() ) {
            do {
              the_post();
              echo "Categoria del post".the_category(); 
              if(in_category($items[$i]->title)){
                echo $items[$i]->title." entre";
                if($flag){
                  $url = nameToUrl($items[$i]->title);?>
                  <div class="last-new <?php $s = str_replace(' ','_',$items[$i]->title); echo $s ?>">
                    <div class="col-md-4">
                      <?php
                      if ( has_post_thumbnail() ) {
                        the_post_thumbnail('post-thumbnails',array('class'=>'img-responsive'));
                      }?>
                    </div>
                    <div class="col-md-8">
                      <h2><?php the_title(); ?></h2>
                      <?php the_excerpt(); ?>
                      <a href="<?php the_permalink();?>" class="btn btn-secondary">Leer Más <span class="glyphicon glyphicon-chevron-right" style="font-weight: 100" aria-hidden="true"></span></a>
                      <a href="<?php echo $siteurl.'/'.$url ?>" class="btn btn-secondary"><?php echo 'Ir a '.$items[$i]->title; ?> <span class="glyphicon glyphicon-chevron-right" style="font-weight: 100" aria-hidden="true"></span></a>

                    </div>
                  </div>
                  <?php $flag = false; ?>
                <?php }
                //
              }// Post Content here
              //
            }while ( have_posts() ); // end while
          } // end if
        }
        wp_reset_query();
        ?>
        <!--fin menus desplegables-->
      </div>
    </div>
    <nav class="dark-blue-nav-scrolling">
      <div id="menu" class="buttom">
        <span id="menu-trigger" style="top:10px" class="button-gradient glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
      </div>
      <div class="logo-nav">
        <img class="logo-header" src="<?php bloginfo('template_url') ?>/assets/images/logo-navbar.png ?>">
      </div>
      <div class="reset"></div>
    </nav>
    <nav class="dark-blue-nav-movil">
      <div id="menu-movil" class="buttom" style="width:37%;margin-top:10px">
        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="font-size:20px"></span>
      </div>
      <div class="logo-nav">
        <img style="box-shadow: none" src="<?php bloginfo('template_url') ?>/assets/images/navScroll.png">
      </div>
    </nav>
    <div class="section-container-scrolling">
      <?php
      wp_nav_menu(array(
        'theme_location'=>'secciones-scrolling',
        'container'=>'div',
        'container_class'=>'menu-scrolling-bar',
        'items_wrap'=>'<ul class="menu-scrolling">%3$s</ul>'

      ));
      ?>
      <div class="display-view padre">
        <div class="view hijo">
        </div>
      </div>
    </div>

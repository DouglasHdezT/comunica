<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <meta name="viewport" content="height=device-height, user-scalable=no, initial-scale=1.0">
  <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

  <link rel="icon" href="<?php bloginfo('template_url')?>/assets/images/favicon-1.ico">

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" media="screen" type="text/css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/Lux.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/effects.css">
  <!-- Editados personales-->
  <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/breakpoints.css">

  <!-- Imrpimir el script -->
  <noscript id="deferred-styles">
      <link rel="stylesheet" type="text/css" href="style.css"/>
  </noscript>
  <script>
      var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
      };
      var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
          window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
      else window.addEventListener('load', loadDeferredStyles);
  </script>
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
    include 'initial-banner.php';
  ?>
    <div class="logo-container">
      <div id="menu" class="buttom">
        <span id="menu-trigger" style="top:2px" class="button-gradient glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
      </div>
      <a class="link-logo" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_header_image(); ?>" alt=""></a>
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
        $allPost = get_posts(array(
          'numberposts'=>-1
        ));
        $theme_locations = get_nav_menu_locations();
        $menu_obj = get_term( $theme_locations['secciones'], 'nav_menu' );
        $menu_name = $menu_obj->name;
        $items = wp_get_nav_menu_items($menu_name);
        //print_r($items);
        for($i=0;$i<count($items);$i++){
          if($allPost){
            foreach($allPost as $post){
              setup_postdata($post);
              if(in_category($items[$i]->title)){
                $url = nameToUrl($items[$i]->title);?>
                <div class="last-new <?php $s = str_replace(' ','_',$items[$i]->title); echo $s ?>">
                  <div class="row">
                    <div class="col-md-4">
                      <?php
                      if ( has_post_thumbnail() ) {
                        the_post_thumbnail('post-thumbnails',array('class'=>'img-responsive lazyload'));
                      }?>
                    </div>
                    <div class="col-md-8">
                      <h2><?php the_title(); ?></h2>
                      <?php the_excerpt(); ?>
                      <a href="<?php the_permalink();?>" class="btn btn-secondary">Leer Más <span class="glyphicon glyphicon-chevron-right" style="font-weight: 100" aria-hidden="true"></span></a>
                      <a href="<?php echo $siteurl.'/'.$url ?>" class="btn btn-secondary"><?php echo 'Ir a '.$items[$i]->title; ?> <span class="glyphicon glyphicon-chevron-right" style="font-weight: 100" aria-hidden="true"></span></a>
                      <?php
                      // codigo de childens
                      $children = getChildrenSubMenu($items[$i]->ID);
                      if($children){
                      ?>
                      <div class="child-section">
                        <?php
                          foreach($children as $child){
                          ?>
                            <div class="child-box" style="background-imgae:url('<?php echo getThumbnailPostByCategory($child->title); ?>')">
                              <a href="<?php echo $child->url ?>"><?php echo $child->title ?></a>
                            </div>
                          <?php  
                          }
                        }
                        ?>
                      </div>
                    </div>  
                  </div>
                </div>
              <?php
                break;
              }
            }
          }
        }
        ?>
      </div>
    </div>
    <!--fin menus desplegables-->
        
    <nav class="dark-blue-nav-movil">
      <div id="menu-movil" class="buttom">
        <span class="button-gradient glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="font-size:20px"></span>
      </div>
    </nav>
    <div class="section-container-scrolling">
      <?php
      wp_nav_menu(array(
        'theme_location'=>'secciones-scrolling',
        'container'=>'div',
        'container_class'=>'menu-scrolling-bar',
        'items_wrap'=>'<ul id="style-7" class="menu-scrolling">%3$s</ul>'

      ));
      ?>
      <div class="display-view padre">
        <div class="view hijo">
        </div>
      </div>
    </div>

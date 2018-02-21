<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" media="screen" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/Lux.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/assets/css/effects.css">
    
    <?php wp_head(); ?> 
</head>
<body>
    <div class="logo-container" style="background-image: url('<?php echo get_header_image(); ?>')">
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
            'items_wrap'=>'<ul class="drak-ul" id="home"> <li class="home-link"><a href="'.home_url().'">INICIO</a></li>%3$s</ul>'
        ));
        ?>
    </nav>
    <div class="container-fluid">
        <div class="row">
        <?php
            $theme_locations = get_nav_menu_locations();
            $menu_obj = get_term( $theme_locations['secciones'], 'nav_menu' );
            $menu_name = $menu_obj->name;
            $items = wp_get_nav_menu_items($menu_name);
            query_posts('');
            for($i=0;$i<count($items);$i++){
                        $flag = true;
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post();
                                if(in_category($items[$i]->title)){
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
                                                <?php the_title(); ?>
                                                <?php the_excerpt(); ?>
                                                <a href="<?php the_permalink();?>" class="btn btn-secondary">Leer Más <span class="glyphicon glyphicon-chevron-right" style="font-weight: 100" aria-hidden="true"></span></a>
                                                
                                                <a href="<?php echo get_site_url().'/'.$url ?>" class="btn btn-secondary"><?php echo 'Ir a '.$items[$i]->title; ?> <span class="glyphicon glyphicon-chevron-right" style="font-weight: 100" aria-hidden="true"></span></a>
                                                
                                            </div>
                                        </div>
                                        <?php $flag = false; ?>


                                <?php }
                                //
                                }// Post Content here
                                //
                            } // end while
                        } // end if
            }
            wp_reset_query();
        ?>
        </div>
    </div>
    <nav class="dark-blue-nav-scrolling">
       <div id="menu" class="buttom">
           <span style="top:10px" class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
       </div>
       <div class="logo-nav">
           <img src="<?php bloginfo('template_url') ?>/assets/images/navScroll.png">
        </div>
        <div class="reset"></div>
    </nav>
    <nav class="dark-blue-nav-movil">
       <div id="menu-movil">
           <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
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


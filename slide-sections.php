<div class="no-slide">
    <section id="slideshow-sections">
        <?php
        $theme_locations = get_nav_menu_locations();
        $menu_obj = get_term( $theme_locations['secciones'], 'nav_menu' );
        $menu_name = $menu_obj->name;
        $count_secc = 1;
        $open = 0;
        $items = wp_get_nav_menu_items($menu_name);
        foreach( $items as $item ) {
            if($count_secc == 1 && $open == 0){
              echo '<div class="slide">';
              $open=1;
            }
            if ( have_posts() ) {
              while ( have_posts() ) {
                the_post();
                  if(in_category($item->title)){
                    ?>
                    <div class="col-sm-3" style="padding:0">
                        <div class="container-post">
                            <div class=" slider-container   material-container">
                                <div class="crop-image-slider">
                                    <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                      }
                                    ?>
                                </div>
                            </div>
                            <div class="center-full-slide">
                                <div class="align-buttom-slide">
                                    <h4 style="color:#fff">
                                        <?php the_title(); ?>
                                    </h4>
                                    <?php the_excerpt(); ?>
                                    <a href='<?php the_permalink(); ?>' style="font-weight:bold;color:#fff;font-size:1em">Leer Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if($count_secc == 4 && $open==1){
                      echo '</div>';
                      $count_secc =1;
                      $open=0;
                    }
                    $count_secc++;
                    }
                  }
        }

      }
      if($count_secc != 0){
        echo '</div>';
      }

        ?>
    </section>
</div>

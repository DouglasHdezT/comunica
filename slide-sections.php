<div class="no-slide">
    <section id="slideshow-sections">
    <?php  $args = array(
  'posts_per_page' => 1, // we need only the latest post, so get that post only
  'category_name' => 'SLUG OF FOO CATEGORY', // Use the category id, can also replace with category_name which uses category slug
  //'category_name' => 'SLUG OF FOO CATEGORY,
              );
              $q = new WP_Query( $args);

              if ( $q->have_posts() ) {
                while ( $q->have_posts() ) {
                $q->the_post();
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
                                        <?php the_title() ?>
                                    </h4>
                                    <?php the_excerpt() ?>
                                    <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1em">Leer Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    the_title();
                }
                wp_reset_postdata();
              }?>



        ?>
    </section>
</div>

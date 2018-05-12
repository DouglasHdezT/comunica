<div class="no-slide">
    <section id="slideshow-sections">
        <?php
        $counter=1;
        $flagged=0;
        $categories = get_categories();
        foreach ( $categories as $category ) {
        $args = array(
            'cat' => $category->term_id,
            'post_type' => 'post',
            'posts_per_page' => '1',
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            if($counter==1 && $flagged==0){
              echo "<div class='slider'>";
              $flagged=1;
              }
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
                                    <a href="<?php the_permalink(); ?>" style="font-weight:bold;color:#fff;font-size:1em">Leer Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php

                  if($counter==4 && $flagged==1){
                    echo "</div>";
                    $counter=0;
                    $flagged=0;
                    }
                  $counter++;
                }
                }
                    }
                    if($flagged==1){
                      echo "</div>";}?>
    </section>
</div>

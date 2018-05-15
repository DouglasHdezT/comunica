<div class="no-slide">
    <section id="slideshow-sections">
        <?php
        $counter=1;
        $flagged=0;
        $categories = get_categories();
        foreach ( $categories as $category ) {
            $nameUrl = $category->name;
            $url = nameToUrl($category->name);
            $args = array(
                'cat' => $category->term_id,
                'post_type' => 'post',
                'posts_per_page' => '1',
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts()) {
              while ( $query->have_posts() ) {
                $query->the_post();
                if($counter==1 && $flagged==0){
                  echo "<div class='slider'>";
                  $flagged=1;
                  }
            ?>
                       
                    <div class="col-sm-3" style="padding:0">
                        <a href="<?php echo get_site_url().'/'.$url; ?>">
                            <div class="container-post">
                                <div class="material-container">
                                    <div class="crop-image-slider-sections">
                                        <?php
                                          if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                          }
                                        ?>
                                    </div>
                                </div>
                                <div class="center-full-slide">
                                    <a style="color:#fff;font-weight:bold;font-size:2em" href="<?php echo get_site_url().'/'.$url; ?>"><?php echo $nameUrl; ?></a>
                                </div>
                            </div>
                        </a>
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
                      echo "</div>";}
                ?>
    
    <a href="#"  class="slidesjs-previous slidesjs-navigation"><span class="glyphicon glyphicon-menu-left navegation" aria-hidden="true" style="font-size:3em"></span>
    </a>
    <a href="#" class="slidesjs-next slidesjs-navigation"><span class="glyphicon glyphicon-menu-right navegation" aria-hidden="true" style="font-size:3em"></span></a>                  
    </section>
</div>

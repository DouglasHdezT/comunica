<div class="no-slide">
    <section id="slideshow">
        <?php
        $cont_slide=0;
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                $cont_slide++;
            } // end while
        } // end if
        
        /*
            ULTIMO SLIDE TOTALMENTE LLENO
        */
        
        if ( $cont_slide%3 == 0 ){ //Ultimo slide lleno
            if(have_posts()){
                for($j=0; $j<$cont_slide; $j+=3){
                    echo '<div class="slide">';
                    for($i=0; $i<3; $i++){
                        the_post();?>
                            <div class="col-sm-4">
                                <h3 class=" "><?php the_category(',');?></h3>
                                <div class="card mb-3  slider-container">
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                      }
                                    ?>
                                  <div class="card-body text-dark w-sr" id="style-7">
                                    <h2><?php the_title() ?> </h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                  </div>
                                </div>
                            </div>
                    <?php
                    }//end first for
                    echo '</div class="slide">';
                }// end second for
            }
        }
        
        /*
            ULTIMO SLIDE CON 2 POST
        */

        else if( $cont_slide%3 == 2 ){//Ultimo slide con 2 posts
            if($cont_slide < 3){
                if(have_posts()){
                    echo '<div class="slide">';
                    for($i=0; $i<2; $i++){
                        the_post();?>
                            <div class="col-sm-4">
                                <h3 class=" "><?php the_category(',');?></h3>
                                <div class="card mb-3  slider-container">
                                  
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                      }
                                    ?>
                                  <div class="card-body text-dark w-sr" id="style-7">
                                    <h2><?php the_title() ?> </h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                  </div>
                                </div>
                            </div>
                    <?php
                    }//end first for
                    echo '</div class="slide">';   
                }
            }else{
                if(have_posts()){
                    for($j=0; $j<$cont_slide - 2; $j+=3){
                        echo '<div class="slide">';
                        for($i=0; $i<3; $i++){
                            the_post();?>
                                <div class="col-sm-4">
                                    <h3 class=" "><?php the_category(',');?></h3>
                                    <div class="card mb-3  slider-container">
                                      
                                      <?php
                                          if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                          }
                                        ?>
                                      <div class="card-body text-dark w-sr" id="style-7">
                                        <h2><?php the_title() ?> </h2>
                                        <p class="card-text"><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                      </div>
                                      <div class="card-footer text-muted">
                                        <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                      </div>
                                    </div>
                                </div>
                        <?php
                        }//end first for
                        echo '</div class="slide">';
                    }//end second for

                    //Slide diferente...
                    echo '<div class="slide">';
                    for($i=0;$i<2;$i++){
                        the_post();?>
                            <div class="col-sm-4">
                                <h3 class=" "><?php the_category(',');?></h3>
                                <div class="card mb-3  slider-container">
                                  
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                      }
                                    ?>
                                  <div class="card-body text-dark w-sr" id="style-7">
                                    <h2><?php the_title() ?> </h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                  </div>
                                </div>
                            </div>
                        <?php
                    }   
                }
                query_posts('');
                if(have_posts()){
                   the_post();?>
                        <div class="col-sm-4">
                            <h3 class=" "><?php the_category(',');?></h3>
                            <div class="card mb-3  slider-container">
                              
                              <?php
                                  if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                  }
                                ?>
                              <div class="card-body text-dark w-sr" id="style-7">
                                <h2><?php the_title() ?> </h2>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                              </div>
                              <div class="card-footer text-muted">
                                <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                              </div>
                            </div>
                        </div>
                    <?php 
                }
                wp_reset_query();
                echo '</div class="slide">';
            }//end else
        }//end if else

        /*
            ULTIMO SLIDE CON UN POST
        */

        else{ //Ulitmo slide con 1 solo post
            if($cont_slide < 3){
                if(have_posts()){
                    echo '<div class="slide">';
                    for($i=0; $i<1; $i++){
                        the_post();?>
                            <div class="col-sm-4">
                                <h3 class=" "><?php the_category(',');?></h3>
                                <div class="card mb-3  slider-container">
                                  
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                      }
                                    ?>
                                  <div class="card-body text-dark w-sr" id="style-7">
                                    <h2><?php the_title() ?> </h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                  </div>
                                </div>
                            </div>
                    <?php
                    }//end first for
                    echo '</div class="slide">';   
                }
            }else{
                if(have_posts()){
                    for($j=0; $j<$cont_slide - 1; $j+=3){
                        echo '<div class="slide">';
                        for($i=0; $i<3; $i++){
                            the_post();?>
                                <div class="col-sm-4">
                                    <h3 class=" "><?php the_category(',');?></h3>
                                    <div class="card mb-3  slider-container">
                                      
                                      <?php
                                          if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                          }
                                        ?>
                                      <div class="card-body text-dark w-sr" id="style-7">
                                        <h2><?php the_title() ?> </h2>
                                        <p class="card-text"><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                      </div>
                                      <div class="card-footer text-muted">
                                        <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                      </div>
                                    </div>
                                </div>
                        <?php
                        }//end first for
                        echo '</div class="slide">';
                    }//end second for

                    //Slide diferente...
                    echo '<div class="slide">';
                    the_post();?>
                        <div class="col-sm-4">
                            <h3 class=" "><?php the_category(',');?></h3>
                            <div class="card mb-3  slider-container">
                              
                              <?php
                                  if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                  }
                                ?>
                              <div class="card-body text-dark w-sr" id="style-7">
                                <h2><?php the_title() ?> </h2>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                              </div>
                              <div class="card-footer text-muted">
                                <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                              </div>
                            </div>
                        </div>
                    <?php   
                }
                query_posts('');
                if(have_posts()){
                    for($i=0;$i<2;$i++){
                        the_post();?>
                            <div class="col-sm-4">
                                <h3 class=" "><?php the_category(',');?></h3>
                                <div class="card mb-3  slider-container">
                                  
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                      }
                                    ?>
                                  <div class="card-body text-dark w-sr" id="style-7">
                                    <h2><?php the_title() ?> </h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                  </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                wp_reset_query();
                echo '</div class="slide">';
            }
        }//end else    
    ?>
    </section>
</div>
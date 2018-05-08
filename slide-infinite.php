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
                            <div class="col-sm-4" style="padding:0">
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
                                         <div class="align-buttom">
                                              <h4 style="color:#fff"><?php the_title() ?></h4>
                                              <?php the_excerpt() ?>
                                              <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                         </div>
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
                            <div class="col-sm-4" style="padding:0">
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
                                       <div class="align-buttom">
                                          <h4 style="color:#fff"><?php the_title() ?></h4>
                                          <?php the_excerpt() ?>
                                          <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                       </div>
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
                                <div class="col-sm-4" style="padding:0">
                                     
                                    <div class=" slider-container   material-container">
                                       <div class="container-post">
                                        <div class="crop-image-slider">
                                          <?php
                                              if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                              }
                                            ?>
                                          </div>
                                        </div>
                                        <div class="center-full-slide">
                                          <div class="align-buttom">
                                              <h4 style="color:#fff"><?php the_title() ?></h4>
                                              <?php the_excerpt() ?>
                                              <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                          </div>
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
                            <div class="col-sm-4" style="padding:0">       
                                <div class=" slider-container   material-container">
                                 <div class="container-post">
                                  <div class="crop-image-slider">
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                      }
                                    ?>
                                  </div>
                                    </div>
                                    <div class="center-full-slide">
                                        <div class="align-buttom">
                                          <h4 style="color:#fff"><?php the_title() ?></h4>
                                          <?php the_excerpt() ?>
                                          <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                        <?php
                    }   
                }
                query_posts('');
                if(have_posts()){
                   the_post();?>
                        <div class="col-sm-4" style="padding:0">
                             
                            <div class=" slider-container   material-container">
                             <div class="container-post">
                              <div class="crop-image-slider">
                                  <div class="crop-image-slider">
                                      <?php
                                          if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                          }
                                        ?>
                                  </div>
                              </div>
                               <div class="center-full-slide">
                                    <div class="align-buttom">
                                      <h4 style="color:#fff"><?php the_title() ?></h4>
                                      <?php the_excerpt() ?>
                                      <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                    </div>
                                </div>
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
                            <div class="col-sm-4" style="padding:0">
                                 
                                <div class=" slider-container   material-container">
                                 <div class="container-post">
                                  <div class="crop-image-slider">
                                      <?php
                                          if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                          }
                                        ?>
                                  </div>
                                   
                                    </div> 
                                     <div class="center-full-slide">
                                         <div class="align-buttom">
                                              <h4 style="color:#fff"><?php the_title() ?></h4>
                                              <?php the_excerpt() ?>
                                              <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                          </div>
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
                                <div class="col-sm-4" style="padding:0">
                                     
                                    <div class=" slider-container   material-container">
                                         <div class="container-post">
                                              <div class="crop-image-slider">
                                                  <?php
                                                      if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                                      }
                                                    ?>
                                              </div>
                                          </div>     

                                          <div class="center-full-slide">
                                             <div class="align-buttom">
                                                  <h4 style="color:#fff"><?php the_title() ?></h4>
                                                  <?php the_excerpt() ?>
                                                  <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                             </div>
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
                    <div class="col-sm-4" style="padding:0">

                        <div class=" slider-container   material-container">
                            <div class="container-post">
                                <div class="crop-image-slider">
                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="center-full-slide">
                                <div class="align-buttom">
                                    <h4 style="color:#fff"><?php the_title() ?></h4>
                                    <?php the_excerpt() ?>
                                    <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <?php   
                }
                query_posts('');
                if(have_posts()){
                    for($i=0;$i<2;$i++){
                        the_post();?>
                            <div class="col-sm-4" style="padding:0">
                                 
                                <div class=" slider-container   material-container">
                                 <div class="container-post">
                                  <div class="crop-image-slider">
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                      }
                                    ?>
                                  </div>
                                   
                                     
                                    </div>
                                    <div class="center-full-slide">
                                        <div class="align-buttom">
                                            <h4 style="color:#fff"><?php the_title() ?></h4>
                                            <?php the_excerpt() ?>
                                            <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                        </div>
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
      <a href="#" class="slidesjs-previous slidesjs-navigation"><span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="font-size:3em"></span>
</a>
      <a href="#" class="slidesjs-next slidesjs-navigation"><span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="font-size:3em"></span></a>
    </section>
</div>
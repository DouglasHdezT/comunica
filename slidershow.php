<div class="no-slide" id="mainS">
  <section id="slideshow">
    <?php
    $contSlider = 0;
    if ( have_posts() ) {
      do {
        ?>
        <div class="slide"> 
          <?php
          for($i=0;$i<=2;$i++){
            if(have_posts()){
              the_post();
              ?>
              <div class="col-sm-6">
                <div class="container-slide">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('post-thumbnails',array('class'=>'img-slide'));
                    }
                    ?>
                  </a>
                  <div class="display-slide">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      <?php $contSlider+=1;} while (have_posts() && $contSlider<=5);// end while
    } // end if
    ?>
    <a href="#" class="slidesjs-previous slidesjs-navigation"><span class="glyphicon glyphicon-menu-left navegation" aria-hidden="true" style="font-size:3em"></span></a>
    <a href="#" class="slidesjs-next slidesjs-navigation"><span class="glyphicon glyphicon-menu-right navegation" aria-hidden="true" style="font-size:3em"></span></a>
  </section>
</div>

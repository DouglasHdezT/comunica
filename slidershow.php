<div class="no-slide" id="mainS">
  <section id="slideshow">
    <?php
    $contSlider = 0;
    $allPost =  get_posts(array(
      'numberposts'=> 10
    ));

    if($allPost){
      foreach($allPost as $post){
        setup_postdata($post);
        if($contSlider == 0){
          echo '<div class="slide">';
        }?>
          <div class="col-sm-6">
              <div class="container-slide">
                <a href="<?php the_permalink(); ?>">
                  <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail('post-thumbnails',array('class'=>'img-slide lazyload'));
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
        if($contSlider == 0){
          echo '</div>';
        }
        $contSlider+=1;
        if($contSlider>=2){
          $contSlider = 0;
        }
      }
    }?>
    <a href="#" class="slidesjs-previous slidesjs-navigation"><span class="glyphicon glyphicon-menu-left navegation" aria-hidden="true" style="font-size:3em"></span></a>
    <a href="#" class="slidesjs-next slidesjs-navigation"><span class="glyphicon glyphicon-menu-right navegation" aria-hidden="true" style="font-size:3em"></span></a>
  </section>
</div>

<?php
  $flag = true;
  if ( have_posts() && $flag ) {
    do {
      the_post();
      if($flag){
        ?>
        <div class='initial-banner-container'>
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('post-thumbnails',array('class'=>'initial-banner'));
          }?>
          <div class='filter-banner'></div>
          <div class="main-slider">
            <?php
              if(is_home()){
                include 'slidershow.php';
              }
            ?>
          </div>
          <div id="skip-banner" class="down-slide"><div style="padding:20px">
            <img class="img-fluid logo-skip" src="<?php bloginfo('template_url');?>/assets/images/logo-pp.png" alt="LOGO">
            <span style="padding:5px;font-size:2em;display:block" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></div></div>
          </div>
          <?php
          $flag = false;
        }
      } while ( have_posts() );
    } // end if
    ?>
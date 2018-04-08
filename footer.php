<footer>
<nav class="dark-blue-nav footer">
    <?php
    wp_nav_menu(array(
        'theme_location'=>'secciones-bottom',
        'container'=>'div',
        'container_class'=>'section-containers',
        'items_wrap'=>'<ul class="drak-ul">%3$s</ul>'
        
    ));
    ?>
</nav>
<div class="row justify-content-between" style="width:100%">
   <div class="col-lg-4 padre">
       <a class="hijo" href="<?php echo esc_url(home_url());?>"><img class="footer-logo" style="box-shadow: none " src="<?php echo get_header_image();?>"/></a>
   </div>
   <div class="col-lg-4">
        <?php   
            wp_nav_menu(array(
           'theme_location'=>'social-network',
           'container'=>'div',
           'container_class'=>'container-social-network',
           'items_wrap'=>'<ul class="ul-social">%3$s</ul>'
            ));
        ?>
        <!--FORMULARIO DE BUSQUEDA-->
        <div class="ft-search padre" style="width:100%">
        
           <?php get_search_form(); ?>
            
        </div>
                                            
   </div>
</div>
<div class="ScrollUp btn btn-secondary">
    <span style="color:#000" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
</div>
</footer>
<?php wp_footer();?>
</body>
</html>

<?php
if(is_front_page()){ ?>
    <script src="<?php bloginfo('template_url') ?>/assets/js/jquery.min.js"></script>    
<?php
}else{ ?>
    <script src="<?php bloginfo('template_url') ?>/assets/js/jquery-2.1.1.js"></script>        
<?php } ?>


<script src="<?php bloginfo('template_url') ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/dinamic-bar.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/extras.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/effects.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/jquery.slides.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/main.js"></script>


<script>
$(function(){
    
  $("#slideshow").slidesjs({
    height: $('#slideshow').height(),
    navigation: false;
    effect: {
      slide: {
        // Slide effect settings.
        speed: 500
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 500,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
    play:{
        interval: 10000,
        auto:false,
        effect: "fade",
        pauseOnHover: true,
        restartDelay: 5000
    },

  });
});
</script>
<script>
$(function(){
    
  $("#slideshow-movil").slidesjs({
    height: $('#slideshow-movil').height(),
    navegation: true,
    effect: {
      slide: {
        // Slide effect settings.
        speed: 200
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 500,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
    play:{
        interval: 10000,
        auto:true,
        effect: "fade",
        pauseOnHover: true,
        restartDelay: 5000
    },

  });
});
</script>


<script>
$(function(){
    
  $("#slideshow-medios").slidesjs({
    height: $('#slideshow-medios').height(),
    navegation: false,
    effect: {
      slide: {
        // Slide effect settings.
        speed: 200
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 500,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
    play:{
        interval: 10000,
        auto:true,
        effect: "fade",
        pauseOnHover: true,
        restartDelay: 5000
    },

  });
});
</script>
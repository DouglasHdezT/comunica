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
<div class="row dark-footer">
   <div class="col-lg-4 ">
       <a class="" href="<?php echo esc_url(home_url());?>"><img class="footer-logo" style="box-shadow: none " src="<?php echo get_header_image();?>"/></a>
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
        <div class="ft-search" >

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
<script src="<?php bloginfo('template_url') ?>/assets/js/slide.js"></script>


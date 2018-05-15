<?php get_header();?>
       <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
            //echo wpautop( $post->post_content );
        ?>
                   <div class="container-fluid">
                    <section class="content-main">
                    </section>
                    </div>
                    <?php the_content(); ?>
                     
            <?php } // end while
        } // end if
        ?>
    

<?php get_footer();?>
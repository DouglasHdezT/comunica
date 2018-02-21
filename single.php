<?php get_header();?>
       <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
            //echo wpautop( $post->post_content );
        ?>
                   <div class="container-fluid">
                    <section class="content-main">
                    <h3> <?php the_title(); ?></h3>
                    </section>
                    </div>
                    <?php the_content(); ?>
                     
            <?php } // end while
        } // end if
        ?>
    

<?php get_footer();?>
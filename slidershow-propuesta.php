<div class="no-slide">
    <section id="slideshow">
     <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();?>
                <div class="slide">
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
            <?php } // end while
        } // end if
    ?>
    </section>
</div>

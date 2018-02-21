<?php get_header(); ?>
<div class="container-fluid">
    <section class="content-main">
       <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();?>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content();
                    $name_category = get_the_title();
                    ?>
                     
            <?php } // end while
        } // end if
        ?>
        
        <br>
        <br>
        <h1 class="last_entrees">ÚLTIMAS ENTRADAS</h1>
        <br>
        <!-- Noticias relacionadas con la pagina -->
        <div class="row">
        <?php
        query_posts(''); //Reinicio de querys para obtener todos los post
        if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    $post_views = get_post_views(get_the_ID());
                    $post_categories= get_the_category(get_the_ID());
                    foreach($post_categories as $post_category_obj){
                        $post_category = $post_category_obj->name;
                        if($post_category == $name_category){
                            ?>
                                <div class="col-md-4">
                                    <div class="card mb-3  slider-container">
                                      <h3 class="card-header"><?php the_title();?></h3>
                                      <?php
                                          if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
                                          }
                                        ?>
                                      <div class="card-body text-dark">
                                        <p class="card-text"><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer más</a>
                                      </div>
                                      <div class="card-footer text-muted">
                                        <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                      </div>
                                    </div>
                                    
                                </div>
                            
                <?php } 
                    }
                }// end while
            } // end if
        
        
        wp_reset_query(); //Volver a la query original.
        ?>
        </div>
    </section>
</div>

<?php get_footer();?>

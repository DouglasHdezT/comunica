<?php
get_header();
?>
<div class="search-container">
   <div class="container">
       <section id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                
                <div class="search_page_div padre" style="width:100%">
                    <?php get_search_form(); ?>
                </div>
                
                <?php 
                
                    if(have_posts()){
                        $result_cont=0;
                        $pages_cont= 0;
                        while(have_posts()){
                            the_post();
                            $post=get_post();
                            if($post->post_type == 'page'){
                                $pages_cont++;
                            }
                            $result_cont++;
                        }
                        
                    }
                    if(have_posts() && $pages_cont != $result_cont){
                        $result_cont = $result_cont - $pages_cont;
                ?>               
                    
                    <div class="result_panel">
                        <h1>Mostrando resultados para: <span class="inside"><?php the_search_query() ?></span></h1>
                        <span>Cantidad de resultados: <?php echo $result_cont; ?> </span>
                        <div class="result_panel_posts">
                            <?php
                        $post_views = get_post_views(get_the_ID());
                            while(have_posts()){
                                the_post();
                                $post=get_post();
                                ?>
                                <?php 
                                    if($post->post_type == 'post'){?>
                                        <div class="result_post">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <?php
                                                        if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-responsive result_image'));
                                                    }?>
                                                </div>
                                                <div class="col-md-8 result_content">
                                                       <h1><?php the_title(); ?></h1>
                                                       <p><?php the_excerpt(); ?></p>
                                                       <p><span class="glyphicon glyphicon-eye-open" style="margin-right:6px" aria-hidden="true"></span>
                                                          <?php echo sprintf( _n( '%s Visualización', '%s Visualizaciones', $post_views, 'your_textdomain' ), parseViews($post_views) );?></p>
                                                        <a href="<?php the_permalink();?>" class="btn btn-info">Leer Más <span class="glyphicon glyphicon-chevron-right" style="font-weight: 100" aria-hidden="true"></span></a>
                                                        <p><small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?> / <?php the_category(','); ?></small></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $post_printed++; }?>
                                
                                
                            <?php } //END WHILE ?>
                        </div>
                    </div>
    
                <?php }else{?>
                    
                    <div class="none_results">
                        <h1>No se encontraron resultados para: <span class="inside"><?php the_search_query() ?></span></h1>        
                    </div>
        
                <?php }/*END IF*/ ?>

            </main><!-- #main -->
        </section><!-- #primary -->
   </div>
   <div>
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#">&laquo; Página Anterior</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">Página Siguiente &raquo; </a>
        </li>
      </ul>
    </div>
        
</div>

<?php
get_footer(); 
?>
<?php
get_header();

/*Obtener el post con mayor numero de visitas*/
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$view_per_post =  get_post_views(get_the_ID());
        $total_views[] =  $view_per_post;
	} // end while
    rsort($total_views);
} // end if
//print_r($total_views );
?>

<div class="container-fluid ">
    <section class="content-main">
        <div class="row">
            <div class="col-lg-6">
                <?php 
                $count_views=0;
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                         $post_views = get_post_views(get_the_ID());
                            if($post_views == $total_views[0] && $count_views == 0){
                                $count_views++;?>
                           
                               <div class="container-post">
                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-responsive'));
                                    }
                                    ?>
                                        
                                      <div class="top-right">
                                          <span class="glyphicon glyphicon-eye-open" style="margin-right:5px; color:#fff;" aria-hidden="true"></span>
                                          <?php echo sprintf( _n( '%s Visualización', '%s Visualizaciones', $post_views, 'your_textdomain' ), parseViews($post_views) );?>
                                      </div>
                                      <div class="bottom-right">
                                        <h3 style="color:#fff"><?php the_title(); ?></h3>
                                        <?php the_excerpt(); ?>
                                      </div>
                                      <div class="top-left">
                                          <a href="<?php the_permalink(); ?>" class="box curmudgeon" >Leer Más</a>
                                      </div>
                                </div>
                                <?php $idFirst=get_the_ID(); ?>
                    <?php }
                    }
                    // end while
                } // end if
                ?>
            </div>
            <hr class="space">
            <div class="col-lg-6">
                <?php 
                $counter = 0;
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                         $post_views = get_post_views(get_the_ID());
                            if($post->ID != $idFirst && $post_views > $total_views[3]){
                                if($counter < 2){?>
                               <div class=" col-sm-6 secondary-post">
                                <div class="card bg-secondary mb-3">
                                   <div class="container-post">
                                       <div class="crop-image">
                                            <?php
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                            }
                                            ?>
                                        </div>
                                          <div class="top-right">
                                              <span class="glyphicon glyphicon-eye-open" style="margin-right:5px" aria-hidden="true"></span>
                                              <?php echo sprintf( _n( '%s Visualización', '%s Visualizaciones', $post_views, 'your_textdomain' ), parseViews($post_views) );?>
                                          </div>
                                    </div>
                                    <div class="toggle-trigger">
                                        <span id="trigger" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                                        <div class="card-body text-dark toggle">
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php the_excerpt(); ?></p>
                                                <p><a href="<?php the_permalink(); ?>" class="btn btn-outline-primary" role="button">Leer Más</a></p>
                                                <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?> / <?php the_category(','); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div><?php $counter++; ?>
                        <?php }
                        }
                    }
                    // end while
                } // end if
                ?>

            </div>

        </div>
        <br>
        
        <div class="row">
          <div class="col-md-12">
            <h2>ÚLTIMAS ENTRADAS</h2><br>
            <!-- SLIDE MOVIL -->
            
            <div class="slide-movil">
            <section id="slideshow-movil">
                <?php
                $nslide=0;
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                            if($nslide< 10){?>
                              <div class="slide">
                               <div class="col">
                                <h3 style="padding: 5px 7px"><?php the_category(',');?></h3>
                                <div class="card mb-3  slider-container">
                                  <div class="crop-image-slider">
                                    <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                      }
                                    ?>
                                  </div>
                                  <div class="card-body text-dark w-sr" id="style-7">
                                    <h2><?php the_title() ?> </h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer Más</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
                                  </div>
                                </div>
                                </div>
                                <hr>
                                <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left"></i></a>
                                <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right"></i></a>
                                </div>
                                <?php $nslide++; ?>
                           <?php
                              }
                        }
                    } // end while
                ?>
                
            </section>
            </div>
            
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                           
           <!-- SLIDE ESCRITORIO -->
           
           <?php
                include 'slide-infinite.php';
            ?>
            </div>
        </div>
        <br>
        
        <!-- AREA MULTIMEDIA -->
        
        <h2>Multimedia</h2>
        <br>
        <div class="row">
            <?php
            rewind_posts();
            $postCounter =0;
            if ( have_posts() ) {
                while ( have_posts() ) {
                the_post();
                    if(in_category('Multimedia') && $postCounter < 2 ){
            ?>
                       <div class="col-md-6">
                            <div class="card text-white bg-primary mb-3">
                              <div class="card-body media-body">
                                <?php
                                $youtube = getYTurl();
                                $full = 'https://www.youtube.com/embed/'.$youtube;
                                if(empty($youtube)){?>
                                    <div class="img-media-container">
                                        <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                        } ?>
                                    </div>
                                <?php }else{
                                ?>
                                <iframe width="100%" height="350px"
                                src="<?php echo $full ?>">
                                </iframe>
                                <?php } ?>
                                <hr>
                                <div class="media-container">
                                    <h4 class="card-title"><?php the_title()?></h4>
                                    <p class="card-text"><?php the_excerpt(); ?></p>    
                                </div>
                              </div>
                            </div>
                        </div>
                        <?php $postCounter++ ?>

            <?php           }
                        }
                }
            ?>
        </div>
        <h2>Radio Comunica</h2>
        <div class="row">
            <?php dynamic_sidebar('sidebar-1'); ?>           
        </div>
        <h2>Medios Jesuitas en C.A.</h2>
        <div class="row">
           <div class="col-md-12">
                <div class="slide-medios">
                    <section id="slideshow-medios">
                         <?php dynamic_sidebar('sidebar-2'); ?>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
<?php
get_header();
$hoy = getdate();
/*Obtener el post con mayor numero de visitas*/
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
        if(round(abs($hoy[0] - get_the_date('U'))/86400)<7){
            $view_per_post =  get_post_views(get_the_ID());
            $total_views[] =  $view_per_post;
            rsort($total_views);
        }
        if(empty($total_views)){
            $view_per_post =  get_post_views(get_the_ID());
            $total_views[] =  $view_per_post;
        }
	} // end while
} // end if

//print_r($total_views );
?>
<div id="preloader" class="padre">
        <div class="dots-container hijo">
            <div class="loader dot-1"></div>
            <div class="loader dot-3"></div>
            <div class="loader dot-2"></div>
       </div>
</div>

<div class="container-fluid ">
    <section class="content-main">
        <div class="row first-section">
            <div class="col-lg-6">
                <?php 
                $count_views=0;
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                         $post_views = get_post_views(get_the_ID());
                            if($post_views == $total_views[0] && $count_views == 0){
                                $count_views++;?>
                           <div class="first-post">
                               <div class="container-post material-container first-section">
                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('post-thumbnails',array('class'=>'img-responsive'));
                                    }
                                    ?>
                                        
                                      <div class="center-full-slide-second-posts" style="display:none">
                                        <h3 style="color:#fff"><?php the_title(); ?></h3>
                                        <br>
                                        <?php the_excerpt(); ?>
                                      </div>
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
               <div class="row" style="position:relative">
                <?php 
                $counter = 0;
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                         $post_views = get_post_views(get_the_ID());
                            if($post->ID != $idFirst && $post_views > $total_views[3]){
                                if($counter < 4){?>
                                 <a href="<?php the_permalink() ?>" style="color:#fff">
                                  <div class="col-md-6 seconds-post" >
                                      <div class="post-container">
                                           <div class="crop-image">
                                                <?php
                                                if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail('post-thumbnails',array('class'=>'img-media'));
                                                }
                                                ?>
                                            </div>
                                            <div id="style-7" class="center-full-slide-second-posts">
                                                  <h2 style="color:#fff"><?php the_title() ?></h2>
                                                  <br>
                                                  <?php echo substr(get_the_excerpt(),0,200); ?>
                                                  <a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff;font-size:1.2em">Leer Más</a>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                            <?php $counter++; ?>
                        <?php }
                        }
                    }
                    // end while
                } // end if
                ?>

            </div>
            </div>
        </div>
        <br>
        
        <div class="row material-container" style="background:#072844;">
          <div class="col-md-12">
            <h2 style="padding:10px; color:#fff;padding-top:25px">ÚLTIMAS ENTRADAS</h2><br>
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
        <div class="row " style="background:#072844;">
            <div class="col-md-12 material-container" style="padding:0">
                           
           <!-- SLIDE ESCRITORIO -->
           
           <?php
                include 'slide-infinite.php';
            ?>
            </div>
        </div>        
        <!-- AREA MULTIMEDIA -->
        
        <div class="row " style="background:#1E88E5">
           <div class="col-md-12 material-container" style="padding:0">
               <h2 style="padding:10px; color:#fff;padding-top:25px">MULTIMEDIA</h2><br>
                    <?php
                    rewind_posts();
                    $postCounter =0;
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                        the_post();
                            if(in_category('Multimedia') && $postCounter < 2 ){
                    ?>
                               <div class="col-md-6" style="padding:0">
                                        <?php
                                        $youtube = getYTurl();
                                        $full = 'https://www.youtube.com/embed/'.$youtube.'?version=3&controls=0&rel=0&showinfo=0&autohide=1';
                                        if(empty($youtube)){?>
                                            <div class="container-post">
                                                <div class="img-media-container">
                                                    <?php if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail('post-thumbnails',array('class'=>'img-media filter-off'));
                                                    } ?>
                                                </div>
                                                <div class="center-full">
                                                    <h2 style="color:#fff"><?php the_title(); ?></h2>
                                                    <p><?php the_excerpt(); ?></p>
                                                </div>
                                            </div>
                                        <?php }else{
                                        ?>
                                        <div class="container-post">
                                            <div class="img-media-container">
                                                <iframe id="<?php echo 'video-'.$postCounter ?>" class="filter-off" width="100%" style="border:0" height="500px"
                                                src="<?php echo $full ?>">
                                                </iframe>
                                                <div id="<?php echo 'text-'.$postCounter ?>" class="center-full" style="filter:none">
                                                    <h2  style="color:#fff"><?php the_title(); ?></h2>
                                                    <p><?php the_excerpt(); ?></p>
                                                </div>
                                                <button id="<?php echo 'play-'.$postCounter ?>" class="circle-buttom"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></button>
                                            </div>
                                            
                                       </div>
                                        <?php } ?>
                                </div>
                                <?php $postCounter++ ?>

                    <?php           }
                                }
                        }
                    ?>
            </div>
        </div>
        <div class="row" style="background:#90CAF9;">
            <div class="col-md-12 material-container">
                <h2 style="color:#fff;padding-top:25px;padding-bottom:20px">Radio Comunica</h2>
                <div class="col-md-6">
                    <?php dynamic_sidebar('podcast'); ?>
                </div>
                <div class="col-md-6">
                   <div class="row" style="margin-bottom:15px;max-height:416px">
                       <?php dynamic_sidebar('sidebar-1'); ?>
                   </div>
                </div>
            </div>           
        </div>
        <div class="row" style="background:#E3F2FD">
          <div class="col-md-12">
             <h2 style="padding:20px 0px">Medios Jesuitas en C.A.</h2>
          </div>
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
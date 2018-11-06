<?php get_header(); ?>
<div class="container-fluid">
  <section class="content-main">
    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        ?>
        <div class="row" style = "margin-top: 1em; margin-bottom: 1em;">
          <div class="col-md-12">
            <h3 style="text-indent:1.5em;background:#344d7f;color:#fff;padding-top:1.5em;padding-bottom:1.5em; margin-bottom:0;"><?php the_title(); ?></h3>
          </div>
        </div>
        <?php the_content();
        $name_category = get_the_title();
        ?>

      <?php }
      // end while
    } // end if

    $allPosts = get_posts(array(
      'numberposts'=>-1,
      'category_name'=>$name_category
    )); //Reinicio de querys para obtener todos los post
    $cont_page = 0;
    foreach($allPosts as $post){
      setup_postdata($post);
      if($cont_page == 0){
        $cont_page++;
        ?>
        <div class="row">
          <div class="col-md-12">
            <div class="container-post">
              <div class="page-image">
                <a href="<?php the_permalink(); ?>">
                  <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail('post-thumbnails',array('class'=>'img-responsive'));
                  }
                  ?>
                </a>
              </div>
              <div class="bottom-right">
                <h3 style="color:#fff"><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
              </div>
              <div class="top-left">
                <a href="<?php the_permalink(); ?>" class="box curmudgeon" >Leer Más</a>
              </div>
            </div>
          </div>
        </div>
        <?php
        continue;
      }
      ?>
      <div class="col-md-4" style="margin-top:1.5em;">
        <div class="card mb-3  slider-container">
          <h3 id="style-7" class="card-header title-page-post"><?php the_title();?></h3>
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('post-thumbnails',array('class'=>'slider-hght'));
          }
          ?>
          <div class="card-body text-dark post-pages">
            <p class="card-text"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink();?>" class="btn btn-outline-primary">Leer más</a>
          </div>
          <div class="card-footer text-muted">
            <small class="text-muted"><?php echo get_the_date(); ?> - <?php the_time();?> / <?php the_author() ?></small>
          </div>
        </div>
      </div>
      <?php
    }
    wp_reset_query(); //Volver a la query original.
    ?>
    </div>
  </section>
</div>
<?php get_footer();?>

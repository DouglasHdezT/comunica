<?php get_header(); ?>
<div class="container-fluid">
  <section class="content-main">
    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        ?>
        <div class="row">
          <div class="col-md-12" style="margin-rigth:1.5em">
            <h3 style="background:#344d7f;color:#fff;padding-top:1.5em;padding-bottom:1.5em"><?php the_title(); ?></h3>
          </div>
        </div>
        <?php the_content();
        $name_category = get_the_title();
        ?>

      <?php }
      // end while
    } // end if

    ?>
    <div class="row">
      <?php
      query_posts(''); //Reinicio de querys para obtener todos los post
      $flag=true;
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          $post_views = get_post_views(get_the_ID());
          $post_categories= get_the_category(get_the_ID());
          $post_views = get_post_views(get_the_ID());
          foreach($post_categories as $post_category_obj){
            $post_category = $post_category_obj->name;
            if($post_category == $name_category && $flag == true ){
              ?>
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
              <?php $idFirst = get_the_ID(); ?>

              <?php       $flag=false;
            }
          }
        }// end while
      } // end if


      wp_reset_query(); //Volver a la query original.
      ?>
    </div>

    <!-- Noticias relacionadas con la pagina -->
    <div class="row" style="margin-top:20px;">
      <?php
      query_posts(''); //Reinicio de querys para obtener todos los post
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          $post_views = get_post_views(get_the_ID());
          $post_categories= get_the_category(get_the_ID());
          foreach($post_categories as $post_category_obj){
            $post_category = $post_category_obj->name;
            if($post_category == $name_category && $post->ID != $idFirst){
              ?>
              <div class="col-md-4">
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

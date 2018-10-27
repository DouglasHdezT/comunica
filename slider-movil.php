<div class="slide-movil">
  <section id="slideshow-movil">
    <?php
    $counter=1;
    $flagged=0;
    $categories = get_categories();
    foreach ( $categories as $category ) {
      $nameUrl = $category->name;
      $url = nameToUrl($category->name);
      $args = array(
        'cat' => $category->term_id,
        'post_type' => 'post',
        'posts_per_page' => '1',
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts()) {
        while ( $query->have_posts() ) {
            $query->the_post();
            echo "<div class='slider'>";
          ?>

          <div class="col-md-12" style="padding:0">
            <a href="<?php echo $siteurl.'/'.$url; ?>">
              <div class="container-post">
                <div class="material-container">
                  <div class="crop-image-slider-sections">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('post-thumbnails',array('class'=>'img-media lazyload'));
                    }
                    ?>
                  </div>
                </div>
                <div class="center-full-slide">
                  <a style="color:#fff;font-weight:bold;font-size:2rem" href="<?php echo $siteurl.'/'.$url; ?>"><?php echo $nameUrl; ?></a>
                </div>
              </div>
            </a>
          </div>
          <?php
            echo "</div>";
          }
        }
      }
      ?>
    </section>
  </div>

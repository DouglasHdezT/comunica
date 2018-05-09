<div class="no-slide">
    <section id="slideshow-sections">
        <?php
        $theme_locations = get_nav_menu_locations();
        $menu_obj = get_term( $theme_locations['secciones'], 'nav_menu' );
        $menu_name = $menu_obj->name;
        $items = wp_get_nav_menu_items($menu_name);
        foreach( $items as $item ) {
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
        ?>
                        
        <?php    
                } // end while
            } // end if

        }

        ?>
    </section>
</div>
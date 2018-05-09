<div class="no-slide">
    <section id="slideshow-sections">
        <?php
        $theme_locations = get_nav_menu_locations();
        $menu_obj = get_term( $theme_locations['secciones'], 'nav_menu' );
        $menu_name = $menu_obj->name;
        $items = wp_get_nav_menu_items($menu_name);
        query_posts('');
        for($i=0;$i<count($items);$i++){
            echo $items[i];
        }
        wp_reset_query();
        ?>
    </section>
</div>
<form role="search" method="get" class="search-form hijo" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field btn btn-default"
            placeholder="<?php echo esc_attr_x( 'Busqueda...', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <input type="submit" class="search-submit btn btn-outline-primary search-btn"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
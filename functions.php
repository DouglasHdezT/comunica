<?php
@ini_set( 'upload_max_size' , '15M' );
@ini_set( 'post_max_size', '15M');
@ini_set( 'max_execution_time', '300' );

if(function_exists('register_nav_menus')){
    register_nav_menus(array(
        'secciones'=>'Secciones parte superior',
        'secciones-scrolling'=>'Secciones en la barra secundaria',
        'secciones-bottom'=>'Secciones parte inferiror',
        'social-network'=>'Rede sociales en el pie de pagina'
    ));
}
add_filter('nav_menu_link_attributes','style_menu',10,3);
function style_menu($atts,$item,$args){
    $class='link-darknav';
    $atts['class'] = $class;
    return $atts;
}
/*IMAGEN DINAMICA DE HEADER*/
$options = array(
    'default-image' => get_template_directory_uri().'/assets/images/default.png',
    'width' => 800,
    'height'=>300,
    'header-text' => false
);
add_theme_support('custom-header',$options);

/*LOGO DINAMICO HEADER*/
$args = array(
	'width'         => 330,
	'height'        => 75,
	'default-image' => get_template_directory_uri() . '/assets/images/default.png',
	'uploads'       => true,
);
add_theme_support( 'nav-bar', $args );

/*añadir imagen destacada*/
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
/*Intento de contador de visualizaciones*/
// Función para contar visualizaciones de un post.
function set_post_views() {
    if (is_single()) {
        $post_ID = get_the_ID();
        $count = get_post_meta( $post_ID, 'post_views', true );
 
        if ( $count == '' ) {
            delete_post_meta( $post_ID, 'post_views' );
            add_post_meta( $post_ID, 'post_views', 1 );
        } else {
            update_post_meta( $post_ID, 'post_views', ++$count );
        }
    }
}
add_action( 'wp', 'set_post_views' );
 
// Función para obtener el número de visualizaciones de un post
function get_post_views($post_ID){
    $count = get_post_meta($post_ID, 'post_views', true);
 
    if ($count == ''){
        delete_post_meta($post_ID, 'post_views');
        add_post_meta($post_ID, 'post_views', 0);
        return 0;
    }
    return $count;
}
// Funcion para agregar widgets
function add_widget_area(){
    register_sidebar(array(
        'name'=>'Radio',
        'id'=>'sidebar-1',
        'description'=>'Agrega aqui nuevas radios',
        'before_widget'=>'<div class="col-md-6 radio" style="padding:0px;margin:0px">',
        'after_widget'=>'</div>',
        'before_title'=>'<h2>',
        'after_title'=>'</h2>'
    ));
    
    register_sidebar(array(
        'name'=>'Medio Jesuitas',
        'id'=>'sidebar-2',
        'description'=>'Agrega aqui nuevos medios',
        'before_widget'=>'<div class="col-xs-4">',
        'after_widget'=>'</div>',
        'before_title'=>'<h2>',
        'after_title'=>'</h2>'
    ));
    
    register_sidebar(array(
        'name'=>'Podcast',
        'id'=>'podcast',
        'description'=>'Agrega aqui tu Podcast',
        'before_widget'=>'<div class="col-md-12">',
        'after_widget'=>'</div>',
        'before_title'=>'<h2>',
        'after_title'=>'</h2>'
    ));
    register_sidebar(array(
        'name'=>'ComunicaAds',
        'id'=>'comunica_ads',
        'description'=>'Añade tu publicidad aquí',
        'before_widget'=>'<div class="col-md-12">',
        'after_widget'=>'</div>' 
    ));
    
}
add_action('widgets_init','add_widget_area');
 
function getImage($num) {
    global $more;
    $more = 1;
    $link = get_permalink();
    $content = get_the_content();
    $count = substr_count($content, '<img');
    $start = 0;
    for($i=1;$i<=$count;$i++) {
        $imgBeg = strpos($content, '<img', $start);
        $post = substr($content, $imgBeg);
        $imgEnd = strpos($post, '>');
        $postOutput = substr($post, 0, $imgEnd+1);
        $postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '',$postOutput);;
        $image[$i] = $postOutput;
        $start=$imgEnd+1;
    }
    if(stristr($image[$num],'<img')) { 
            echo '<a href="'.$link.'">'.$image[$num]."</a>";
            
    }
    $more = 0;
}

function getYTurl(){
    $content= get_the_content();
    $begin = strpos($content,'v=');
    if($begin != false){
        $cont = substr($content,$begin);
        $end = strpos($cont,'<');
        if(empty($end)){
            $link = substr($cont,2);
        }else{
           $link = substr($cont,2,$end-2);
        }        
    }else{
        $link = '';
    }
    //$test = preg_replace('/</','/',$link);
    return $link;
}

function nameToUrl($name){
    $url = str_replace(array('á','é','í','ó','ú'),array('a','e','i','o','u'),$name);
    $url = str_replace(array('Á','É','Í','Ó','Ú'),array('A','E','I','O','U'),$url);
    $min = strtolower($url);
    $wospace = str_replace(' ','-',$min);
    
    return $wospace;
}

function parseViews($views){
    $view= (int)$views;
    
    if($view < 999){
        return $view;
    }else if($view < 999999 && $view >1000){
        $view= round($view/1000);
        return $view.'k';
    }else{
        $view= round($view/1000000);
        return $view.'M';
    }

}

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

?>



<?php
//Categoria ESPECIAL requerida peara el buen funcionamiento de esta seccion
$timeSpc = 60*60*24*7*2;
$cat_spc_id = get_cat_ID('ESPECIAL');

$args_spc = array(
    'cat'=>$cat_spc_id,
    'post_type'=>'post',
    'post_per_page'=>'1',
);

$query= new WP_Query($args_spc);

if($query->have_posts()){
    while($query->have_posts()){
        $query->the_post();

        $query_time = time() - get_the_time('U');
        if($query_time>=0 && $query_time < $timeSpc){ //(60*60*24*7*2) Dos semanas
            ?>
            <div class='initial-banner-container'>
                <?php
                if ( has_post_thumbnail()) {
                the_post_thumbnail('post-thumbnails',array('class'=>'initial-banner'));
                }?>
                <div class='filter-banner'></div>
                <a href="<?php the_permalink(); ?>"><div class="main-slider">
                    <div class="spc-title">
                        <h1>
                            ESPECIAL COMUNICA: <?php the_title();?>
                        </h1>
                    </div>
                </div></a>
                <div id="skip-banner" class="down-slide"><div style="padding:20px; cursor:pointer; ">
                    <img class="img-fluid logo-skip" src="<?php bloginfo('template_url');?>/assets/images/logo-pp.png" alt="LOGO">
                    <span style="padding:5px;font-size:2em;display:block" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></div></div>
                </div>
            <?php
        }
    }
}
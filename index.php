<?php
get_header();
$hoy = getdate();
$allPost = get_posts(array(
	'numberposts'=>-1
));
/*Obtener el post con mayor numero de visitas*/
if ( have_posts() ) {
	do  {
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
	} while ( have_posts() ); // end while
} // end if
?>
<?php dynamic_sidebar('comunica_ads'); ?>

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
			<div class="col-lg-12" style="padding:20px 5px 20px 10px ">
				<h2>
					Últimas Noticias
				</h2>
			</div>
			<div class="col-lg-6">
				<?php
				$count_views=0;
				if ( have_posts() ) {
					do {
						the_post();
						$post_views = get_post_views(get_the_ID());
						if($post_views == $total_views[0] && $count_views == 0){
							$count_views++;?>
							<a href="<?php the_permalink() ?>">
								<div class="first-post">
									<div class="container-post material-container first-section">
										<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('post-thumbnails',array('class'=>'img-responsive crop-image-first-post'));
										}
										?>

										<div class="center-full-slide-second-posts">
											<div class="center">
												<h2 style="color:#fff">
													<?php the_title(); ?>
												</h2>
												<br>
												<?php the_excerpt(); ?>
											</div>
										</div>
									</div>
								</div>
							</a>
							<?php $idFirst=get_the_ID(); ?>
						<?php }
					} while ( have_posts() );
					// end while
				} // end if
				?>
			</div>
			<hr class="space">
			<div class="col-lg-6">
				<div class="row side-menu" >
					<?php
					$counter = 0;
					if ( have_posts() ) {
						do {
							the_post();
							$post_views = get_post_views(get_the_ID());
							if($post->ID != $idFirst){
								if($counter < 4){?>
									<a href="<?php the_permalink() ?>" style="color:#fff">
										<div class="col-md-6 seconds-post">
											<div class="post-container">
												<div class="crop-image">
													<?php
													if ( has_post_thumbnail() ) {
														the_post_thumbnail('post-thumbnails',array('class'=>'img-media lazyload'));
													}
													?>
												</div>
												<div id="style-7" class="center-full-slide-second-posts">
													<div class="align-buttom">
														<h3 style="color:#fff">
															<?php the_title() ?>
														</h3>
														<?php echo '<p>'.substr(get_the_excerpt($post->post),0,100).'...</p>'; ?>
														<a href="<?php the_permalink() ?>" style="font-weight:bold;color:#fff">Leer Más</a>
													</div>
												</div>
											</div>
										</div>
									</a>
									<?php $counter++; ?>
								<?php }
							}
						} while ( have_posts() );
						// end while
					} // end if
					?>
				</div>
			</div>
		</div>
		<br>
		<!--Area Secciones-->
		<div class="row sub-menu-main">
			<div class="col-md-12">
				<div class="col-md-12" style="margin-rigth:30px">
					<h2 style="color:#fff;padding-top:25px;padding-bottom:20px">Secciones</h2>
				</div>
			</div>
			<div class="col-md-12 material-container" style="padding:0">
				<?php
				include 'slide-sections.php';
				include 'slider-movil.php';
				?>
			</div>
		</div>
			<!--Slider movil-->

			<!-- AREA MULTIMEDIA -->

			<div class="row sub-menu-main">
				<div class="col-md-12 material-container" style="padding:0">
					<div class="col-md-12" style="margin-rigth:30px">
						<h2 style="padding:10px; color:#fff;padding-top:25px">MULTIMEDIA</h2><br>
					</div>
					<?php
					$postCounter =0;
					if ( $allPost ) {
						foreach($allPost as $post){
							setup_postdata($post);
							if(in_category('MULTIMEDIA')){
								?>
								<div class="col-sm-6 col-xs-6" style="padding:0">
									<?php
									$youtube = getYTurl();
									$full = 'https://www.youtube.com/embed/'.$youtube.'?version=3&controls=0&rel=0&showinfo=0&autohide=1';
									if(empty($youtube)){?>
										<div class="container-post">
											<div class="img-media-container">
												<?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('post-thumbnails',array('class'=>'img-media filter-off lazyload'));
												} ?>
											</div>
											<div class="center-full">
												<h2 style="color:#fff">
													<?php the_title(); ?>
												</h2>
												<p>
													<?php the_excerpt(); ?>
												</p>
											</div>
										</div>
									<?php }else{
										?>
										<div class="container-post">
											<div class="img-media-container">
												<iframe id="<?php echo 'video-'.$postCounter ?>" class="filter-off" width="100%" style="border:0" height="500px" src="<?php echo $full ?>">
												</iframe>
												<div id="<?php echo 'text-'.$postCounter ?>" class="center-full" style="filter:none">
													<h2 style="color:#fff">
														<?php the_title(); ?>
													</h2>
													<p>
														<?php the_excerpt(); ?>
													</p>
												</div>
												<button id="<?php echo 'play-'.$postCounter ?>" class="circle-buttom"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></button>
											</div>

										</div>
									<?php } ?>
								</div>
								<?php $postCounter++ ?>

							<?php }
						}
					}
					?>
				</div>
			</div>
			<!--AREA RADIO Y FOTOGRAFIA-->
			<div class="row sub-menu-main">
				<div class="col-6"><h2 style="color:#fff;padding-top:25px;padding-bottom:20px;">Radio Comunica</h2>
				</div>
				<div class="col-6"><h2 style="color:#fff;padding-top:25px;padding-bottom:20px;">Fotografía</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 material-container">
					<div class="col-sm-6 col-xs-6 lazyload">
						<?php dynamic_sidebar('podcast'); ?>
					</div>
					<div class="col-sm-6 col-xs-6 lazyload">
						<div class="row galery">
							<?php dynamic_sidebar('sidebar-1'); ?>
						</div>
					</div>
				</div>
			</div>
			<!--AREA SLIDER MEDIOS JESUITAS-->
			<div class="row" style="background:#fff">
				<div class="col-md-12">
					<div class="col-md-12">
						<h2 style="padding:20px 0px">Medios Jesuitas en C.A.</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="slide-medios lazyload">
						<section id="slideshow-medios">
							<?php dynamic_sidebar('sidebar-2'); ?>
						</section>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php get_footer(); ?>

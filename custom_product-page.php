<?php /* Template Name: Custom Product */ ?>

<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<section class="sc-cu-product-img mt-4 mt-lg-5 mb-5">
		<div class="container">
			<img src="<?php the_field( 'main_product_image' ); ?>" alt="Main Image">
		</div>
	</section>

	<section class="sc-cu-product-video mb-5">
		<div class="container">
			<div class="embed-responsive embed-responsive-16by9 js-videoWrapper">
				<video controls class="videoIframe js-videoIframe" id="my-video">
				  	<source src="<?php the_field( 'product_video' ); ?>" type="video/mp4" class="js-videoTframe--inner" data-src="">
				</video>
				<!-- Poster Image Start -->
				<?php $posterd_img = get_field( 'product_video_image' );?>
				<button class="videoPoster js-videoPoster" style="background-image:url(<?php echo $posterd_img; ?>);"></button>
				<!-- Poster Image End -->
			</div>
		</div>
	</section>

	<section class="sc-custom-product-slider mb-5">
		<div class="container">
			<div class="position-relative">
				<div class="sc-features-product-nav">
					<ul class="sc-features-nav">
						<?php if ( have_rows( 'product_slider' ) ) : $img_counter = 1; while ( have_rows( 'product_slider' ) ) : the_row(); ?>
					    	<li class="step-item feature-sld-<?php echo $img_counter; ?> <?php if($img_counter == 1){echo 'active';} ?>" data-slider="<?php echo $img_counter; ?>"><a href="javascript:void(0);" ><?php the_sub_field( 'product_slider_navigation_name' ); ?></a></li>
					    <?php $img_counter++; endwhile; endif; ?>
					</ul>
				</div>
				<div class="owl-carousel owl-theme Slider--css owl-fesc-product-sld">
					<?php if ( have_rows( 'product_slider' ) ) : $counter = 1; while ( have_rows( 'product_slider' ) ) : the_row(); ?>
						<div class="feature-sld-<?php echo $counter; ?> item" data-item="<?php echo $counter; ?>"> 
							<div class="sc-feature-sld-box" style="background-image: url(<?php the_sub_field( 'product_slider_image' ); ?>);">
								<div class="sc-features-info-box">
									<div class="sc-features-info-box-iner">
										<h4><?php the_sub_field( 'product_slider_title' ); ?></h4>
										<p class="mb-0"><?php the_sub_field( 'product_slider_data' ); ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php $counter++; endwhile; endif; ?>
				</div>				
			</div>
		</div>
	</section>

	<section class="sc-in-simple-app mb-5">
		<div class="container">
			<div class="owl-carousel owl-theme Slider--css owl-interactive-simple-app">
				<?php if ( have_rows( 'interactive_simple_app_slider' ) ) : while ( have_rows( 'interactive_simple_app_slider' ) ) : the_row(); ?>
					<div class="item"> 
						<div class="sc-feature-sld-box" style="background-image: url(<?php the_sub_field( 'interactive_simple_app_image' ); ?>);">
							<div class="sc-features-info-box">
								<div class="sc-features-info-box-iner">
									<h4><?php the_sub_field( 'interactive_simple_app_title' ); ?></h4>
									<p class="mb-0"><?php the_sub_field( 'interactive_simple_app_data' ); ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>

	<?php $image_hotspot = get_field( 'product_hotspot_shortcode' ); ?>
	<?php if( !empty($image_hotspot) ) { ?>
		<section class="sc-product-hotspot mb-5">
			<div class="container">
				<?php echo do_shortcode( $image_hotspot ); ?>
			</div>
		</section>
	<?php } ?>

	<section class="sc-in-simple-app hoop-slider-two mb-5">
		<div class="container">
			<div class="owl-carousel owl-theme Slider--css sc-hoop-cam-slider">
				<?php if ( have_rows( 'slider_2_repeater' ) ) : while ( have_rows( 'slider_2_repeater' ) ) : the_row(); ?>
					<div class="item"> 
						<div class="sc-feature-sld-box" style="background-image: url(<?php the_sub_field( 'slider_2_image' ); ?>);">
							<div class="sc-features-info-box">
								
							</div>
						</div>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>

	<section class="sc-product-q-a mb-5">
		<div class="container">
			<div class="accordion" id="product-accordion">
				<?php $m=1; if(have_rows('product_accordion')){ while ( have_rows('product_accordion') ) { the_row(); ?>
					<div class="card">
						<div class="card-header p-0" id="product-question">
							<h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne-<?php echo $m; ?>" aria-expanded="true" aria-controls="collapseOne">
									<?php the_sub_field('product_question'); ?>
							</h5>
						</div>
						<div id="collapseOne-<?php echo $m; ?>" class="collapse" aria-labelledby="product-question" data-parent="#product-accordion">
							<div class="card-body">
								<?php the_sub_field('product_answer'); ?>
							</div>
						</div>
					</div>
				<?php $m++; } } wp_reset_query();  ?>	
			</div>
		</div>
	</section>

<?php endwhile; ?>
<?php get_footer(); ?>
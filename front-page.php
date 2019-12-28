<?php 
    get_header(); 
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.splitter.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.splitter.css">

<section class="home-hero">
	<div class="embed-responsive home-video-cont">
		<video id="home-hero-video" class="embed-responsive-item" poster="<?php the_field('hero_video_banner'); ?>" autoplay="" muted="" playsinline="">
			<source src="<?php the_field('home_hero_mp4_video_link'); ?>" type="video/mp4">
		</video>
	</div>
	<div class="play-button-cont">
		<a href="#"><i class="fas fa-play"></i> Play again</a>
	</div>
	<div class="home-hero-content">
		<div class="container">
			<div class="text-big home-hero-content-inner">
				<?php the_field('hero_content'); ?>
				<a href="<?php the_field('shop_now_link'); ?>" class="mt-4 site-btn btn-gray"><?php the_field('shop_now_name'); ?></a>
			</div>
		</div>
	</div>
</section>

<section class="home-about-hook">
	<div class="container">
        <div class="row justify-content-center text-center">
			<div class="col-12 col-lg-10 col-xl-8">
				<?php if(get_field('hoop_title')): ?>
					<h3><?php the_field('hoop_title'); ?></h3>
				<?php endif; ?>
				<?php if(get_field('hoop_title_large')): ?>
					<h1 class="mb-4"><?php the_field('hoop_title_large'); ?></h1>
				<?php endif; ?>
				<?php if(get_field('about_hoop_info')): ?>
					<div class="text-big">
						<?php the_field('about_hoop_info'); ?>
					</div>
				<?php endif; ?>				
			</div>
		</div>
		<?php if(get_field('hoop_product_image')): ?>
		 <div class="row mt-md-4 py-5 text-center">
			<div class="col-12">
				<img src="<?php the_field('hoop_product_image'); ?>" alt="Products" />
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>

<section class="day-smith-family">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10 col-xl-9 text-center">
				<?php if(get_field('smith_family_main_title')): ?>
					<h2 class="color-red mb-4"><?php the_field('smith_family_main_title'); ?></h2>
				<?php endif; ?>
				<?php if(get_field('smith_title_descriptions')): ?>
					<div class="row justify-content-center">
						<div class="col-12 col-lg-10 col-xl-10 text-big">
							<?php the_field('smith_title_descriptions'); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container day-life-slider-nav-cont">
		<div class="row">
			<div class="col-12 text-center">
				<?php if( have_rows('a_day_in_life_slider') ): $counter = 0; ?>
					<ul class="day-life-slider-nav d-flex justify-content-around">
						<?php while ( have_rows('a_day_in_life_slider') ) : the_row(); ?>
						<li>
							<?php 
								if( $counter == 0 ){
									$active_class = 'active';
								}else{
									$active_class = '';
								}
							?>
							<a href="#slider-<?php echo $counter; ?>" data-id="<?php echo $counter; ?>" class="<?php echo $active_class; ?>" >
								<img src="<?php the_sub_field('slide_icon'); ?>">
								<img class="slide-icon-active" src="<?php the_sub_field('slide_icon_active'); ?>">
							</a>
						</li>
						<?php $counter++; endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container-fluid px-0">
		<?php if( have_rows('a_day_in_life_slider') ): $counter = 0; ?>
			<div class="owl-carousel owl-theme a-day-in-family-slider">
				<?php while ( have_rows('a_day_in_life_slider') ) : the_row(); ?>
					<div class="item" data-hash="slider-<?php echo $counter; ?>" id="<?php echo $counter; ?>" >
						<div class="a-day-life-box slider-play-btn <?php if($counter == 0){ echo 'active';} ?>" href="">
							<video id="my-video" class="embed-responsive-item my-video" poster="<?php the_sub_field('a_day_in_life_image'); ?>" muted="" loop="" playsinline="">
								<source src="<?php the_sub_field('a_day_in_life_video'); ?>" type="video/mp4">
							</video>
							<div class="day-left-info">
								<h3 class="text-white"><?php the_sub_field('a_day_in_life_info'); ?></h3>
							</div>
						</div>
					</div>
				<?php $counter++; endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="achieve-by">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10 col-xl-9 text-center">
				<?php if(get_field('achieve_by_title')): ?>
					<h3 class="color-gray pb-3 mb-5"><?php the_field('achieve_by_title'); ?></h3>
				<?php endif; ?>
			</div>
		</div>
		<?php if( have_rows('achieve_steps') ): ?>
			<div class="row justify-content-center">
				<?php while ( have_rows('achieve_steps') ) : the_row(); ?>
					<div class="col-12 col-sm-6 col-lg-4 text-center">
						<div class="achieve-box">
							<div class="achieve-box-icon d-flex align-items-center justify-content-center">
								<div class="">
									<img class="mb-4" src="<?php the_sub_field('step_icon'); ?>">
								</div>
							</div>
							<h4 class="mb-3"><?php the_sub_field('step_title'); ?></h4>
							<p class="text-big"><?php the_sub_field('step_description'); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="home-features">
	<div class="container">
		<?php if( have_rows('feature_slides') ): ?>
			<div class="owl-carousel owl-theme features-slider">
				<?php while ( have_rows('feature_slides') ) : the_row(); ?>
					<div class="item">
						<div class="feature-box text-center">
							<img src="<?php the_sub_field('feature_image'); ?>">
							<div class="feature-box-info">
								<h4><?php the_sub_field('feature_title'); ?></h4>
								<p class="text-big"><?php the_sub_field('feature_content'); ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="sc-splitter">
	<div class="splitter-link-box">
		<div class="container">
			<h3 class="text-center"><?php the_field('splitter_title'); ?></h3>
			<ul class="list-unstyled text-center">
				<?php if( have_rows('splitter_slider') ): $counter=1; while ( have_rows('splitter_slider') ) : the_row(); ?>
					<li class="d-inline-block mr-3 <?php if($counter == 1){ echo 'active'; } ?>">
						<a href="#splitter-<?php echo $counter; ?>" class="splitter-link">
							<div class="link-box" style="background-color: <?php the_sub_field('splitter_text_color'); ?>"></div>
						<span class="d-none d-lg-block mt-1"><?php the_sub_field('splitter_color_name'); ?></span></a>
					</li>
				<?php $counter++; endwhile; endif; ?>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 px-0 text-center">
				<div class="owl-carousel owl-theme owl-splitter-slider">
					<?php if( have_rows('splitter_slider') ): $counter=1; while ( have_rows('splitter_slider') ) : the_row(); ?>
						<div class="item" data-hash="splitter-<?php echo $counter; ?>">
							<div id='jqxSplitter<?php echo $counter; ?>' class="splitter-box" style="background-image: url(<?php the_sub_field('splitter_background_image'); ?>);">
						  		<div id="panel1" class="splitter-one" style="background-image: url(<?php the_sub_field('splitter_background_css'); ?>);"></div>
						   		<div id="panel2" style="background-color: rgba(0,0,0,0);" class="splitter-two"></div>
							</div>
							<img src="<?php the_sub_field('splitter_main_center_image'); ?>" class="splitter-img">
							<a href="<?php the_sub_field('splitter_shop_btn_link'); ?>" class="site-btn splitter-shop-btn" style="color: <?php the_sub_field('splitter_text_color'); ?>"><?php the_sub_field('splitter_shop_btn_name'); ?></a>
						</div>
						
					<?php $counter++; endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
	
</section>

<script type="text/javascript">
		jQuery(function($) {
    		var x = 1;
    	    jQuery( ".owl-splitter-slider .item" ).each(function() {
    	    	var id = '#jqxSplitter'+x;
    	      	jQuery(id).width('100%').height(600).split({
    		       orientation: 'vertical',
    		       limit: 0,
    		       position: '55%',
    		       percent: true
    		   });
    		  x++;
    		});
		});
</script>
<?php if( ! get_field('disable_compare_table') ): ?>
<section class="compare-table" style="background-image: url( <?php the_field('comparison_back_table_image'); ?>)">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<?php if(get_field('achieve_by_title')): ?>
					<h3 class="color-gray pb-3 mb-5"><?php the_field('campare_table_title'); ?></h3>
				<?php endif; ?>
			</div>
			<?php if( have_rows('feature_row') ): ?>
			<div class="col-12">
				<div class="compare-table-box">
					<table class="table table-striped">
						<thead>
							<tr class="table-logo">
							  	<th scope="col"></th>
							  	<th scope="col"><img class="mb-3" src="<?php the_field('arlo_logo'); ?>"></th>
							  	<th scope="col"><img class="mb-3" src="<?php the_field('nest_logo'); ?>"></th>
							  	<th scope="col"><img class="mb-3" src="<?php the_field('ring_logo'); ?>"></th>
								<th scope="col"><img class="mb-3" src="<?php the_field('hoop_logo'); ?>"></th>
							</tr>
						</thead>
						<tbody>
							<?php while ( have_rows('feature_row') ) : the_row(); ?>
								<tr>
									<th scope="row"><?php if( get_sub_field('feature_name') ): ?><p class="mb-0"><?php the_sub_field('feature_name'); ?></p><?php endif; ?></th>
									<td><?php if( get_sub_field('arlo') ): ?> <img src="<?php echo get_template_directory_uri(); ?>/images/truegray.png"> <?php endif; ?></td>
									<td><?php if( get_sub_field('nest') ): ?> <img src="<?php echo get_template_directory_uri(); ?>/images/truegray.png">  <?php endif; ?></td>
									<td><?php if( get_sub_field('ring') ): ?> <img src="<?php echo get_template_directory_uri(); ?>/images/truegray.png">  <?php endif; ?></td>
									<td><?php if( get_sub_field('hoop') ): ?> <img src="<?php echo get_template_directory_uri(); ?>/images/true.png">  <?php endif; ?></td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if( ! get_field('disable_easy_as_can_be_section') ): ?>
<section class="easy-can-be">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-3 mb-lg-5 pb-lg-3">
				<h3><?php the_field('easy_as_can_be_title'); ?></h3>
			</div>
		</div>
		<?php if( have_rows('easy_as_can_be_boxes') ): while ( have_rows('easy_as_can_be_boxes') ) : the_row(); ?>
			<div class="easy-box-cont">
				<div class="row">
					<div class="col-12 col-md-6 easy-box-info-main">
						<div class="easy-box-info">
							<?php the_sub_field('easy_box_descriptions'); ?>
							<a href="<?php the_sub_field('easy_box_button_link') ?>">Learn how</a>
						</div>
					</div>
					<div class="col-12 col-md-6 easy-box-image">
					<!--	<div class="easy-box-video play-video-btn">
							<video id="" class="embed-responsive-item easy-box-inner" poster="<?php the_sub_field('video_placeholder_poster'); ?>" muted="" loop="" playsinline="">
								<source src="<?php the_sub_field('easy_box_video'); ?>" type="video/mp4">
							</video> -->
							<!-- <img src="<?php //the_sub_field('easy_box_images'); ?>" /> --> 
					</div>
				<!--	</div> -->
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</section>
<?php endif; ?>

<section class="community-slider community-slider-home">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center text-gray mb-4 mb-lg-5">
				<h2>Getting Started With Hoop</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php 
					$args = array(
						'post_type' => 'topic',
						'posts_per_page' => -1,
						'orderby' => 'date',						
						'meta_query' => array(
							array(
								'key' => 'topic_is_featured',
								'value' => '1'
							)
						)
					); 
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ):
				?>
				<div class="owl-carousel owl-theme owl-community-slider">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						 <div class="item">
							 <div class="com-slide-img">
								 <a href="<?php the_permalink(); ?>" ><img src="<?php echo the_field('featured_image'); ?>"></a>
							 </div>
							 <div class="com-slide-content">
								  <h5><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h5>
								 <p><?php the_excerpt(); ?></p>
							 </div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>
<section class="voice-control">
	<div class="container">
		<div class="row mb-lg-5">
			<div class="col-12 text-center">
				<?php if(get_field('voice_control_title')): ?>
					<h3 class="color-gray pb-3 mb-5"><?php the_field('voice_control_title'); ?></h3>
				<?php endif; ?>
			</div>
		</div>
		<div class="row line-row">
			<div class="col-12 col-md-6 control-box-dvdr">
				<div class="voice-control-box text-center">
					<img src="<?php the_field('alexa_image'); ?>">
					<?php the_field('alexa_information'); ?>
				</div>
			</div>
			<div class="col-12 col-md-6 mb-5">
				<div class="voice-control-box text-center">
					<img src="<?php the_field('google_assistant_image'); ?>">
					<?php the_field('google_assistant_information'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<ul class="app-link d-flex align-items-center justify-content-center list-unstyled text-center mb-0">
					<li class="text-left"><?php the_field('download_app_info'); ?></li>
					<?php if( get_field('application_appstore_link') ): ?><li><a href="<?php echo get_field('application_appstore_link') ?>"><img src="<?php echo get_template_directory_uri() ?>/images/app-store.png"></a></li><?php endif; ?>
					<?php if( get_field('application_playstore_link') ): ?><li><a href="<?php echo get_field('application_playstore_link') ?>"><img src="<?php echo get_template_directory_uri() ?>/images/google-play.png"></a></li><?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	jQuery.noConflict();
	var x = 1;
	jQuery( ".a-day-in-family-slider  .item" ).each(function() {
	   	var id = '#jqxSplitter'+x;
	    jQuery(id).width('100%').height('calc(100vh)').split({
			orientation: 'vertical',
		    limit: 0,
		    position: '100%',
		    percent: true
		});
		x++;
	});
            
	</script>				
<?php endwhile; ?>

<?php get_footer(); ?>
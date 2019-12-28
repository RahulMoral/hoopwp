<?php /* Template Name: Plan Page */ ?>

<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
<section class="hero-section" style="background-image:url('<?php the_field('hero_background_image') ?>');">
	<div class="container">
		<div class="d-flex justify-content-center align-items-lg-center text-white hero-content">
			<div class="hero-content-box text-center text-big">
				<div class="d-block mb-5">
					<?php the_field('hero_content'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="sc_plan how-bg">
	<div class="container pricing-container">
		<div class="row justify-content-center">
			<div class="col-12">
				<!--<div class="owl-carousel owl-theme owl-plan-slider">-->
				    <div class="plan-content-bx">
					<?php if( have_rows('pricing_table') ): while ( have_rows('pricing_table') ) : the_row(); ?>
						<div class="item">
							<div class="pricing_table">
								<div class="card mb-5 mb-lg-0">
									<div class="card-header text-center">
										<h4 class="card-title text-uppercase"><?php the_sub_field('pricing_plan'); ?></h4>
										<h1 class="card-price m-0"><sup class="price">$</sup><?php the_sub_field('pricing_price'); ?><span class="text-big medium-font">/<?php the_sub_field('pricing_month'); ?></span></h1>
										<p class="text-center mb-4"><span class="text-small pricing-camera"><?php the_sub_field('pricing_per_camera'); ?></span></p>
										<p class="text-big font-weight-bold mb-0"><?php the_sub_field('pricing_day_histroy'); ?></p>
									</div>
									<div class="card-body">
										<ul class="list-unstyled pricing_futures">
											<?php if( have_rows('prcing_futures') ): while ( have_rows('prcing_futures') ) : the_row(); ?>
												<li class="text-small"><img src="<?php echo get_template_directory_uri() ?>/images/cam-color-red-selected.png" class="pricing-img"><?php the_sub_field('pricing_futures_text'); ?></li>
											<?php endwhile; endif; ?>
										</ul>
									</div>
									<div class="card-footer text-center">
										<a href="<?php the_sub_field('pricing_btn_link'); ?>" class="site-btn"><?php the_sub_field('pricing_btn_name'); ?></a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			
		</div>
	</div>
<?php if( ! get_field('disable_premium_video_section') ):  ?>
	<div class="container premium_video">
		<div class="row justify-content-center">
			<div class="col-12 text-center">
				<h3><?php the_field('premium_video_title'); ?></h3>
				<h3 class="premium-video-price"><span class="text-big medium-font">$</span><?php the_field('premium_video_price'); ?><span class="text-big medium-font">/<?php the_field('premium_video_month'); ?></span></h3>
				<p class="text-center mb-5"><span class="text-small pricing-camera"><?php the_field('premium_video_camera'); ?></span></p>
				<?php the_field('premium_video_text'); ?>
				<a href="<?php the_field('premium_video_btn_link'); ?>" class="site-btn mt-4"><?php the_field('premium_video_btn_name'); ?></a>
			</div>
		</div>
	</div>
<?php endif; ?>
</section>

<?php if( ! get_field('disable_faq_section_plan') ):  ?>
<section class="sc_faqs">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h3 class="mb-5"><?php the_field('faq_title'); ?></h3>
			</div>
			<div class="col-12">
				<div class="accordion" id="accordionExample">
					<?php $m=1; if(have_rows('faq_repter')){ while ( have_rows('faq_repter') ) { the_row(); ?>
						<div class="card">
							<div class="card-header p-0" id="headingOne">
								<p class="mb-0 text-big faq-question" data-toggle="collapse" data-target="#collapseOne-<?php echo $m; ?>" aria-expanded="true" aria-controls="collapseOne">
										<?php the_sub_field('faq_question'); ?>
								</p>
							</div>
							<div id="collapseOne-<?php echo $m; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body faq-answer text-big">
									<?php the_sub_field('faq_answer'); ?>
								</div>
							</div>
						</div>
					<?php $m++; } } wp_reset_query();  ?>
				</div>
			</div>
		</div>
		
	</div>
</section>
<?php endif; ?>
<?php endwhile; ?>
<?php get_footer(); ?>
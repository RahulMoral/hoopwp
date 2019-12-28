<?php /* Template Name: Support */ ?>

<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="hero-section" style="background-image:url('<?php the_field('hero_background_image') ?>');">
	<div class="container">
		<div class="d-flex justify-content-center align-items-lg-center text-white hero-content">
			<div class="hero-content-box text-center text-big">
				<div class="d-block mb-5">
					<?php the_field('hero_content'); ?>
				</div>
				<div class="bbp-search-form">
					<?php echo get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="support-featured">
    <div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2><?php the_field('support_artical_title'); ?></h2>
			</div>
		</div>
	</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php echo do_shortcode('[supportfeaturedcat]');?>
            </div>
        </div>
    </div>
</section>

<section class="support-section <!--how-bg--> video_support_section">
	<!--
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 text-center">
				<h2><?php the_field('support_video_title'); ?></h2>
			</div>
		</div>
	</div>

<?php
	$i = 1;	
	$works = get_terms( 'videos', array( 'parent' => 0 ) ); //parent
	
	foreach($works as $value){		
			$taxonomy_name = $value->name;
			$taxonomy = $value->slug;
			//var_dump($taxonomy);
	
		$args = array(
			'post_type' => 'support_video',
      		'posts_per_page' => 3,
      		'post_status' => 'publish',
			'tax_query' => array(
	        	'relation' => 'OR',
    	 	 )
    	);
		$args['tax_query'][] = array(
      		'taxonomy' => 'videos',
      		'field'    => 'slug',
      		'terms'    => $taxonomy
    	);
    	$the_query = new WP_Query( $args );
		if ($the_query->have_posts() ):
?>
	<div class="container video-cont">
		<div class="row">
			<div class="col-12 text-center">
				<h4><?php echo $taxonomy_name; ?></h4>
			</div>
			<div class="col-12">
				<div class="owl-carousel owl-theme owl-support-slider">
					<?php while ($the_query->have_posts() ) : $the_query->the_post();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
					<div class="item">
						<div class="">
							<div class="video-box">
								<a href="<?php the_field('video_link'); ?>" class="video-link" data-rel="lightbox">
									<img src="<?php echo $featured_img_url; ?>" class="img-fluid embed-responsive-item">
								</a>
								<p><?php the_title(); ?></p>
							</div>
						</div>
					</div>
						
					<?php endwhile ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; wp_reset_query(); }?>

	<div class="container">
		<div class="row">
			<div class="col-12 text-center my-4">
				<a href="#" class="site-btn" id="load-more">SHOW MORE</a>
			</div>
		</div>
	</div>
</section>


<section class="support_guides">
	-->
    <div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2><?php the_field('support_guide_main_title'); ?></h2>
			</div>
		</div>
	</div>
    <div class="container video-cont">
        <div class="row justify-content-center">
		<?php if( have_rows('support_guides_field') ): ?>
			
				<?php while ( have_rows('support_guides_field') ) : the_row(); ?>
					<div class="support_guides_item">
						<div class="support_guides_box text-center">
							<div class="support_guides_box_info">
								<a href="<?php the_sub_field('support_guide_link'); ?>" target="_blank"><p><?php the_sub_field('support_guide_title'); ?></p></a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			
		<?php endif; ?>
	    </div>
	</div>
</section>


<?php endwhile; ?>


<?php if( ! get_field('disable_faq_support_section') ):  ?>
<section class="sc_faqs support_faq">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h3 class="mb-5"><?php the_field('support_faq_title'); ?></h3>
			</div>
			<div class="col-12">
				<div class="accordion" id="accordionExample">
					<?php $m=1; if(have_rows('support_faq_repter')){ while ( have_rows('support_faq_repter') ) { the_row(); ?>
						<div class="card">
							<div class="card-header p-0" id="headingOne">
								<p class="mb-0 text-big faq-question" data-toggle="collapse" data-target="#collapseOne-<?php echo $m; ?>" aria-expanded="true" aria-controls="collapseOne">
										<?php the_sub_field('support_faq_question'); ?>
								</p>
							</div>
							<div id="collapseOne-<?php echo $m; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body faq-answer text-big">
									<?php the_sub_field('support_faq_answer'); ?>
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



<section class="support_guides_contact">
    <div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2><?php the_field('contact_heading'); ?></h2>
			</div>
		</div>
	</div>
    <div class="container video-cont">
        <div class="row justify-content-center">
		<?php if( have_rows('support_contact_content') ): ?>
			
				<?php while ( have_rows('support_contact_content') ) : the_row(); ?>
					<div class="support_guides_contact_main">
						<div class="support_guides_box_contact text-center">
						    <img src="<?php the_sub_field('contact_image');?>">
							<div class="support_guides_box_info_contact">
								<h5><?php the_sub_field('contact_title'); ?></h5>
								<p><?php the_sub_field('contact_text');?></p>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			
		<?php endif; ?>
	    </div>
	</div>
</section>




<script>
jQuery(document).ready(function() {
jQuery(".video-cont .support_articles_main").each(function () {
	jQuery(this).append("<button class='button more-text'>[+]</button>");
	jQuery(this).append("<button class='button more-text1'>[-]</button>");
});
jQuery(".video-cont .support_articles_main").each(function () {
	jQuery(this).find(".more-text1").css("display","none");
	jQuery(this).find(".more-text").css("display","none");
});
jQuery(".video-cont .support_articles_main").each(function () {
	var length_p = jQuery(this).find(".support_articles_content").children("p").text().length;
	if(length_p > 150){
	     jQuery(this).find(".more-text").css("display","block");	
    }
});
jQuery(".more-text").click(function() {
	jQuery(this).parent().css("height", "auto");
	jQuery(this).css("display","none");	
	jQuery(this).parent().find(".more-text1").css("display","block");
})
jQuery(".more-text1").click(function() {	
	jQuery(this).parent().css("height", "250");
	jQuery(this).parent().find(".more-text").css("display","block");
	jQuery(this).css("display","none");	
});
  jQuery(".support_faq .card:first-child").find('.card-header').addClass('active');
  jQuery(".support_faq .card:first-child").find('.collapse').addClass('show');
});
</script>
<?php get_footer(); ?>
<?php /* Template Name: Community */ ?>

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
					<?php bbp_get_template_part( 'form', 'search' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="community-slider">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center text-gray mb-4 mb-lg-5">
				<h2>From The Hoop Community</h2>
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

<section class="community_forum">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-lg-3">
			<div class="col-12 col-lg-10 text-big text-center">
				<?php the_field('community_forum_info'); ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-3">
				<?php dynamic_sidebar( 'Community Sidebar' ); ?>
				<div class="blog-sidebar">
					<h5 class="text-gray mb-4">Blog</h5>
					<?php 
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 5,
							'orderby' => 'date',
						); 
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
						<div class="sidebar-blog-box d-flex align-items-center">
							<div class="d-inline-block">
								<?php $featuredimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
								<a class="d-inline-block blog-f-img" href="<?php echo get_the_permalink(); ?>" style="background-image:url(<?php echo $featuredimg; ?>)"></a>
							</div>
							<div class="d-inline-block">
								<a class="bloglink" href="<?php echo get_the_permalink(); ?>"><h6><?php echo get_the_title(); ?></h6></a>
							</div>
						</div>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
			<div class="col-12 col-lg-9 community-forum-main">
				<?php echo do_shortcode( ' [bbp-topic-index] ' ); ?>
			</div>
		</div>
	</div>
	<div class="container py-4">
		<div class="row">
			<div class="col-12 col-lg-9 offset-lg-3">
				<a href="<?php home_url(); ?>/staging/new-topic/" class="site-btn btn-gray">post a topic</a>
			</div>
		</div>
	</div>
</section>


<?php endwhile; ?>
<?php get_footer(); ?>
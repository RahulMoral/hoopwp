<?php get_header(); ?>

	<section class="blog-content">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-lg-8">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div class="post">
							<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>
						</div>
					<?php endwhile; ?>
				</div>
				<div class="col-12 col-lg-3">
					<?php get_sidebar(); ?>
				</div>
			</div>
			<?php posts_nav_link();?>
		</div>
	</section>
	
<?php get_footer(); ?>

<?php get_header(); ?>

	
	    <section class="single-post-content">
		<div class="container">
		<h3>
			<?php wp_title('', true,''); ?></h3><br>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content();?>
			<?php endwhile; ?>
			</div>
	</section>

 		
		

<?php get_footer(); ?>
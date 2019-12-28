<?php
/**
* Template Name: membership Page
*/
get_header(); 
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="page-content">
	<div class="container">
		<?php the_content();?>
	</div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
<?php get_header(); ?>
<?php 
	$s = $_GET['s'];
	$args = array(
		'post_type' => 'support_article',
      	'posts_per_page' => -1,
      	'post_status' => 'publish',
      	's' => $s,
    );
    $the_query = new WP_Query( $args );
?>
<section class="page-content search-results">
	<div class="container">
		<div class="search-for-box">
			<h5 class="mb-0">Search Results for "<?php echo sanitize_text_field($s);?>"</h5>
		</div>
		<?php if ($the_query->have_posts() ){ ?>
			<div class="row">
				<?php while ($the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-12 col-lg-4 col-md-6 mb-4">
					<div class="article-box">
						<h5><?php the_title(); ?></h5>
						<?php the_content(); ?>
						<a href="<?php the_permalink(''); ?>" class="artical-link">Read More</a>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		<?php } else { ?>
	
    		<div class="row pt-5">
    			<div class="col-12 text-center">
					<h5 class="mb-4">No posts found. Try a different search?</h5>
		            <div class="bbp-search-form">
						<?php get_search_form(); ?>
		            </div>
		        </div>
            </div>
	
		<?php } ?>
	</div>
</section>

<?php get_footer(); ?>
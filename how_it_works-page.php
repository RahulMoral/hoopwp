<?php /* Template Name: How it work */ ?>

<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
<section class="hero-section" style="background-image:url('<?php the_field('hero_background_image') ?>');">
	<div class="container">
		<div class="d-flex justify-content-center align-items-lg-center text-white hero-content">
			<div class="hero-content-box text-center text-big">
				<div class="d-block mb-5">
					<?php the_field('hero_content'); ?>
				</div>
				<?php $how_content = get_field( "hero_content" );  if(!empty($how_content)) { ?>
			<!--	<div>
				    <a href="<?php the_field('hero_button_link'); ?>" class="site-btn"><?php the_field('hero_button_name'); ?></a>
				</div> -->
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php if( have_rows('how_repeter') ): $counter = 1; while ( have_rows('how_repeter') ) : the_row(); ?>
<?php 
	$order = " ";
	$backgroung = "";
		if($counter % 2 == 0){
			$order = "order-lg-1 ";
		}
		else {
			$order = "order-lg-2";
			$backgroung = "how-bg";
		}
?>
	<section class="sc_how-it-work  <?php echo $backgroung; ?>">
		<div class="container">
			<div class="row justify-content-center align-items-center how-it-repeter">
				<div class="col-12 col-lg-6 py-3 py-lg-0 order-2 top-one">
					<h2><?php the_sub_field('main_title'); ?></h2>
					<?php the_sub_field('main_contaent'); ?>
				    <?php $value = get_sub_field( "button_link" ); ?>
				     <?php  if(!empty($value)){ ?>
					<a href="<?php the_sub_field('button_link'); ?>" class="site-btn"><?php the_sub_field('button_name'); ?></a>
					<?php } ?>
				</div>
				<div class="col-12 col-lg-6 py-3 py-lg-0 text-center <?php echo $order; ?> top-two">
					<img src="<?php the_sub_field('main_image'); ?>" class="how-image">
				</div>
			</div>
		</div>
	</section>
<?php $counter++; endwhile; endif; ?>	
		
<?php endwhile; ?>
<?php get_footer(); ?>
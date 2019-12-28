	<?php /* Template Name: Splitter */ ?>

	<?php get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.splitter.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.splitter.css">
	<section class="sc-splitter">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-12 text-center">
					<ul class="list-unstyled">
						<?php if( have_rows('splitter_repeter') ): $counter=1; while ( have_rows('splitter_repeter') ) : the_row(); ?>
							<li class="d-inline-block mr-3">
								<a href="#splitter-<?php echo $counter; ?>" class="site-btn"><?php the_sub_field('splitter_color_name'); ?></a>
							</li>
						<?php $counter++; endwhile; endif; ?>
					</ul>
				</div>
				<div class="col-12 text-center">
					<div class="owl-carousel owl-theme owl-splitter-slider">
						<?php if( have_rows('splitter_repeter') ): $counter=1; while ( have_rows('splitter_repeter') ) : the_row(); ?>
							<div class="item" data-hash="splitter-<?php echo $counter; ?>">
								<div id='jqxSplitter<?php echo $counter; ?>' class="splitter-box" style="background-image: url(<?php the_sub_field('splitter_background_image'); ?>);">
							  		<div id="panel1" class="splitter-one" style="background-image: <?php the_sub_field('splitter_background_color'); ?>;"></div>
							   		<div id="panel2" style="background-color: rgba(0,0,0,0);" class="splitter-two"></div>
								</div>
								<img src="<?php the_sub_field('splitter_center_image'); ?>" class="splitter-img">
							</div>
						<?php $counter++; endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		jQuery.noConflict();
		var x = 1;
	    // jQuery(document).ready(function () {
	    // 	jQuery("#jqxSplitter1").jqxSplitter({ width: '100%', height: '800px', panels: [{ size: '50%' }, { size: '100%'}] });
	    // 	jQuery("#jqxSplitter2").jqxSplitter({ width: '100%', height: '800px', panels: [{ size: '50%' }, { size: '100%'}] });
	    //  });
	    jQuery( ".item" ).each(function() {
	    	var id = '#jqxSplitter'+x;
	      	jQuery(id).width('100%').height(800).split({
		       orientation: 'vertical',
		       limit: 0,
		       position: '55%',
		       percent: true
		   });
		  x++;
		});
            
	</script>		
	<?php endwhile; ?>
	<?php get_footer(); ?>
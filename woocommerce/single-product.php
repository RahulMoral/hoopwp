<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<style>
	.cam_icon{width: 60%;}  
	.pro_dimension_img{width: 85%;}
	.single_product-descitpion h2 {margin-bottom: 0px;}
	span.woocommerce-Price-amount.amount {
	    background: #f5f5f5;
	    padding: 10px 20px;
	    display: inline-block;
	    margin-top: 20px;
	    color: #e33a5b;
	    font-weight: 600;
	}
	.woocommerce-product-details__short-description{font-size: 16px;}
	span.swatch.swatch-color {
	    opacity: 1; border-color: #fff;
	}
	span.swatch.swatch-color.selected {
	    border-color:#fff !important; 
	}
	table#single_product_vartion {
	    position: relative;
	}
	/*section.single-product-content form.variations_form.cart a.reset_variations{position: absolute;
	    right: 0;
	    top: 10px;}*/
	.tawcvs-swatches .swatch-color.selected:before{top: 7px;}
	.google_app{width: 82%; margin: auto;}
	.ios_app{width: 82%; margin: auto;}
	a.talk_us {
	    color: #5b6770;
	    border: 1px solid #5b6770;
	    padding: 5px 20px;
	    border-radius: 26px;
	    font-size: 14px;
	}
	a.talk_us:hover{background: #5b6770; color: #fff; transition: 0.4s;}
	.down_hoop{font-weight: 600;}
	.single_product-descitpion .product-content + p.price {
	    display: none;
	}
</style>
<script>
	jQuery(function($) {
		$atrr_model = $( 'select[data-attribute_name="attribute_model"]' );
		hoop_change_attr_model($atrr_model.val());
		function hoop_change_attr_model($val) {
			if( $val != '') {
        $('.single_product-descitpion .product-content + p.price').hide();
				if($val == 'Hoop Cam') {
					$('section.model_hoop_cam').show();
					$('section.model_hoop_cam_plus').hide();
        } else {
					$('section.model_hoop_cam').hide();
					$('section.model_hoop_cam_plus').show();
				}
			} else {
					$('.single_product-descitpion .product-content + p.price').show();
			}
		}
		$atrr_model.on( "change", function () {
		    $val = $(this).val();
				hoop_change_attr_model($val);
		} );
	});
</script>
<section class="single-product-content">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
</section>
<section class="single-produdct-extra-features">
	<div class="container">
	    <h2><?php echo $value = get_field( "app_title" ); ?></h2>
	    <!--	<img src="<?php //echo $value = get_field( "product_single_image" ); ?>" style="margin-bottom:30px;">-->
		<?php if( have_rows('product_slider') ): ?>
		
			<div class="owl-carousel owl-theme features-slider_prod">
				<?php while ( have_rows('product_slider') ) : the_row(); ?>
					<div class="item">
						<div class="feature-box text-center">
							<img src="<?php the_sub_field('product_slider_images'); ?>">
							<div class="feature-box-info">
								<h4><?php the_sub_field('product_slider_title'); ?></h4>
								<p class="text-big"><?php the_sub_field('product_slider_content'); ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php $amazon = get_field( "amazon_url" ); 
if(!empty($amazon)){
?>
<section class="single-produdct-amazon">
	<div class="container">
	    <div class="amazon_content_product">
	    	<h2>You can buy this product <span>at the following store</span></h2>
			<a href="<?php echo $amazon;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/amazon-logo.jpg"></a>
		</div>
	</div>
</section>

<?php } ?>
<section class="model_hoop_cam">
  	<div class="container">
		<h4>Hoop Cam</h4>  
	  	<p>Meet the Hoop, a clever little helper designed with your needs in mind. We took the standard home security camera and elevated it to a new level, with an easy-to-use mobile app that helps keep you and your family in the loop and on track. With state-of-the-art features like advanced AI detection, motorized motion panning and tracking, real-time communication, relevant notifications, and face-based or time-based reminders, Hoop empowers you to manage your home, anytime, anywhere.</p>
    	<h3 class="text-center mb-5"> What's In The Box?</h3>
    	<div class="row mt-5">
		   <div class="col-md-2 col-6 text-center">
        		<img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-Cam-Small-Icon.png">
        		<p>Hoop Cam</p>
      		</div>
      		<div class="col-md-2 col-6 text-center">
        		<img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-QSG-Icon.png">
        		<p>Quick Start Guide</p>
      		</div>
      		<div class="col-md-2 col-6 text-center">
        		<img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-USB-Cable-Icon.png">
        		<p>6′ USB cable</p>
      		</div>
      		<div class="col-md-2 col-6 text-center">
        		<img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-Power-Adapter-Icon.png">
        		<p>Power adapter</p>
      		</div>
		    <div class="col-md-2 col-5 text-center">
        		<img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-Mounting-Tape-Icon.png">
        		<p>Mounting tape</p>
      		</div>
    	</div>
  	</div>
</section>
<section class="py-5 model_hoop_cam">
  	<div class="container mt-5">
    	<h3 class="text-center mb-5">Hoop Cam Specifications</h3>
    	<div class="row mt-5">
      		<div class="col-md-4">
        		<img class="pro_dimension_img" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-Cam-Small-Dimensions-1.jpg">
 			</div>
			<div class="col-md-4 sepc_mid">
              	<h5 class="mb-3">Features</h5>
				<p>Simple setup</p>
				<p>Fully integrated Hoop app</p>
				<p>1080p full-color live display</p>
				<p>Night vision</p>
				<p>2-way real-time communication</p>
				<p>Magnetic base</p>
				<p>WPA2 security support</p>
				<p>Motion- and sound-activated alerts</p>
				<p>Motion tagging</p>
				<p>Facial recognition with profile</p>
				<p>Alexa&trade; and Google Home&trade; compatible</p>
			</div>
			<div class="col-md-4 sepc_mid">
        		<h5  class="mb-3">System Requirements</h5>
				<p>Minimum internet upload speed of 3Mbps/3000Kbps</p>
				<p>802.11 a/b/g/n 2.4 GHz/5 GHz wireless connection</p>
				<h6 class="mt-5">For MyHoopHome mobile application</h6>
				<p>iOS or Android&trade; device with Bluetooth&reg; compatibility</p>
    			<p>iOS 8.1 or newer running on iPhone 4s or newer, iPad mini or newer, iPad 3 or newer, iPod touch (5<sup>th</sup> generation) or newer</p>
       			<p>Android 4.4 or newer operating system</p>
       		</div>
    	</div>
  	</div>
</section>
<section class="model_hoop_cam_plus">
  	<div class="container">
	  	<h4>Hoop Cam Plus</h4>  
	  	<p>Meet the Hoop, a clever little helper designed with your needs in mind. We took the standard home security camera and elevated it to a new level, with an easy-to-use mobile app that helps keep you and your family in the loop and on track. With state-of-the-art features like advanced AI detection, motorized motion panning and tracking, real-time communication, relevant notifications, and face-based or time-based reminders, Hoop empowers you to manage your home, anytime, anywhere.</p>
    	<h3 class="text-center mb-3 mb-md-5"> What's In The Box?</h3>
    	<div class="row justify-content-center mt-3 mt-md-5">
	   		<div class="col-md-2 col-6 d-none d-md-block text-center"></div>
      		<div class="col-md-2 col-5 text-center">
        		<img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-Cam-Plus-Icon.png">
        		<p>Hoop Cam Plus</p>
      		</div>
      		<div class="col-md-2 col-5 text-center">
		        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-QSG-Icon.png">
		        <p>Quick Start Guide</p>
		    </div>
		    <div class="col-md-2 col-5 text-center">
		        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-USB-Cable-Icon.png">
		        <p>6′ USB cable</p>
		    </div>
      		<div class="col-md-2 col-5 text-center">
        		<img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-Power-Adapter-Icon.png">
        		<p>Power adapter</p>
      		</div>
	  		<div class="col-md-2 col-6 d-none d-md-block text-center"></div>
    	</div>
  	</div>
</section>
<section class="py-5 model_hoop_cam_plus">
  	<div class="container mt-3 mt-md-5">
    	<h3 class="text-center mb-3 mb-md-5">Hoop Cam Plus Specifications</h3>
    	<div class="row mt-5">
      		<div class="col-md-4">
        		<img class="pro_dimension_img" src="https://myhoophome.com/wp-content/uploads/2019/11/Hoop-Cam-Plus-Dimensions-1.jpg">
      		</div>
			<div class="col-md-4 sepc_mid">
        		<h5 class="mb-3">Features</h5>
        		<p>Simple setup</p>
				<p>Fully integrated Hoop app</p>
				<p>1080p full-color live display</p>
				<p>Night vision</p>
				<p>2-way real-time communication</p>
				<p>Motorized 350&deg; panning, 45&deg; tilt</p>
				<p>WPA2 security support</p>
				<p>Motion- and sound-activated alerts</p>
				<p>Motion tracking and motion tagging</p>
				<p>Facial recognition with profile</p>
				<p>Alexa&trade; and Google Home&trade; compatible</p>
			</div>
			<div class="col-md-4 sepc_mid">
        		<h5  class="mb-3">System Requirements</h5>
				<p>Minimum internet upload speed of 3Mbps/3000Kbps</p>
				<p>802.11 a/b/g/n 2.4 GHz/5 GHz wireless connection</p>
				<h6 class="mt-5">For MyHoopHome mobile application</h6>
				<p>iOS or Android&trade; device with Bluetooth&reg; compatibility</p>
    			<p>iOS 8.1 or newer running on iPhone 4s or newer, iPad mini or newer, iPad 3 or newer, iPod touch (5<sup>th</sup> generation) or newer</p>
       			<p>Android 4.4 or newer operating system</p>
       		</div>
    	</div>
  	</div>
</section>
<section class="compatibility">
 	<div class="container mt-3 mt-md-5">
    	<h3 class="text-center mb-3 mb-md-5"> Compatibility </h3> 
		<div class="row custm_logos justify-content-center pb-5">
  			<div class="col-md-2 text-center mb-3 mb-md-0">
    			<img src="https://myhoophome.com/wp-content/uploads/2019/11/amazone_alexa.jpg">
  			</div>
   			<div class="col-md-2 text-center mb-3 mb-md-0">
    			<img src="https://myhoophome.com/wp-content/uploads/2019/11/google_assis.jpg">
			</div>
			<div class="col-md-3 text-center mb-3 mb-md-0">
    			<p class="down_hoop">Download the Hoop app <br>
				Available for iPhone and Android</p>
 			</div>
			<div class="col-md-2 text-center mb-3 mb-md-0">
    			<a href="https://apps.apple.com/ca/app/my-hoop-home/id1487905830" target="blank"><img class="ios_app" src="https://myhoophome.com/wp-content/uploads/2019/11/app-store.png"></a>
    		</div>
			<div class="col-md-2 text-center mb-3 mb-md-0">
	  			<a href="https://play.google.com/store/apps/details?id=com.hoophome" target="blank"><img class="google_app" src="https://myhoophome.com/wp-content/uploads/2019/11/google-store.png"></a>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12 text-center my-3 my-md-5">
				<p>Not sure what’s right for you?</p>
				<a class="talk_us" href="/support/">Talk to us </a>
			</div>
		</div>
 	</div> 
</section>
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

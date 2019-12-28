<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title><?php echo get_bloginfo( 'name' ) . ' : '. get_bloginfo( 'description' ); ?></title>	
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="<?php echo get_template_directory_uri() . '/js/bootstrap.min.js' ?>"></script>
		<script src="<?php echo get_template_directory_uri() . '/js/owl.carousel.min.js' ?>"></script>
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153230001-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153230001-1');
</script>
		
		
	</head>
	
	<body <?php body_class(); ?>>

		<!--Header-->
	
		<header class="site-header">
			<div class="container">
				<div class="row justify-lg-content-center align-items-center">
					<div class="col-2 col-lg-5">
						<div class="menu-container">
							<div class="menu-toggle mb-4 d-lg-none">
								<a href="#" class="mobile-menu-toggle"><i class="fas fa-times"></i></a>
							</div>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'main-menu' )); ?>
						</div>
						<div class="menu-toggle d-lg-none">
							<a href="#" class="mobile-menu-toggle"><i class="fas fa-bars"></i></a>
						</div>
					</div>
					<div class="col-4 col-lg-2 text-lg-center logo-container">
						<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
						?>
						<a class="logo" href="<?php bloginfo('url');?>"><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('title');?>"/></a>
					</div>
					<div class="col-6 col-lg-5 d-flex justify-content-end align-items-center">
						<ul class="header-social d-none d-lg-block">
							<li><a href="https://www.facebook.com/myhoophome/" target="blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://www.instagram.com/myhoophome/" target="blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/channel/UCIzwmPxsnFA3f9mvU2JvN6Q/" target="blank"><i class="fab fa-youtube"></i></a></li>
							<li><a href="https://twitter.com/hoophome_" target="blank"><i class="fab fa-twitter"></i></a></li>
						</ul>
						<?php echo theme_menu_cart(); ?>
						<div class="shop-now">
							<?php if( is_user_logged_in() ){ ?>
								<a href="<?php home_url(); ?>/my-account/">My Account</a>
							<?php }else{ ?>
								<a href="<?php home_url(); ?>/my-account/">Sign In</a>
						 	<?php } ?>
						</div>
					</div>
				</div>	
			</div>
		</header>

		<!--Main Content-->
		
		<main id="main">
		</main>
		
		<!--Footer-->
		
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-3 text-center text-md-left col-lg-2 mb-4">
						<h4>Support</h4>
						<div class="footer-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'footer--menu' )); ?>
						</div>
					</div>
					<div class="col-12 col-md-3 text-center text-md-left col-lg-2 mb-4">
						<h4>Product</h4>
						<div class="footer-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'third', 'container' => false, 'menu_class' => 'footer--menu' )); ?>
						</div>
					</div>
					<div class="col-12 col-md-3 text-center text-md-left col-lg-2 mb-4">
						<h4>About</h4>
						<div class="footer-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'fourth', 'container' => false, 'menu_class' => 'footer--menu' )); ?>
						</div>
					</div>
				
					<div class="col-12 col-md-3 col-lg-6 mb-4 text-center text-md-right footer-shop-btn">
						<a href="/product/hoop-cam/" class="site-btn btn-gray">Shop Now</a>
					</div>
				</div>

				<div class="row my-4 footer-form d-block d-md-none ">
					<div class="col-12 text-center">
					<!--	<div class="bbp-search-form">
							<form role="search" method="get" id="bbp-search-form" action="https://hoopcamera.com/staging/forums/search/">
								<div class="input-group community-search">
									<input type="hidden" name="action" value="bbp-search-request">
									<input class="form-control" tabindex="101" placeholder="Search Hoop Community" type="text" value="" name="bbp_search" id="bbp_search">
									<div class="input-group-append">
										<button tabindex="102" class="btn seacrh-btn" type="submit" id="bbp_search_submit" value="Search">Subscribe</button>
									</div>
								</div>
							</form>				
						</div>-->
					</div>
				</div>
			
				<div class="row mt-5 align-items-end">
					<div class="col-12 col-md-4 mb-4 text-center text-md-left order-2 order-md-1">
						<div class="footer-menu-policy">
							<?php wp_nav_menu( array( 'theme_location' => 'fifth', 'container' => false, 'menu_class' => 'footer--menu menu-policy' )); ?>
						</div>
					</div>
					<div class="col-12 col-md-4 text-center mb-4 order-3 order-md-2">
						<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
						?>
						<a class="logo mb-4" href="<?php bloginfo('url');?>"><img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('title');?>"/></a>
						<p class="mb-0">© All Rights Reserved 2019 - C&A Marketing, Inc.<br>*AI face recognition features are not available for Hoop cameras used in Illinois.</p>
					</div>
					<div class="col-12 col-md-4 text-center text-md-right mb-4 order-1 order-md-3">
						<ul class="header-social">
							<li><a href="https://www.facebook.com/myhoophome/" target="blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://www.instagram.com/myhoophome/" target="blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/channel/UCIzwmPxsnFA3f9mvU2JvN6Q/" target="blank"><i class="fab fa-youtube"></i></a></li>
							<li><a href="https://twitter.com/hoophome_" target="blank"><i class="fab fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
<script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".ctu-ulimate-style-1 li:first").addClass("active");
            jQuery(".ctu-ultimate-style-1-content div:first").addClass("active");
            jQuery(".ctu-ulitate-style-1-tabs:first").slideDown("slow").delay(2000);
            jQuery(".ctu-ulimate-style-1 li").click(function () {
                if (jQuery(this).hasClass('active')) {
                    return false;
                } else {
                    jQuery(".ctu-ulimate-style-1 li").removeClass("active");
                    jQuery(this).toggleClass("active");
                    jQuery(".ctu-ulitate-style-1-tabs").slideUp("slow").delay(2000);
                    var activeTab = jQuery(this).attr("ref");
                    jQuery(activeTab).slideDown("slow").delay(2000);
                }
            });
        });
</script>
		<!--Warn Old Browsers To Quit Being Old-->
		
		<script>var $buoop = {c:2};function $buo_f(){var e = document.createElement("script");e.src = "//browser-update.org/update.min.js";document.body.appendChild(e);};try {document.addEventListener("DOMContentLoaded", $buo_f,false)}catch(e){window.attachEvent("onload", $buo_f)}</script> 
		
		<?php wp_footer(); ?>
    
    <?php if( is_page_template( 'page-templates/page-membership.php' ) ){ ?>
    
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/custom.css' ?>" >

<?php } ?>

	</body>
</html>
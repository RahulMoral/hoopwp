<?php

add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// ******************* Sidebars ****************** //

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Community Sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));
}

// ******************* Add Custom Menus ****************** //

add_theme_support( 'menus' );

// ******************* Add Post Thumbnails ****************** //

add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 50, 50, true );
add_image_size( 'xlarge', 1200, 1200);
add_image_size( '50x50', 50, 50, array( 'center', 'center' ) ); // img mini cart

// ******************* ACF Options Page ****************** //

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// ******************* Add SVG Upload Support ****************** //

function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );

add_filter( 'wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4 );  /* the hook */

 function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon) {
    if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
        if(is_array($size)) {
            $image[1] = $size[0];
            $image[2] = $size[1];
        } elseif(($xml = simplexml_load_file($image[0])) !== false) {
            $attr = $xml->attributes();
            $viewbox = explode(' ', $attr->viewBox);
            $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
            $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
        } else {
            $image[1] = $image[2] = null;
        }
    }
    return $image;
} 

// ******************* Remove Admin Bar ****************** //

//add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	 show_admin_bar(false);
}

// ******************* Include Files ****************** //
require get_template_directory().'/includes/enqueue.php';
require get_template_directory().'/includes/theme-support.php';

function clean_commerce_child_custom_woo_fix() {

	//add_filter( 'woocommerce_show_page_title', '__return_true', 1 );
	//add_filter( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 6 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
   //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
}

 add_action( 'init', 'clean_commerce_child_custom_woo_fix' );
 
 add_action( 'woocommerce_single_product_summary', function(){
     echo '<div class="product-content">'.get_the_content().'</div>';
 }, 6 );

add_filter( 'bbp_no_breadcrumb', '__return_true' );
function enqueue() {
        wp_enqueue_script('slick-product-slider-main-js', get_template_directory_uri() . '/js/slick.min.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'enqueue' );


function support_cat_featured($args){
		global $wpdb;
		$termtaxonomyqur="SELECT term_taxonomy_id,term_id FROM `3ec_term_taxonomy` WHERE taxonomy ='support_cat' ORDER BY `term_id` ASC";
		$termtaxonomy = $wpdb->get_results($termtaxonomyqur, OBJECT);  
      
		$content = '';
     
		$content .= '<div class="ctu-ultimate-wrapper-1"><ul class="ctu-ulimate-style-1">';
		$i = 1;	    
         foreach($termtaxonomy as $termtaxonomy1)
		 {
			   //get category name
				$wptemsqur="SELECT `name` FROM `3ec_terms` WHERE `term_id`=".$termtaxonomy1->term_id;
				$wptems = $wpdb->get_results($wptemsqur, OBJECT);				
                $content .= '<li ref="#ctu-ulitate-style-1-id-'.$i++.'" class="couse-mem">';
                $content .= '<h4>'.$wptems['0']->name.'</h4>';
				$content .= '</li>';
		 }            
			   $content .= '</ul>';
			   $content .= '<div class="ctu-ultimate-style-1-content">'; 
		$j=1;	   
		 foreach($termtaxonomy as $termtaxonomy1)
		 {
			 //get all the post ids of current category
			$termsrelqur="SELECT `object_id` FROM `3ec_term_relationships` WHERE `term_taxonomy_id`=".$termtaxonomy1->term_taxonomy_id;
			$termsrel = $wpdb->get_results($termsrelqur, OBJECT);	
			$content .= '<div class="ctu-ulitate-style-1-tabs " id="ctu-ulitate-style-1-id-'.$j++.'">';
			$content .= '<div class="row">';
			//$content .= '<div class="inner-sap-sec">';		
			foreach($termsrel as $termsrel1)
			{
			   //get post id	
				$postid= $termsrel1->object_id;
				$content_post_obj = get_post($postid);	
				//print_r($content_post_obj);
				$content_post = $content_post_obj->post_content;
				$trimmed_content = wp_trim_words( $content_post, 20);
				$content_post_name = $content_post_obj->post_name;
				$content_post_title = $content_post_obj->post_title;	 
				$content .= '<div class="main_sec_featured_support">';
               
                $content .= '<div class="description">';				
				$content .= '<h2 class="title">'.$content_post_title.'</h2>';	
                $content .= '<div class="con">'.$trimmed_content.'</div>';	
                $content .= '<div class="knowmore"><a href="'.site_url().'/support_article/'.$content_post_name.'" class="link green-link">Read Article<span class="ico-wrap"><span class="icon-arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></span></a></div>';
			    $content .= ' </div>';
				$content .= ' </div>';
			}
			//$content .= ' </div>';
            $content .= '</div>';
            $content .= '</div>';
		}
                 $content .= '</div></div>';
             return $content;
    }
 add_shortcode('supportfeaturedcat','support_cat_featured');
 
 // Discourse avatar
 add_filter( 'wpdc_sso_avatar_url', function($avatar_url, $user_id) {
	 $avatar = get_user_meta($user_id, 'user_registration_profile_pic_url', true);
	 if($avatar) {
		 return $avatar;
	 }
	 
	 return $avatar_url;
}, 10, 2);
 
 // Discourse params
 add_filter( 'wpdc_sso_params', function($params, $user) {
	$params['name'] = $user->nickname;
     
    return $params;
 }, 10, 2);
 
 // Discourse user_registration_save_profile_details 
  add_action( 'user_registration_save_profile_details', function($user_id) {
    $user = get_user_by( 'ID', $user_id );
    $sso_params = \WPDiscourse\Utilities\Utilities::get_sso_params( $user );
    \WPDiscourse\Utilities\Utilities::sync_sso_record( $sso_params );
 });
 
 // theme_menu_cart
function theme_menu_cart() {
	$out = '<div class="woocommerce menu-cart-holder"><div class="menu-cart"><i class="fa fa-cart-arrow-down"></i><span>'.WC()->cart->cart_contents_count.'</span></div><div class="mini-cart">';
	ob_start();
	woocommerce_mini_cart();
	$out .= ob_get_clean();
	$out .= '</div></div>';
	return $out;
}
// woocommerce_add_to_cart_fragments
add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {
	$fragments['.site-header .menu-cart-holder'] = theme_menu_cart();
	return $fragments;
});

/* Remove Categories from Single Products */ 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


// Add this to plus and minus button  Foe quantity
function kia_add_script_to_footer(){
    if( ! is_admin() ) { ?>
    <script>
    jQuery(document).ready(function($){
    $('.quantity').on('click', '.plus', function(e) {
        $input = $(this).prev('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $input.val( val + step ).change();
    });
    $('.quantity').on('click', '.minus', 
        function(e) {
        $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 0) {
            $input.val( val - step ).change();
        } 
    });
});
</script>
<?php }
}
add_action( 'wp_footer', 'kia_add_script_to_footer' );

function buy_now_submit_form() {
 ?>
  <script>
      jQuery(document).ready(function(){
          // listen if someone clicks 'Buy Now' button
          jQuery('#buy_now_button').click(function(){
              // set value to 1
              jQuery('#is_buy_now').val('1');
              //submit the form
              jQuery('form.cart').submit();
          });
      });
  </script>
 <?php
}
add_action('woocommerce_after_add_to_cart_form', 'buy_now_submit_form');
add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout($redirect_url) {
  if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
     global $woocommerce;
     $redirect_url = wc_get_checkout_url();
  }
  return $redirect_url;
}


<?php
/****
** Single Product Page For woocommerce
****/
get_header('shop');
?>
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
.price_discrip{font-size: 16px;}
span.swatch.swatch-color {
    opacity: 1; border-color: #fff;
}
span.swatch.swatch-color.selected {
    border-color:#fff !important; 
}
table#single_product_vartion {
    position: relative;
}
section.single-product-content form.variations_form.cart a.reset_variations{position: absolute;
    right: 0;
    top: 10px;}
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
</style>


 <script>


function zoomIn(event) {
  var element = document.getElementById("overlayproudct");
  element.style.display = "inline-block";
  var img = document.getElementById("imgZoom");
  var posX = event.offsetX ? (event.offsetX) : event.pageX - img.offsetLeft;
  var posY = event.offsetY ? (event.offsetY) : event.pageY - img.offsetTop;
  element.style.backgroundPosition=(-posX*2)+"px "+(-posY*4)+"px";

}

function zoomOut() {
  var element = document.getElementById("overlayproudct");
  element.style.display = "none";
}

/*jQuery(document).ready(function(){
  jQuery(".product-gallery-logo-slider-content").click(function() {  
     jQuery(this).addClass('featured_image').parent().parent().parent().siblings().children().children().children().removeClass('featured_image');  
    var images = jQuery('.featured_image img').attr('src');
    jQuery("#imgZoom").attr("src", images);
    jQuery("#overlayproudct").css('background-image', 'url(' + images + ')');
  });
});*/

jQuery(document).on('click', '.product-gallery-logo-slider-content', function(){
	
jQuery(this).addClass('featured_image').parent().parent().parent().siblings().children().children().children().removeClass('featured_image');  
    var images = jQuery('.featured_image img').attr('src');
    jQuery("#imgZoom").attr("src", images);
    jQuery("#overlayproudct").css('background-image', 'url(' + images + ')');

});
  </script>



<?php while ( have_posts() ) : the_post(); ?>
      <?php wc_get_template_part( 'content', 'product-image' ); ?>
    <?php endwhile; // end of the loop. ?>


<section class="single-product-content">
	<div class="container">
		    
	  <?php do_action( 'woocommerce_before_single_product' );?>
		
	</div>
		<div class="container">
		    <div class="row">
		      
<?php while ( have_posts() ) : the_post(); ?>
    <div class="col-lg-5 single_product_featured">
       <!-- <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
             $thumbnail_id = get_post_thumbnail_id( $loop->post->ID  );
             $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
       ?>
         <img id="imgZoom" onmousemove="zoomIn(event)" onmouseout="zoomOut()" src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" alt="<?php echo $alt;?>" >
         <div id="overlayproudct" onmousemove="zoomIn(event)"  style="background-image:url('<?php  echo $image[0]; ?>')";></div>
         <?php
            global $product; 
            $attachment_ids = $product->get_gallery_attachment_ids();
          ?> -->


          <?php 
          $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
print_r($post_thumbnail_id);
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
  'woocommerce-product-gallery',
  'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
  'woocommerce-product-gallery--columns-' . absint( $columns ),
  'images',
) );
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
  <figure class="woocommerce-product-gallery__wrapper">
    <?php
    if ( $product->get_image_id() ) {
      $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
    } else {
      $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
      $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
      $html .= '</div>';
    }

    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

    do_action( 'woocommerce_product_thumbnails' );
    ?>
  </figure>
</div>


              <section class="produt-gallery">
                <div class="owl-carousel owl-theme prodcut_slick_slider">
                                        <?php
                                            foreach( array_slice( $attachment_ids, 0,10 ) as $attachment_id ) {
                                              echo '<div class="item"><div class="product-gallery-box text-center">';
                                              echo '<div class="product-gallery-logo-slider-content">';
                                                $thumbnail_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
                                                $alttxt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );

                                        echo '<img class="thumb" src="' . $thumbnail_url . '" alt="'.$alttxt.'" >';
                                                echo '</div>';
                                                echo '</div></div>';
                                            }
                                          ?>
                                     
                                      
                                    
                                
                              </div>
                           
                        </section> 


    </div>

    <div class="col-lg-7 single_product-descitpion">


            <h2><?php echo get_the_title();?></h2>

            <?php echo get_the_content();?>
 <div class="pro_price">
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>"><?php echo $product->get_price_html(); ?></p>
<p class="price_discrip">Free shipping in the US. Orders placed before 2pm Pacific Mon-Fri will be shipping same day.</p>

 </div>
            
            <div class="attribute_product-single">
                <?php
               global $product;
                if( $product->is_type( 'variable' )) {
                 $attribute_keys = array_keys( $product->get_variation_attributes() );
            ?>
                <form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $product->get_available_variations() ) ) ?>">
    <?php do_action( 'woocommerce_before_variations_form' ); ?>
  
    <?php if ( empty( $product->get_available_variations() ) && false !== $product->get_available_variations() ) : ?>
      <p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
    <?php else : ?>
      <table id="single_product_vartion" class="variations" cellspacing="0">
        <tbody>
          <?php foreach ( $product->get_variation_attributes() as $attribute_name => $options ) : //print_r($options);?>
            <tr>
              <td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
              <td class="value">
                <?php
                  $selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );
                  wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
                  echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . __( 'Clear', 'woocommerce' ) . '</a>' ) : '';
                ?>
              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
   
      <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
  
      <div class="single_variation_wrap">
        <?php
          /**
           * woocommerce_before_single_variation Hook.
           */
          do_action( 'woocommerce_before_single_variation' );
  
          /**
           * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
           * @since 2.4.0
           * @hooked woocommerce_single_variation - 10 Empty div for variation data.
           * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
           */
          do_action( 'woocommerce_single_variation' );
  
          /**
           * woocommerce_after_single_variation Hook.
           */
          do_action( 'woocommerce_after_single_variation' );
        ?>
      </div>
  
      <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
    <?php endif; ?>
  
    <?php do_action( 'woocommerce_after_variations_form' ); ?>
  </form>
          <?php } ?>
            </div><!--end prodcut attribute div-->
    </div><!--end main content div right side-->
          
    
    <?php endwhile; // end of the loop. ?>
    </div><!--row end-->
    
  <!--   <div class="row single_extra_featured">
        <div class="col-lg-6">
          <h3>Integrated Features</h3>
          <p><?php echo get_the_excerpt();?></p>
        </div>
        <div class="col-lg-6">
          <h3>Features + Specifications</h3>
          <?php 
            /******* get the product attaributes in single page code ******/
            global $product;
            echo wc_display_product_attributes( $product );
            /******* get the product attaributes in single page code ******/
          ?>
        </div>

    </div>row end-->
    
  </div><!--container end-->
</section><!--section end-->

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



<section>
  <div class="container">
    <h3 class="text-center mb-5"> What's In The Box?</h3>
    <div class="row mt-5">
      <div class="col-md-2 col-6 text-center">
        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/cam_icon.png">
        <p>Hoop Cam Pan V1</p>

      </div>

      <div class="col-md-2 col-6 text-center">
        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/cam_icon.png">
        <p>Quick Start Guide</p>

      </div>

      <div class="col-md-2 col-6 text-center">
        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/cam_icon.png">
        <p>6′ USB cable</p>

      </div>

      <div class="col-md-2 col-6 text-center">
        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/cam_icon.png">
        <p>Power adapter</p>

      </div>

      <div class="col-md-2 col-6 text-center">
        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/cam_icon.png">
        <p>Wall plate</p>

      </div>

      <div class="col-md-2 col-6 text-center">
        <img class="cam_icon" src="https://myhoophome.com/wp-content/uploads/2019/11/cam_icon.png">
        <p>Mounting tape</p>

      </div>
    </div>
  </div>
</section>


<section class="py-5">
  <div class="container mt-5">
    <h3 class="text-center mb-5"> Sepcifications </h3>
    <div class="row mt-5">
      <div class="col-md-4">
        <img class="pro_dimension_img" src="https://myhoophome.com/wp-content/uploads/2019/11/pro_dimen.jpg">
      </div>

       <div class="col-md-4 sepc_mid">
        <h5 class="mb-3">Technical Specifications</h5>
        <p>Up to 1080p full HD video </p>
<p> Wi-Fi 2.4 and 5 GHz compatible </p>
<p> 180-degree expansive field-of-view glass lens </p>
<p> Auto night vision up to 15 ft </p>
<p> Digital zoom </p>
<p> Built-in speaker and mic for two-way talk </p>
<p> Motion detection and field-of-view may vary depending on accessory used </p>
<p> Fully encrypted with TLS / AES / HTTPS </p>
<p> Adjustable pan and tilt </p>
<p> Multiple camera support </p>
<p> Mobile app and web browser access</p>
       </div>

         <div class="col-md-4 sepc_mid">
        <h5  class="mb-3">System Requirments</h5>
        <p>High-speed, Wi-Fi Internet connection </p>
<p> 
802.11 a/b/g/n 2.4GHz or 5.0GHz</p>

<h6 class="mt-5">For setup and mobile viewing </h6>
<p> iOS or Android™ device with the following operating systems:</p>
<p> iOS 8.1 or newer with iPhone 4s or newer, iPad mini or newer, iPad 3 or newer, iPod touch (5th generation) or newer </p>
<p>Android 4.4 or newer with Bluetooth® low energy technology</p>
<h6 clas="mt-5">For web browser viewing </h6>
<p>Latest desktop versions of Chrome™, Safari, Firefox® or Edge®</p>
       </div>
   



    </div>
  </div>
</section>


<section class="compatibility">
 <div class="container mt-5">
    <h3 class="text-center mb-5"> Compatibility </h3> 
<div class="row custm_logos pb-5">
  <div class="col-md-2 ml-5">
    <img src="https://myhoophome.com/wp-content/uploads/2019/11/amazone_alexa.jpg">
  </div>
   <div class="col-md-2">
    <img src="https://myhoophome.com/wp-content/uploads/2019/11/google_assis.jpg">
    
  </div>

   <div class="col-md-3">
    <p class="down_hoop">Download the Hoop app <br>
Available for iPhone and Android</p>
    
  </div>


  <div class="col-md-2">
    <img class="ios_app" src="https://myhoophome.com/wp-content/uploads/2019/11/app-store.png">
    
  </div>


  <div class="col-md-2">
    <img class="google_app" src="https://myhoophome.com/wp-content/uploads/2019/11/google-store.png">
    
  </div>


</div>


<div class="col-md-12 text-center my-5">
  <p>Not sure what’s right for you?</p>
  <a class="talk_us" href="">Talk to us </a>

  
</div>



 </div> 
</section>


<?php get_footer('shop');?>
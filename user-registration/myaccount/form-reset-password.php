<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion UserRegistration will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.wpeverest.com/user-registration/template-structure/
 * @author  WPEverest
 * @package UserRegistration/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//$rp = explode( ':', wp_unslash( $_COOKIE[ 'wp-resetpass-' . COOKIEHASH ] ), 2 );

ur_print_notices(); ?>

<div class="ur-frontend-form login" id="ur-frontend-form">
<form method="post" class="user-registration-ResetPassword lost_reset_password lost_reset_password_step2">
		<div class="ur-form-row">
			<div class="ur-form-grid">

                <div class="hoop-password-reset">

				    <div><?php echo apply_filters( 'user_registration_reset_password_message', __( 'Enter a new password below.', 'user-registration' ) ); ?></div>

                    <div class="user-registration-form-row user-registration-form-row--first form-row form-row-first">
                        <label for="password_1"><?php _e( 'New password', 'user-registration' ); ?> <span class="required">*</span></label>
                        <input type="password" class="user-registration-Input user-registration-Input--text input-text" name="password_1" id="password_1" />
                        <span class="description">Must have upper case, lower case, number. Password length greater than 8 digits</span>
                    </div>
                    <div class="user-registration-form-row user-registration-form-row--last form-row form-row-last">
                        <label for="password_2"><?php _e( 'Re-enter new password', 'user-registration' ); ?> <span class="required">*</span></label>
                        <input type="password" class="user-registration-Input user-registration-Input--text input-text" name="password_2" id="password_2" />
                    </div>

                    <input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
                    <input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

                    <div class="clear"></div>

                    <?php do_action( 'user_registration_resetpassword_form' ); ?>

                    <div class="user-registration-form-row form-row hoop-error"></div>

                    <div class="user-registration-form-row form-row">
                        <input type="hidden" name="ur_reset_password_custom" value="true" />
                        <button type="submit" class="user-registration-Button button hoop-submit-reset"><span></span><?php esc_attr_e( 'Save', 'user-registration' ); ?></button>
                    </div>

                    <?php wp_nonce_field( 'reset_password' ); ?>

                </div>
                <div class="hoop-verification-code">
                    <div class="user-registration-form-row user-registration-form-row--first form-row">
                        <label for="verification_code"><?php _e( 'Verification code', 'user-registration' ); ?></label>
                        <input type="text" class="user-registration-Input user-registration-Input--text input-text" name="verification_code" id="verification_code" autocomplete="off"/>
                        <span class="description">Please check your inbox</span>
                    </div>
                    <div class="user-registration-form-row form-row">
                        <button type="submit" class="button hoop-submit-verification"><span></span><?php esc_attr_e( 'Submit', 'user-registration' ); ?></button>
                    </div>
                </div>

			</div>
		</div>
	</form>
</div>

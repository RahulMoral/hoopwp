<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/form-edit-profile.php.
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
	exit;
}

do_action( 'user_registration_before_edit_profile_form' ); ?>

<div class="ur-frontend-form login" id="ur-frontend-form">
	<form class="user-registration-EditProfileForm edit-profile" action="" method="post" enctype="multipart/form-data">
		<div class="ur-form-row">
			<div class="ur-form-grid">
				<div class="user-registration-profile-fields">
					<h2><?php _e( 'Profile Detail', 'user-registration' ); ?></h2>
					<div class="user-registration-profile-header align-items-start align-items-lg-center">
						<div class="user-registration-img-container">
							<?php
							$gravatar_image      = get_avatar_url( get_current_user_id(), $args = null );
							$profile_picture_url = get_user_meta( get_current_user_id(), 'user_registration_profile_pic_url', true );
							$image               = ( ! empty( $profile_picture_url ) ) ? $profile_picture_url : $gravatar_image;
							?>
							<img class="profile-preview" alt="profile-picture" src="<?php echo $image; ?>" />
							<?php
								$max_size = wp_max_upload_size();
								$max_size = size_format( $max_size );
							?>
							
						</div>
						<header class="align-items-stretch">
							<!-- <p><strong><?php _e( 'Upload your new profile image.', 'user-registration' ); ?></strong></p> -->
							<div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-between">
								<div class="d-flex flex-column align-items-start">
									<?php
									if ( $current_user->first_name && $current_user->last_name ) {
										$name = $current_user->first_name . ' ' . $current_user->last_name;
									} elseif ( $current_user->first_name ) {
										$name = $current_user->first_name;
									} elseif ( $current_user->last_name ) {
										$name = $current_user->last_name;
									} else {
										$name = $current_user->display_name;
									}
									$first_name = ucfirst( get_user_meta( get_current_user_id(), 'first_name', true ) );
									$last_name  = ucfirst( get_user_meta( get_current_user_id(), 'last_name', true ) );
									$full_name  = $first_name . ' ' . $last_name;
									if ( empty( $first_name ) && empty( $last_name ) ) {
										$full_name = $current_user->display_name;
									}
									?>
									<h3>
										<?php
										printf(
											__( '%1$s', 'user-registration' ),
											esc_html( $full_name )
										);
										?>
									</h3>
									<span class="user-registration-nick-name">
										<?php
										 //$email = ucfirst(get_user_data(get_current_user_id(), 'user_email', true));
										printf(
											__( '@%1$s', 'user-registration' ),
											esc_html( $current_user->display_name )
										);
										?>
									</span>
								</div>
								<div class="button-group d-flex flex-row justify-content-end">
									<input type="hidden" name="profile-pic-url" value="<?php echo $profile_picture_url; ?>" />
									<input type="hidden" name="profile-default-image" value="<?php echo $gravatar_image; ?>" />
									<button class="button profile-pic-remove" style="<?php echo ( $gravatar_image === $image ) ? 'display:none;' : ''; ?>"><?php echo __( 'Remove', 'user-registration' ); ?></php></button>
									<label for="ur-profile-pic" class="profile-pic-upload-button" style="<?php echo ( $gravatar_image !== $image ) ? 'display:none;' : ''; ?>">
										<input type="file" id="ur-profile-pic" name="profile-pic" class="profile-pic-upload" accept="image/jpeg" />
										<span><?php _e('Change Image', 'user-registration') ?></span>
									</label>
								</div>
							</div>
						</header>
					</div>
					<div class="user-registration-tips-group d-flex align-items-start flex-column flex-lg-row-reverse justify-content-between">
						<p class="user-registration-tips"><?php echo __( 'Max size: ', 'user-registration' ) . $max_size; ?></p>
						<?php if ( ! $profile_picture_url ) { ?>
							<span><?php echo __( 'You can change your profile picture on', 'user-registration' ); ?> <a href="https://en.gravatar.com/"><?php _e( 'Gravatar', 'user-registration' ); ?></a></span>
						<?php } ?>
					</div>
						
					<?php do_action( 'user_registration_edit_profile_form_start' ); ?>
					<div class="user-registration-profile-fields__field-wrapper">
						<?php foreach ( $form_data_array as $data ) { ?>
							<div class='ur-form-row'>
							<?php
							$width = floor( 100 / count( $data ) ) - count( $data );

							foreach ( $data as $grid_key => $grid_data ) {
								$found_field = false;

								foreach ( $grid_data as $grid_data_key => $single_item ) {
									$key = 'user_registration_' . $single_item->general_setting->field_name;
									if ( isset( $single_item->field_key ) && isset( $profile[ $key ] ) ) {
										$found_field = true;
									}
								}
								if ( $found_field ) {
									?>
									<div class="ur-form-grid ur-grid-<?php echo( $grid_key + 1 ); ?>" style="width:<?php echo $width; ?>%;">

                                        <div class="hoop-changed-email-verify"<?php if(UR()->session->get( 'verification_invalid', false )) echo ' style="display: block;"'; ?>>
                                            <div class="ur-field-item">
                                                <div class="form-row validate-required">
                                                    <label class="ur-label">Verification code</label>
                                                    <input type="text" class="input-text" name="verification_code" placeholder="" autocomplete="off">
                                                    <span class="description">Please check your inbox</span>
                                                </div>
                                                <div class="hoop-verification-submit">
                                                    <button type="submit" class="button hoop-submit-verification"><span></span><?php esc_attr_e( 'Submit', 'user-registration' ); ?></button>
                                                </div>
                                            </div>
                                        </div>

									<?php
								}

								foreach ( $grid_data as $grid_data_key => $single_item ) {
									$key = 'user_registration_' . $single_item->general_setting->field_name;
									if($single_item->general_setting->field_name == 'user_pass' || $single_item->general_setting->field_name == 'user_confirm_password') {
									    continue;
                                    }
									if ( isset( $profile[ $key ] ) ) {
										$field = $profile[ $key ];
										?>
										<div class="ur-field-item field-<?php echo $single_item->field_key; ?>">
											<?php
											$readonly_fields = ur_readonly_profile_details_fields();
											if ( array_key_exists( $field['field_key'], $readonly_fields ) ) {
												$field['custom_attributes'] = array(
													'readonly' => 'readonly',
												);
												if ( isset( $readonly_fields[ $field['field_key'] ] ['value'] ) ) {
													$field['value'] = $readonly_fields[ $field['field_key'] ] ['value'];
												}
												if ( isset( $readonly_fields[ $field['field_key'] ] ['message'] ) ) {
													$field['custom_attributes']['title'] = $readonly_fields[ $field['field_key'] ] ['message'];
													$field['input_class'][]              = 'user-registration-help-tip';
												}
											}

											$filter_data = array(
												'form_data' => $field,
											);

											$form_data_array = apply_filters( 'user_registration_' . $field['field_key'] . '_frontend_form_data', $filter_data );
											$field           = isset( $form_data_array['form_data'] ) ? $form_data_array['form_data'] : $field;

											user_registration_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? ur_clean( $_POST[ $key ] ) : $field['value'] );
											?>
										</div>
									<?php } ?>
								<?php } ?>
                                <div class="ur-field-item">
                                    <div class="form-row">
                                        <label class="ur-label">Repeat Your Password <abbr class="required" title="required">*</abbr></label>
                                        <input type="password" class="input-text input-password " name="hoop_password">
                                    </div>
                                </div>

								<?php if ( $found_field ) { ?>
									</div>
								<?php } ?>
							<?php } ?>
							</div>
						<?php } ?>

					</div>
					<?php do_action( 'user_registration_edit_profile_form' ); ?>
                    <p class="user-registration-form-row form-row hoop-error">

                    </p>
					<p>
						<?php wp_nonce_field( 'save_profile_details' ); ?>
						<button type="submit" class="user-registration-Button button hoop-submit" name="save_account_details"><span></span><?php esc_attr_e( 'Save changes', 'user-registration' ); ?></button>
						<input type="hidden" name="action" value="save_profile_details" />
					</p>
				</div>
			</div>

		</div>
	</form>
</div>

<?php do_action( 'user_registration_after_edit_profile_form' ); ?>

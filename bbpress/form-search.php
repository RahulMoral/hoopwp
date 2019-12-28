<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form role="search" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">
	<div class="input-group community-search">
		<input type="hidden" name="action" value="bbp-search-request" />
		<input class="form-control" tabindex="<?php bbp_tab_index(); ?>" placeholder="Search Hoop Community" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" />
		<div class="input-group-append">
			<button tabindex="<?php bbp_tab_index(); ?>" class="btn seacrh-btn" type="submit" id="bbp_search_submit" value="<?php esc_attr_e( 'Search', 'bbpress' ); ?>" ><i class="fas fa-search"></i></button>
		</div>
	</div>
</form>
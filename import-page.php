<?php /* Template Name: Import page */

/*$rows = file( dirname(__FILE__) . '/users.csv' );
//echo '<pre>';print_r( $rows );echo '</pre>';

$user_role = ! in_array( ur_get_form_setting_by_key( Hoop_WP_User_Register::USR_REG_FORM_ID, 'user_registration_form_setting_default_user_role' ), array_keys( ur_get_default_admin_roles() ) ) ? 'subscriber' : ur_get_form_setting_by_key( Hoop_WP_User_Register::USR_REG_FORM_ID, 'user_registration_form_setting_default_user_role' );

$imported = 0;
foreach($rows as $row) {
	$fields = explode(',',$row);
	$userdata = array(
			'user_login' => $fields[0],
			'user_email' => $fields[0],
			'first_name' => $fields[2],
			'last_name' => $fields[1],
			'user_registered' => $fields[3],
			'role' => $user_role,
	);
	
	//echo '<pre>';print_r( $userdata );echo '</pre>';

	$user_id = wp_insert_user( $userdata );

	if ( is_wp_error( $user_id ) ) {
			echo '_' . $fields[0] . ': ' . $user_id->get_error_message() . '_';
	} else {
			// Insert user data in usermeta table.
			$userdata['nickname'] = get_user_meta( $user_id, 'nickname', true );
			Hoop_WP_User_Register::update_user_meta( $user_id, $userdata, Hoop_WP_User_Register::USR_REG_FORM_ID );

			// App user ID
			update_user_meta( $user_id, 'hoop_user_id', $fields[4] );

			$imported++;
	}
}
echo 'Imported: ' . $imported;*/

/*$user = get_user_by('email', 'dantelwhitesr@outlook.com');
echo $user->ID;
update_user_meta( $user->ID, 'hoop_user_id', 'c9f83fc109781633dccb7386eb1782c1' );*/

/*$not_registered = array();
$user_query = new WP_User_Query(
    array(
        'meta_query'=> array(
            'relation' => 'OR',
            array(
                'key'=> 'hoop_user_id',
                'compare' => 'NOT EXISTS'
            ),
            array(
                'key'=> 'hoop_user_id',
                'value' => '',
            )
        )
    )
);
$users_arr = $user_query->get_results();
if( $users_arr && count($users_arr) ) {
    foreach($users_arr as $user) {
        $not_registered[$user->ID]['user_login'] = $user->user_login;
        $not_registered[$user->ID]['user_email'] = $user->user_email;
        $not_registered[$user->ID]['first_name'] = $user->first_name;
        $not_registered[$user->ID]['last_name'] = $user->last_name;
    }
}
wp_send_json($not_registered);*/
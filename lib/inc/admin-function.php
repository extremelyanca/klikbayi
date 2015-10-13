<?php
/*
 * @package KLIKBAYI
 * @category Core
 * @author Jevuska
 * @version 1.0
 */
 
if ( ! defined( 'ABSPATH' ) || ! defined( 'KLIKBAYI_PLUGIN_FILE' ) )
	exit;

add_action( 'admin_init', 'klikbayi_updates' );
add_action( 'load-klikbayi-admin-page', array(
	'KLIKBAYI_Admin',
	'init' 
) );


function klikbayi_updates()
{
	$current_version = get_option( 'klikbayi_version' );

	if ( version_compare( $current_version, '1.0.0', '<' ) ) {
		include( KLIKBAYI_ADMIN_PATH . 'updates/klikbayi-1.0.1.php' );
		update_option( 'klikbayi_version', '1.0.0' );
	}
}

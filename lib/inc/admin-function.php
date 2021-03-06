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
add_filter( 'plugin_action_links', 'klikbayi_plugin_action_links', 10, 5 );
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

function klikbayi_plugin_action_links( $actions, $plugin_file ) 
{
	static $plugin;

	if ( ! isset( $plugin ) )
		$plugin = plugin_basename( KLIKBAYI_PLUGIN_FILE );

	if ( $plugin == $plugin_file )
	{
			$settings  = array( 
				'settings' => '<a href="options-general.php?page=klikbayi-setting-admin">' . __( 'Settings', 'General' ) . '</a>' );
				
			$affiliate_link = array( 'support' => '<a href="' . klikbayi_url( 'url' ) . '/affiliasi.php" target="_blank">Affiliate Login</a>');
		
    			$actions = array_merge( $settings, $actions );
				$actions = array_merge( $affiliate_link, $actions );
			
	}
		
	return $actions;
}

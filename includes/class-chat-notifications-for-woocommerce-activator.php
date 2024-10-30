<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.algaweb.it
 * @since      1.0.0
 *
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/includes
 * @author     algaweb <algaweb@algaweb.it>
 */
class Chat_Notifications_For_Woocommerce_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if( !class_exists( 'WooCommerce' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );
			wp_die( __( 'To use WooApp you need to install and Activate WooCommerce.', 'wafwc' ), 'Plugin dependency check', array( 'back_link' => true ) );
		}
	}

}

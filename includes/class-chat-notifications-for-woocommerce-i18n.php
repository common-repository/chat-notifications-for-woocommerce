<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.algaweb.it
 * @since      1.0.0
 *
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/includes
 * @author     algaweb <algaweb@algaweb.it>
 */
class Chat_Notifications_For_Woocommerce_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'chat-notifications-for-woocommerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

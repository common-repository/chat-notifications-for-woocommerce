<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.algaweb.it
 * @since      1.0.0
 *
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/public
 * @author     algaweb <algaweb@algaweb.it>
 */
class Chat_Notifications_For_Woocommerce_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chat_Notifications_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chat_Notifications_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/chat-notifications-for-woocommerce-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chat_Notifications_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chat_Notifications_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/chat-notifications-for-woocommerce-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * If enabled in plugin settings ( Enable International Phone Prefixes ), gonna change billing_phone and shipping_phone format adding international prefix phone
	 * @param $order_id
	 *
	 * @return void
	 */
	public function wafwc_update_order_meta( $order ) {

		$billing_country = $order->get_billing_country();
		$shipping_country = $order->get_shipping_country();
		$billing_phone = $order->get_billing_phone();
		$shipping_phone = $order->get_shipping_phone();
	
		if( $billing_country && $billing_phone ) {
			$billing_calling_code = WC()->countries->get_country_calling_code( $billing_country );
			$billing_calling_code = is_array( $billing_calling_code ) ? $billing_calling_code[0] : $billing_calling_code;
	
			// Prefix on billing phone
			$new_billing_phone = $billing_calling_code . $billing_phone;
			$order->set_billing_phone( $new_billing_phone );
		}
	
		if( $shipping_country && $shipping_phone ) {
			$shipping_calling_code = WC()->countries->get_country_calling_code( $shipping_country );
			$shipping_calling_code = is_array( $shipping_calling_code ) ? $shipping_calling_code[0] : $shipping_calling_code;
	
			// Prefix on shipping phone
			$new_shipping_phone = $shipping_calling_code . $shipping_phone;
			$order->set_shipping_phone( $new_shipping_phone );
		}
	
		return $order;

	}

}

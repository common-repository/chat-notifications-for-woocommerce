<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.algaweb.it
 * @since      1.0.0
 *
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/admin
 * @author     algaweb <algaweb@algaweb.it>
 */
class Chat_Notifications_For_Woocommerce_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->load_dependencies();

	}


	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/chat-notifications-for-woocommerce-admin.css', array(), $this->version, 'all' );

	}


	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/chat-notifications-for-woocommerce-admin.js', array( 'jquery' ), $this->version, false );

		if( isset($_GET["page"]) && ($_GET["page"] == 'chat-notifications-for-woocommerce-templates')) {
			wp_enqueue_script( $this->plugin_name.'-templates', plugin_dir_url( __FILE__ ) . 'js/chat-notifications-for-woocommerce-admin-templates.js', array( 'jquery' ), $this->version, true );

			// Ajax localize
			wp_localize_script( $this->plugin_name.'-templates', 'wafwc_save_template_config' , array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}

	}


	/**
	 * Add Menu page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_menu_page() {

		add_menu_page( $this->plugin_name, __('Chat Notifications for Woocommerce', 'wafwc'),  'administrator', $this->plugin_name, '', plugin_dir_url( __FILE__ ) .'img/Wafwc_icon.png', 5);
		add_submenu_page($this->plugin_name, 'Dashboard', 'Dashboard', 'administrator', $this->plugin_name, function(){ require_once(plugin_dir_path( __FILE__ ) .'partials/chat-notifications-for-woocommerce-admin-display.php');});
		add_submenu_page($this->plugin_name, 'Templates', 'Templates', 'administrator', $this->plugin_name.'-templates', function(){ require_once(plugin_dir_path( __FILE__ ) .'partials/chat-notifications-for-woocommerce-templates.php');});
		add_submenu_page($this->plugin_name, 'Settings', 'Settings', 'administrator', $this->plugin_name.'-settings', function(){ require_once(plugin_dir_path( __FILE__ ) .'partials/chat-notifications-for-woocommerce-settings.php');});
	}


	/**
	 * Load chats dependencies
	 *
	 * @return void
	 */
	public function load_dependencies() {

		require_once plugin_dir_path( __FILE__  ) . 'whatsapp-inc/class-wafwc-whatsapp-template-message.php';
		require_once plugin_dir_path( __FILE__  ) . 'whatsapp-inc/class-wafwc-whatsapp-template-list.php';
	}


	/**
	 * On Woocommerce status change instantiate a WA template and send it
	 * @param $order_id
	 * @param $old_status
	 * @param $new_status
	 *
	 * @return void
	 */
	public function wafwc_order_status_change( $order_id, $old_status, $new_status ) {

		$order = new WC_Order( $order_id );

		$send_to = get_option('wafwc_send_to');
		$template_name_opt = get_option('wafwc_template_name');
		$template_language_opt = get_option('wafwc_template_language');
		$data_params = get_option('wafwc_data_option');

		if ($order->$send_to) {
			try {

				$customer_phone = $order->$send_to;
				$template_name = $template_name_opt;

//				$template_header_components = new WafwcComponents(
//					'header', [
//						new WafwcParameters('text', '#'.$order_id)
//					]
//				);

				$wooapp_parameters = array();

				foreach ($data_params as $param) {
					if ($param == 'order_status') {
						$wooapp_parameters[] = new WafwcParameters( 'text', wc_get_order_status_name($new_status) );
					}
					elseif ($param == 'order_id') {
						$wooapp_parameters[] = new WafwcParameters( 'text', '#'.$order_id );
					}
					else {
						$wooapp_parameters[] = new WafwcParameters( 'text', $order->$param?: '-' );
					}
				}

				$template_body_components = new WafwcComponents(
					'body',
					$wooapp_parameters
				);

				$template_msg = '';

				if (!empty($wooapp_parameters)) {
					$template = new WafwcTemplate($template_name, new WafwcLanguage($template_language_opt), [ $template_body_components] );
					$template_msg = new WafwcTemplateMessage('whatsapp', $customer_phone, 'template', $template);
				}
				else {
					$template = new WafwcTemplatePlain($template_name, new WafwcLanguage($template_language_opt));
					$template_msg = new WafwcTemplateMessagePlain('whatsapp', $customer_phone, 'template', $template);
				}


				$waPhoneId = get_option('wafwc-wa-phone-id');

				if ($waPhoneId) {
					$url   = "https://graph.facebook.com/v18.0/$waPhoneId/messages";
					$token = get_option( 'wafwc-wa-token' );

					if ( isset( $token ) && $token !== '' ) {
						$response = wp_remote_post( $url, array(
							'body'    => json_encode( $template_msg->expose() ),
							'headers' => array(
								'Authorization' => 'Bearer ' . $token,
								'Content-Type'  => 'application/json'
							),
						) );

					}
				}

			}
			catch (Exception $e) {

			}
		}
	}


	/**
	 * Async call to save a new Whatsapp template
	 *
	 * @return void
	 */
	//	public function wafwc_save_new_template() {
	//		// TODO
	//		die();
	//	}
	

	/**
	 * Async call to save Whatsapp template configuration
	 *
	 * @return void
	 */
	public function wafwc_save_template_config() {

		try {
			$template_name = isset($_POST['template_name']) ? sanitize_text_field($_POST['template_name']) : null;
			$template_language = isset($_POST['template_language']) ? sanitize_text_field($_POST['template_language']) : null;
			$send_to = isset($_POST['send_to']) ? sanitize_text_field($_POST['send_to']) : null;
			$data_options = array();

			if (isset($_POST['data_options'])) {

				foreach ($_POST['data_options'] as $option) {
					$data_options[] = sanitize_text_field( $option );
				}

			}

			update_option('wafwc_data_option', $data_options);

			update_option('wafwc_template_name', $template_name);
			update_option('wafwc_template_language', $template_language);
			update_option('wafwc_send_to', $send_to);

			wp_send_json_success('OK', 200);
		}
		catch (Exception $e) {
			wp_send_json_error($e, 500);
		}

		wp_die();
	}

}

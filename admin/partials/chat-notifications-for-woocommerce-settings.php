<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.algaweb.it
 * @since      1.0.0
 *
 * @package    Woo_App
 * @subpackage Woo_App/admin/partials
 */

if (isset($_POST['wafwc-wa-token'])) {
	$value = sanitize_text_field($_POST['wafwc-wa-token']);
	update_option('wafwc-wa-token', $value);
}

if (isset($_POST['wafwc-wa-id'])) {
	$wid = sanitize_text_field($_POST['wafwc-wa-id']);
	update_option('wafwc-wa-id', $wid);
}

if (isset($_POST['wafwc-wa-phone-id'])) {
	$waPhoneId = sanitize_text_field($_POST['wafwc-wa-phone-id']);
	update_option('wafwc-wa-phone-id', $waPhoneId);
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if( isset( $_POST['wafwc-enable-prefix'] ) ) {
		update_option( 'wafwc-enable-prefix', true );
	} else {
		update_option( 'wafwc-enable-prefix', false );
	}
}
?>


<div class="wafwc-plugin-context">
	<form action="" method="post">

		<div class="wafwc-container">
			<div class="wafwc-heading">
				<img width="150px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../img/Wafwc_logo.jpg'; ?>" alt="">
				<h1>Settings</h1>
			</div>
		</div>

		<div class="wafwc-container">
			<div class="wafwc-heading">
				<h2>Token</h2>
			</div>
			<div class="wafwc-body">
				<?php
				$token = get_option('wafwc-wa-token');
				?>
				<input id="wafwc-wa-token" name="wafwc-wa-token" type="text" value="<?php echo esc_attr($token) ?: ''; ?>" placeholder="<?php _e('Paste your token here.', 'wafwc'); ?>">

			</div>
		</div>

		<div class="wafwc-container">
			<div class="wafwc-heading">
				<h2>WhatsApp Business ID</h2>
			</div>
			<div class="wafwc-body">
				<?php
				$wab_id = get_option('wafwc-wa-id');
				?>
				<input id="wafwc-wa-id" name="wafwc-wa-id" type="text" value="<?php echo esc_attr($wab_id) ?: ''; ?>" placeholder="<?php _e('Paste your Whatsapp Business ID here.', 'wafwc'); ?>">
			</div>
		</div>

		<div class="wafwc-container">
			<div class="wafwc-heading">
				<h2>WhatsApp Phone ID</h2>
			</div>
			<div class="wafwc-body">
				<?php
				$wab_phone_id = get_option('wafwc-wa-phone-id');
				?>
				<input id="wafwc-wa-phone-id" name="wafwc-wa-phone-id" type="text" value="<?php echo esc_attr($wab_phone_id) ?: ''; ?>" placeholder="<?php _e('Paste your Whatsapp Telephone ID here.', 'wafwc'); ?>">
			</div>
		</div>

		<div class="wafwc-container">
			<div class="wafwc-heading">
				<h2><?php _e('Enable International Phone Prefixes for Woocommerce Orders.', 'wafwc'); ?></h2>
			</div>
			<div class="wafwc-body">
				<p><?php _e('For WhatsApp to function properly, it only allows phone numbers to be formatted with international phone prefixes. <b>Chat Notifications for Woocommerce</b> can handle this for you.', 'wafwc'); ?></p>
				<p style="margin-bottom: 24px;"><?php _e('Enabling this option will allow you to store the billing phone and shipping phone of orders in the correct format, based on the user selected billing/shipping country in the Woocommerce checkout.', 'wafwc'); ?></p>

				<label for="wafwc-enable-prefix"><b><?php _e('Enable International Phone Prefixes', 'wafwc'); ?></b></label>
				<input id="wafwc-enable-prefix" name="wafwc-enable-prefix" type="checkbox" <?php echo checked( get_option( 'wafwc-enable-prefix' ), true, true ); ?>>
			</div>
		</div>

		<div class="wafwc-container">
			<div class="wafwc-body">
				<button type="submit" class="button-primary button">
					<?php
					_e('Save all', 'wafwc');
					?>
				</button>
			</div>
		</div>
	</form>

</div>
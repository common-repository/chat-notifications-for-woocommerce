<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.algaweb.it
 * @since      1.0.0
 *
 * @package    Chat_Notifications_For_Woocommerce
 * @subpackage Chat_Notifications_For_Woocommerce/admin/partials
 */
?>

<div class="wafwc-plugin-context">
	<div class="wafwc-container">
		<div class="wafwc-heading">
			<img width="150px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../img/Wafwc_logo.jpg'; ?>" alt="">
			<h1>Chat notification for Woocommerce</h1>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( 'How to get started', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<?php
				_e( 'Before you can use Chat notification for Woocommerce you need to configure the WhatsApp Cloud API through a Meta developer account. <br>
						Below you will find a brief guide to create the app and find its data through the Meta for developers account.', 'wafwc' );
				?>
			</p>
			<p>
				<?php
				_e( '<b>This guide is aimed to users with knowledge of Meta for developers tools.</b>', 'wafwc' );
				?>
			</p>
			<p>
				<?php
				_e( '<b>To find out the costs imposed by the WhatsApp business API platform, consult the dedicated page <a href="https://developers.facebook.com/docs/whatsapp/pricing?locale=en" target="_blank">here.</a></b>', 'wafwc' );
				?>
			</p>
			<p>
				<?php
				_e( '<b>You can also check this <a href="https://developers.facebook.com/docs/whatsapp/cloud-api/phone-numbers" target="_blank">link</a> to find check about telephone numbers.</b>', 'wafwc' );
				?>
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '1. To set WhatsApp Cloud API up, log in or sign up to the <a href="https://developers.facebook.com/" target="_blank">Facebook for Developers account</a> and click on <b>Create App</b>.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-1.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '2.0 Select <b>Other</b> in the use cases window.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-20.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '2.1 Select <b>Business</b> as your app type.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-2.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '3. Provide <b>basic</b> information about your business. You can leave Business Manager account unselected if you don’t have one (see # 5). Click  <b>Create app</b>  to be directed to the Meta dashboard.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-3.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '4. Select WhatsApp and click <b>Set up</b>.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-4.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '5. Accept WhatsApp Cloud API’s terms and conditions. 
You can leave Business Manager account unselected if you don’t have one, like you did in # 3.
Facebook will automatically create a business account later.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-5.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '6. WhatsApp will send a message from a test number to your personal or business WhatsApp number to test if your integration is a success.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-6.JPG'; ?>"
					 alt="">
			</p>
			<p>
				<?php _e('Now you can test Chat notification for Woocommerce plugin with your Temporary access values.', 'wafwc'); ?>
			</p>
			<p>
				<?php _e('Go to Chat notification for Woocommerce Settings and paste the <b>Token</b>, <b>WhatsApp Business ID</b> and the <b>WhatsApp Phone
					ID', 'wafwc'); ?>
			</p>
		</div>
	</div>


	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '7. Connect Your Phone Number. <br> Scroll until Step 5 and click on <b>Add Phone Number</b> to connect a phone number to your WhatsApp Cloud API account.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-7.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '8. Fill in your business information and click Next. Complete all the fields and click Next until you’ll be asked to add the phone number for your WhatsApp Cloud API.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-8.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '9. META will send a 6-digit verification code to verify the phone number you’ve added. Enter the verification code once you receive it.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-9.JPG'; ?>"
					 alt="">
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( '10. Go to Send and receive messages section to see the number you’ve added. Well done.', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-10.JPG'; ?>"
					 alt="">
			</p>

			<p>
				<?php _e( 'Now you can Copy and paste your <b>Token</b>, <b>WhatsApp Business ID</b> and the <b>WhatsApp Phone
					ID</b> into Chat notification for Woocommerce Settings fileds', 'wafwc' );?>
			</p>

		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( 'Create WhatsApp Template Messages', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<img style="width: 100%; max-width: 650px;"
					 src="<?php echo plugin_dir_url( __FILE__ ) . '../img/admin/screen-11.JPG'; ?>"
					 alt="">
			</p>
			<p>
				<?php
				_e( 'You can now create WhatsApp Template messages inside Meta WhatsApp Manager. You can also see all your templates within the Chat notification for Woocommerce templates page.', 'wafwc' );
				?>
			</p>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( 'You have done!', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<?php
				_e( 'Now you can visit <a href="' . get_admin_url() . '/admin.php?page=chat-notifications-for-woocommerce-templates"><b>Chat notification for Woocommerce Templates</b></a> page and choose the template you want to send to your customers.', 'wafwc' );
				?>
			</p>
		</div>
	</div>
</div>

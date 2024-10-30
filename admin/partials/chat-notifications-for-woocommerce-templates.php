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
?>


<div class="wafwc-plugin-context">
	<!-- Popups -->
	<div class="wafwc-alert alert">
		<span class="wafwc-alert-closebtn">&times;</span>
		<strong><?php _e( 'Error!', 'wafwc' ); ?></strong> <span class="wafwc-alert-popup-text"></span>
	</div>

	<div class="wafwc-alert success">
		<span class="wafwc-alert-closebtn">&times;</span>
		<strong><?php _e( 'Success!', 'wafwc' ); ?></strong> <span class="wafwc-success-popup-text"></span>
	</div>
	<!-- --- -->

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<img width="150px;" src="<?php echo plugin_dir_url( __FILE__ ) . '../img/Wafwc_logo.jpg'; ?>" alt="">
			<h1> <?php _e( 'Whatsapp Templates', 'wafwc' ); ?> </h1>
		</div>
	</div>

	<div class="wafwc-container">
		<div class="wafwc-heading">
			<h2>
				<?php
				_e( 'About this section', 'wafwc' );
				?>
			</h2>
		</div>
		<div class="wafwc-body">
			<p>
				<?php
				_e( 'On this page you can <b>select</b> one of the WhatsApp Message Templates you created from your WhatsApp Business account, to have it sent to the Woocommerce order status update.', 'wafwc' );
				?>
			</p>
			<p>
				<?php
				_e( 'Every time you <b>update an Order Status</b>, the WhatsApp template you selected will be sent either to the <b>Order Billing Phone</b> or to <b>Order Shipping phone</b>.', 'wafwc' );
				?>
			</p>
			<p>
				<?php
				_e( '<b>Chat Notifications for Woocommerce</b> will allow you to associate any <b>variable</b> you have created (if any) in the body of the WhatsApp template to a <b>Woocommerce order field</b> of your choice.', 'wafwc' );
				?>
			</p>
			<p>
				<?php
				_e( 'You can also view all the templates you have created and view their status.', 'wafwc' );
				?>
			</p>
		</div>
	</div>

	<?php
	$response = WafwcTemplateMessageList::getWaTemplateList();
	
	// Handling errors
	$response = WafwcTemplateMessageList::getWaTemplateList();
	if(is_wp_error( $response )) {
		echo '<div class="wafwc-container">';
		echo '<p><b>'. $response->get_error_message() . '</b></p>';
		echo '</div></div>';
		return;
	
	}

	if ( ! is_wp_error( $response ) && ( $response['response']['code'] == 200 ) ) {
		$templateListInstance = WafwcTemplateMessageList::fromJson( json_decode( $response['body'] ) );
		?>

		<div class="wafwc-container">
			<div class="wafwc-heading">
				<h2 style="margin-bottom: 5px;"> <?php _e( 'Send Template to your customer', 'wafwc' ); ?> </h2>
			</div>
			<p class="wafwc-info-txt"> <?php _e( 'Select a template to send to your customer when the order change status. You can also choose wich Woocommerce order variable associate with your WhatsApp template variables.', 'wafwc' ); ?> </p>


			<div class="wafwc-row">
				<div class="wafwc-col">
					<div class="wafwc-body">

						<select name="wafwc-select-template" id="wafwc-select-template"
								onchange="wafwcChangeTemplate(jQuery(this));">

							<?php
							$template_name = get_option( 'wafwc_template_name' );

							echo '<option value="null"' . selected( 'null', $template_name ) . '>-</option>';

							foreach ( $templateListInstance->data as $data ) {
								$dataBody = '';
								foreach ( $data->components as $component ) {
									if ( $component->type == 'BODY' ) {
										$dataBody = $component->text;
									}
								}
								echo "<option value='". esc_attr($data->name) ."' data-language='" . esc_attr($data->language) . "' data-body='" . htmlentities( $dataBody, ENT_QUOTES ) . "'" . selected( $data->name, $template_name ) . ">". esc_html($data->name) ."</option>";
							}
							?>
						</select>

						<textarea id="wafwc-template-body-txt" cols="50" rows="5" disabled></textarea>

					</div>
				</div>

				<div class="wafwc-col">
					<div class="wafwc-wc-elements-skeleton" style="display: none;">
						<label><?php _e( 'Variable {{1}}', 'wafwc' ); ?></label>
						<br>
						<select>
							<option value="order_id"><?php _e( 'Order ID', 'wafwc' ); ?></option>
							<option value="order_status"><?php _e( 'Order Status', 'wafwc' ); ?></option>
							<option value="billing_email"><?php _e( 'Billing email', 'wafwc' ); ?></option>
							<option value="billing_first_name"><?php _e( 'Billing first name', 'wafwc' ); ?></option>
							<option value="billing_address_1"><?php _e( 'Billing address', 'wafwc' ); ?></option>
							<option value="billing_phone"><?php _e( 'Billing phone', 'wafwc' ); ?></option>
							<option value="billing_city"><?php _e( 'Billing city', 'wafwc' ); ?></option>
							<option value="shipping_email"><?php _e( 'Shipping email', 'wafwc' ); ?></option>
							<option value="shipping_fullname"><?php _e( 'Shipping fullname', 'wafwc' ); ?></option>
							<option value="shipping_address_1"><?php _e( 'Shipping address', 'wafwc' ); ?></option>
							<option value="shipping_phone"><?php _e( 'Shipping phone', 'wafwc' ); ?></option>
							<option value="shipping_city"><?php _e( 'Shipping city', 'wafwc' ); ?></option>
						</select>
					</div>

					<div id="wafwc-varialbes-container">
						<?php
						$selected_data = get_option( 'wafwc_data_option' );
						if ( $selected_data && ! empty( $selected_data ) ) {
							$i = 1;
							foreach ( $selected_data as $param ) {
								?>
								<div class="" style="">
									<label>Associate {{<?php echo $i; ?>}} to:</label>
									<br>
									<select name="wafwc-template-var_<?php echo $i; ?>" class="wafwc-select-group">
										<option value="order_id" <?php selected( 'order_id', $param ); ?>>Order ID
										</option>
										<option value="order_status" <?php selected( 'order_status', $param ); ?>>Order
											Status
										</option>
										<option value="billing_email" <?php selected( 'billing_email', $param ); ?>>
											Billing email
										</option>
										<option value="billing_first_name" <?php selected( 'billing_first_name', $param ); ?>>
											Billing first name
										</option>
										<option value="billing_address_1" <?php selected( 'billing_address_1', $param ); ?>>
											Billing address
										</option>
										<option value="billing_phone" <?php selected( 'billing_phone', $param ); ?>>
											Billing phone
										</option>
										<option value="billing_city" <?php selected( 'billing_city', $param ); ?>>
											Billing city
										</option>
										<option value="shipping_email" <?php selected( 'shipping_email', $param ); ?>>
											Shipping email
										</option>
										<option value="shipping_fullname" <?php selected( 'shipping_fullname', $param ); ?>>
											Shipping fullname
										</option>
										<option value="shipping_address_1" <?php selected( 'shipping_address_1', $param ); ?>>
											Shipping address
										</option>
										<option value="shipping_phone" <?php selected( 'shipping_phone', $param ); ?>>
											Shipping phone
										</option>
										<option value="shipping_city" <?php selected( 'shipping_city', $param ); ?>>
											Shipping city
										</option>
									</select>
								</div>
								<?php
								$i ++;
							}
						}
						?>


					</div>

				</div>

				<div class="wafwc-col">
					<label><?php _e( 'Send message template to:', 'wafwc' ); ?></label>
					<br>
					<?php
					$send_to = get_option( 'wafwc_send_to' );
					?>
					<select id="wafwc-send-to">
						<option value="billing_phone" <?php selected( 'billing_phone', $send_to ); ?>><?php _e( 'Billing phone', 'wafwc' ); ?></option>
						<option value="shipping_phone" <?php selected( 'shipping_phone', $send_to ); ?>><?php _e( 'Shipping phone', 'wafwc' ); ?></option>
					</select>
				</div>
			</div>

			<div class="wafwc-row">
				<button class="button-primary button"
						onclick="wafwcSaveTemplateConfig();"><?php _e( 'Save', 'wafwc' ); ?></button>
			</div>
		</div>

		<div class="wafwc-container">
			<div class="wafwc-heading">
				<h2> <?php _e( 'Your Templates', 'wafwc' ); ?> </h2>
			</div>

			<div class="wafwc-body">
				<table class="widefat fixed">
					<thead>
					<tr>
						<th><?php _e( 'Template name', 'wafwc' ); ?></th>
						<th><?php _e( 'Language', 'wafwc' ); ?></th>
						<th><?php _e( 'Status', 'wafwc' ); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ( $templateListInstance->data as $data ) {
						echo '<tr>';
						echo '<td>' . esc_html($data->name) . '</td>';
						echo '<td>' . esc_html($data->language) . '</td>';
						echo '<td><b class="wafwc-' . esc_html(strtolower( $data->status )) . '">' . esc_html($data->status) . '</b></td>';
						echo '</tr>';
					}
					?>
					</tbody>
				</table>

			</div>
		</div>
		<?php
	} else {
		$reponseBody = json_decode( $response['body'] );
		if ( $reponseBody->error ) {
			echo '<div class="wafwc-container"><b>' . esc_html($reponseBody->error->message) . '</b></div>';
		}
	}
	?>
</div>
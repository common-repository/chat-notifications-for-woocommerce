=== Chat notifications for Woocommerce ===
Contributors: algaweb
Donate link: https://www.algaweb.it
Tags: woocommerce notifications, whatsapp, woocommerce whatsapp, woocommerce order notifications, whatsapp order notifications
Requires at least: 4.0.1
Tested up to: 6.5.2
Stable tag: 1.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Chat notifications for Woocommerce, allows users to automatically send WhatsApp custom templates to your customers
when an Order status is updated.

== Description ==

Chat Notifications for Woocommerce is an innovative plugin that takes your online store notifications to the next level.
This plugin can significantly enhance the shopping experience for your customers. WhatsApp notifications can improve communication with customers, providing timely updates on order status. This can lead to greater customer satisfaction and potentially an increase in sales.
For online store owners, Chat Notifications for Woocommerce offers an effective way to keep customers informed and build stronger relationships with them. Moreover, using WhatsApp for notifications offers a more direct and personal communication channel compared to traditional emails.

This plugin, primarily aimed at users with technical skills, allows you to send WhatsApp notifications to your customers whenever an order status changes.
It interacts directly with the Meta WhatsApp Cloud API, offering a clear and simple interface to configure WhatsApp notifications. In addition, it allows the administrator to select which template message to send. It’s important to note that the WhatsApp API only allows sending template messages in order to start a conversation.

Another powerful features is the international phone prefixes functionality. By enabling this option, you will be able to automatically format the billing and shipping phone numbers of orders with international prefixes. This is particularly useful as the WhatsApp API only works with phone numbers that include the international prefix. This feature is based on the billing/shipping country selected by the user in the Woocommerce checkout.

If you’re looking for a way to integrate WhatsApp with Woocommerce, Chat Notifications for Woocommerce is the solution for you.

<h3>FEATURES</h3>
- Lists all your WhatsApp business API message templates
- Allow to choose which message template send when a Woocommerce Order change status
- Detects message template body variables (if any)
- Let Admin users to map each template body variables with Woocommerce order field
- Let Admin users to select whether to send the WhatsApp notification to Billing Phone or Shipping Phone

Coming soon:
- Submit new message templates directly from WooApp interface.
- WhatsApp templates variables in template title

== Installation ==

1. Upload `woo-app` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In admin menu just click on WooApp to view plugin pages

== Frequently Asked Questions ==

= Do I need to code to use this plugin? =

You don't need to code to use this plugin. However, you may need to have a knowledge of Meta for developers tools.

= Where can I find the requested Access Token, WhatsApp Business ID and the WhatsApp Phone ID?  =

You need to configure a WhatsApp app through a Meta developer account.
You can find all the required data in the WhatsApp tab of your Meta application.

= How can I stop sending WhatsApp Templates on upgrading order status? =

Just deactivate the plugin

== Screenshots ==

1. How it works
2. Dashboard guide
3. Choose your template
4. Templates list
5. Settings

== Changelog ==

= 1.0.0 =
First release

= 1.0.1 =
Bug fix

= 1.0.2 =
Minor Bug fix display images in dashboard

= 1.0.3 =
Fixed error in Message Templates section

= 1.0.4 =
Resolved bug that prevents selecting templates and causing errors

= 1.0.5 =
Updated dashboard documentation.
Updated Meta WhatsApp endpoint.

= 1.0.6 =
Added new International Phone Prefixes functionality.
Enabling this option will allow you to store the billing phone and shipping phone of orders with International phone prefixes, based on the user selected billing/shipping country in the Woocommerce checkout.
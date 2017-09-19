<?php

// default Elgg events
elgg_register_event_handler('init', 'system', 'contact_init');

/**
 * Called during system init
 *
 * @return void
 */
function contact_init() {
	
	// register page handler for nice URL's
	elgg_register_page_handler('contact', '\ColdTrick\Contact\PageHandler::contact');

	// register actions
	elgg_register_action('contact/send', dirname(__FILE__) . '/actions/send.php', 'public');
	
	// register plugin hooks
	elgg_register_plugin_hook_handler('public_pages', 'walled_garden', '\ColdTrick\Contact\WalledGarden::publicPages');
	elgg_register_plugin_hook_handler('register', 'menu:walled_garden', '\ColdTrick\Contact\WalledGarden::menu');
	elgg_register_plugin_hook_handler('register', 'menu:footer', '\ColdTrick\Contact\FooterMenu::register');
	elgg_register_plugin_hook_handler('actionlist', 'captcha', '\ColdTrick\Contact\Captcha::actionlist');
}

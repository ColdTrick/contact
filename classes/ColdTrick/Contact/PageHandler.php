<?php

namespace ColdTrick\Contact;

/**
 * The page handler for /contact
 *
 * @package    ColdTrick
 * @subpackage Contact
 */
class PageHandler {
	
	/**
	 * The contact page handler
	 *
	 * @param array $page url segments
	 *
	 * @return bool
	 */
	public static function contact($page) {
		
		switch (elgg_extract(0, $page)) {
			case 'thankyou':
				echo elgg_view_resource('contact/thankyou');
				return true;
			default:
				echo elgg_view_resource('contact/contact');
				return true;
		}
	}
}
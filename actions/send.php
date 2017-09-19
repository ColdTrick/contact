<?php

// make sure we keep the content on error
elgg_make_sticky_form('contact_form');

$name = get_input('name');
$email = get_input('email');
$subject = get_input('subject');
$message = get_input('message');
$cc = get_input('cc');

$forward_url = REFERER;
$error = false;

// check required fields
$required_fields = ['name', 'email', 'message'];

foreach ($required_fields as $required_name) {
	if (!get_input($required_name)) {
		return elgg_error_response(elgg_echo('error:missing_data'));
	} elseif (($required_name == 'email') && !is_email_address($email)) {
		return elgg_error_response(elgg_echo('registration:notemail'));
	}
}

$contact_recipient = elgg_get_plugin_setting('recipient', 'contact');
if (!is_email_address($contact_recipient)) {
	return elgg_error_response(elgg_echo('contact:message:invalid_recipient_address'));
}

$mailmessage = elgg_echo('contact:mail:message:prepend') 	. PHP_EOL . PHP_EOL .
				elgg_echo('contact:form:name:label') 		. ': ' . $name . PHP_EOL .
				elgg_echo('contact:form:email:label') 		. ': ' . $email . PHP_EOL .
				elgg_echo('contact:form:message:label') 	. ': ' . $message;

$params = [];
if (!empty($cc)) {
	$params['cc'] = [$email];
}

elgg_send_email($email, $contact_recipient, $subject, $mailmessage, $params);

elgg_clear_sticky_form('contact_form');

$forward_url = REFERER;
if (elgg_get_plugin_setting('thankyou_text', 'contact')) {
	$forward_url = 'contact/thankyou';
}

return elgg_ok_response('', elgg_echo('contact:message:success'), $forward_url);

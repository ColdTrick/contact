<?php

if ($user = elgg_get_logged_in_user_entity()) {
	$name = elgg_get_sticky_value('contact_form', 'name', $user->name);
	$email = elgg_get_sticky_value('contact_form', 'email', $user->email);
} else {
	$name = elgg_get_sticky_value('contact_form', 'name');
	$email = elgg_get_sticky_value('contact_form', 'email');
}

$subject = elgg_get_sticky_value('contact_form', 'subject');
$message = elgg_get_sticky_value('contact_form', 'message');
$cc = elgg_get_sticky_value('contact_form', 'cc');

elgg_clear_sticky_form('contact_form');

$description = elgg_get_plugin_setting('contact_description', 'contact');
if ($description) {
	echo elgg_view('output/longtext', ['value' => $description]);
}

$fields = [
	[
		'#type' => 'text',
		'#label' => elgg_echo('contact:form:name:label'),
		'name' => 'name',
		'value' => $name,
		'required' => true,
	],
	[
		'#type' => 'email',
		'#label' => elgg_echo('contact:form:email:label'),
		'name' => 'email',
		'value' => $email,
		'required' => true,
	],
	[
		'#type' => 'text',
		'#label' => elgg_echo('contact:form:subject:label'),
		'name' => 'subject',
		'value' => $subject,
	],
	[
		'#type' => 'longtext',
		'#label' => elgg_echo('contact:form:message:label'),
		'name' => 'message',
		'value' => $message,
		'required' => true,
	],
	[
		'#type' => 'checkboxes',
		'name' => 'cc',
		'value' => $cc,
		'options' => [elgg_echo('contact:form:cc:label') => 1],
	],
];

echo elgg_view('input/fieldset', ['fields' => $fields]);

echo elgg_view('input/captcha');

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('send'),
]);

elgg_set_form_footer($footer);

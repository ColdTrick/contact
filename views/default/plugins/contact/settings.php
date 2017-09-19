<?php

$plugin = elgg_extract('entity', $vars);

$wg_contact_options = [
	'no' => elgg_echo('option:no'),
	'yes' => elgg_echo('option:yes'),
];

$fields = [
	[
		'#type' => 'text',
		'#label' => elgg_echo("contact:settings:recipient:label"),
		'name' => 'params[recipient]',
		'value' => $plugin->recipient,
	],
	[
		'#type' => 'longtext',
		'#label' => elgg_echo("contact:settings:contact_description:label"),
		'name' => 'params[contact_description]',
		'value' => $plugin->contact_description,
	],
	[
		'#type' => 'longtext',
		'#label' => elgg_echo("contact:settings:contact_sidebar_description:label"),
		'name' => 'params[contact_sidebar_description]',
		'value' => $plugin->contact_sidebar_description,
	],
	[
		'#type' => 'text',
		'#label' => elgg_echo("contact:settings:thankyou_title:label"),
		'name' => 'params[thankyou_title]',
		'value' => $plugin->thankyou_title,
	],
	[
		'#type' => 'longtext',
		'#label' => elgg_echo("contact:settings:thankyou_text:label"),
		'name' => 'params[thankyou_text]',
		'value' => $plugin->thankyou_text,
	],
	[
		'#type' => 'dropdown',
		'#label' => elgg_echo("contact:settings:wg_contact:label"),
		'name' => 'params[wg_contact]',
		'value' => $plugin->wg_contact,
		'options_values' => $wg_contact_options,
	],
];

echo elgg_view('input/fieldset', ['fields' => $fields]);

<?php

// default title
$title_text = elgg_get_plugin_setting('thankyou_title', 'contact') ?: elgg_echo('contact:thankyou:title');

// build page
$page_data = elgg_view_layout('content', [
	'title' => $title_text,
	'content' => elgg_view('contact/thankyou'),
	'sidebar' => elgg_view('contact/sidebar'),
	'filter' => '',
]);

// draw page
echo elgg_view_page($title_text, $page_data);

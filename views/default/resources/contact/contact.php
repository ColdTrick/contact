<?php

$title_text = elgg_echo('contact:title');

// build page
$page_data = elgg_view_layout('content', [
	'title' => $title_text,
	'content' => elgg_view_form('contact/send'),
	'sidebar' => elgg_view('contact/sidebar'),
	'filter' => '',
]);

// draw page
echo elgg_view_page($title_text, $page_data);

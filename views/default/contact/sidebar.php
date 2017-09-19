<?php

$description = elgg_get_plugin_setting('contact_sidebar_description', 'contact');
if (empty($description)) {
	return;
}

echo elgg_view_module('aside', '', elgg_view('output/longtext', ['value' => $description]));

<?php

$thankyou_text = elgg_get_plugin_setting("thankyou_text", "contact");
if ($thankyou_text) {
	echo elgg_view("output/longtext", ["value" => $thankyou_text]);
}

echo "<div class='mtm'>";
echo elgg_view("output/url", [
	"text" => elgg_echo("contact:thankyou:continue"),
	"href" => elgg_get_site_url(),
	"class" => "elgg-button elgg-button-submit",
]);
echo "</div>";
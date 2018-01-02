<?php
/*
Template Name: Menu - Food Menu
*/
get_header();
global $barnelli_menu_type;
$barnelli_menu_type = "foodmenu";

if (YSettings::g("dynamic_foodmenu_menu_type", "1") == "3") {
	get_template_part("content", "dynamic-menu3");
} else if (YSettings::g("dynamic_foodmenu_menu_type", "1") == "2") {
	get_template_part("content", "dynamic-menu2");
} else {
	get_template_part("content", "dynamic-menu1");
}
get_footer();
?>
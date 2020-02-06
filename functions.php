<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } 

// Desactiva la barra de WordPress
//add_filter('show_admin_bar', '__return_false');

function gallo_bottom_admin_bar() {
echo '
<style type="text/css">
div#wpadminbar { top: auto; bottom: 0; position: fixed; }
.ab-sub-wrapper { bottom: 32px; }
html[lang] { margin-top: 0 !important; margin-bottom: 32px !important; }
@media screen and (max-width: 782px){
.ab-sub-wrapper { bottom: 46px; }
html[lang] { margin-bottom: 46px !important; }
}
</style>'; 
}
add_action('wp_head', 'gallo_bottom_admin_bar', 100);


register_nav_menus(
	array(
		'nav-primary' => 'Menú principal',
	)
);

function gallo_custom_menu() {
	$menu_name = 'nav-primary'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list .= "\t\t". '<ul class="navbar-nav mr-auto mt-2 mt-lg-0">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t". '<li class="nav-item"><a class="nav-link" href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t". '</ul>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}

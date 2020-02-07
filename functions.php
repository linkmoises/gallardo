<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } 

//
// Imágenes destacadas
//
add_theme_support( 'post-thumbnails' ); 

//
// Recorta el extracto a n palabras
//
function gallo_excerpt( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'gallo_excerpt', 999 );

//
// Remueve el tag <p> en el extracto
//
remove_filter ('the_excerpt', 'wpautop');

//
// Cambio de posición de barra de WordPress
//
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

//
// Registro de menús
//
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

//
// Función de paginación
// Basado en: https://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
//
function gallo_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo "\t\t\t\t\t" . '<div class="pagination">' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() )
		printf( "\t\t\t\t\t\t" . '<span class="ml-1 mr-1">%s</span>' . "\n", get_previous_posts_link() );

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' active ' : '';

		printf( "\t\t\t\t\t\t" . '<span class="ml-1 mr-1 %s"><a href="%s">%s</a></span>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
		echo "\t\t\t\t\t\t" . '<span class="ml-1 mr-1">…</span>' . "\n";
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' active ' : '';
		printf( "\t\t\t\t\t\t" . '<span class="%s ml-1 mr-1"><a href="%s">%s</a></span>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
		echo "\t\t\t\t\t\t" . '<span class="ml-1 mr-1">…</span>' . "\n";

		$class = $paged == $max ? ' active ' : '';
		printf( "\t\t\t\t\t\t" . '<span class="ml-1 mr-1 %s"><a href="%s">%s</a></span>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() )
		printf( "\t\t\t\t\t\t" . '<span class="ml-1 mr-1">%s</span>' . "\n", get_next_posts_link() );
		echo "\t\t\t\t\t" . '</div>' . "\n";

}

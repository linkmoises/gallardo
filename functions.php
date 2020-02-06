<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } 

// Desactiva la barra de WordPress
//add_filter('show_admin_bar', '__return_false');

function bottom_admin_bar() {
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
add_action('wp_head', 'bottom_admin_bar', 100);


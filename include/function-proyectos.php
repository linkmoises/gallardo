<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); }

/**
 * Registrar Custom Post Type Proyectos
 */
function ms_registrar_cpt_proyectos() {

    $labels = array(
        'name'               => 'Proyectos',
        'singular_name'      => 'Proyecto',
        'menu_name'          => 'Proyectos',
        'add_new'            => 'Añadir nuevo',
        'add_new_item'       => 'Añadir nuevo proyecto',
        'edit_item'          => 'Editar proyecto',
        'new_item'           => 'Nuevo proyecto',
        'search_items'       => 'Buscar proyectos',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => false, // No genera URL pública individual
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title','editor','excerpt','thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('proyecto', $args);
}
add_action('init', 'ms_registrar_cpt_proyectos');

/**
 * Agregar Meta Box para datos del proyecto
 */
function ms_agregar_meta_box_proyecto() {
    add_meta_box(
        'ms_datos_proyecto',
        'Datos del proyecto',
        'ms_render_meta_box_proyecto',
        'proyecto',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ms_agregar_meta_box_proyecto');

/**
 * Renderizar campos del Meta Box
 */
function ms_render_meta_box_proyecto($post) {

    $tipo   = get_post_meta($post->ID, 'tipo_proyecto', true);
    $estado = get_post_meta($post->ID, 'estado_proyecto', true);
    $enlace = get_post_meta($post->ID, 'enlace_externo', true);
    $anio   = get_post_meta($post->ID, 'anio_proyecto', true);

    wp_nonce_field('ms_guardar_datos_proyecto', 'ms_proyecto_nonce');

    ?>
    <p>
        <label><strong>Tipo:</strong></label><br>
        <select name="ms_tipo_proyecto" style="width:100%;">
            <option value="">Seleccionar</option>
            <option value="publicacion" <?php selected($tipo, 'publicacion'); ?>>Publicación</option>
            <option value="investigacion" <?php selected($tipo, 'investigacion'); ?>>Investigación</option>
            <option value="tecnologia" <?php selected($tipo, 'tecnologia'); ?>>Tecnología</option>
        </select>
    </p>

    <p>
        <label><strong>Estado:</strong></label><br>
        <select name="ms_estado_proyecto" style="width:100%;">
            <option value="">Seleccionar</option>
            <option value="en_curso" <?php selected($estado, 'en_curso'); ?>>En curso</option>
            <option value="publicado" <?php selected($estado, 'publicado'); ?>>Publicado</option>
            <option value="en_desarrollo" <?php selected($estado, 'en_desarrollo'); ?>>En desarrollo</option>
        </select>
    </p>

    <p>
        <label><strong>Año:</strong></label><br>
        <select name="ms_anio_proyecto" style="width:100%;">
            <option value="">Seleccionar</option>
            <?php
            $current_year = date('Y');
            for ($year = $current_year; $year >= 2020; $year--) {
                echo '<option value="' . $year . '" ' . selected($anio, $year, false) . '>' . $year . '</option>';
            }
            ?>
        </select>
    </p>

    <p>
        <label><strong>Enlace externo:</strong></label><br>
        <input type="url"
               name="ms_enlace_externo"
               value="<?php echo esc_attr($enlace); ?>"
               placeholder="https://"
               style="width:100%;">
    </p>
    <?php
}

/**
 * Guardar datos del Meta Box
 */
function ms_guardar_datos_proyecto($post_id) {

    if (!isset($_POST['ms_proyecto_nonce'])) return;
    if (!wp_verify_nonce($_POST['ms_proyecto_nonce'], 'ms_guardar_datos_proyecto')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Tipo
    if (isset($_POST['ms_tipo_proyecto'])) {
        update_post_meta($post_id, 'tipo_proyecto', sanitize_text_field($_POST['ms_tipo_proyecto']));
    }

    // Estado
    if (isset($_POST['ms_estado_proyecto'])) {
        update_post_meta($post_id, 'estado_proyecto', sanitize_text_field($_POST['ms_estado_proyecto']));
    }

    // Año
    if (isset($_POST['ms_anio_proyecto'])) {
        update_post_meta($post_id, 'anio_proyecto', sanitize_text_field($_POST['ms_anio_proyecto']));
    }

    // Enlace
    if (isset($_POST['ms_enlace_externo'])) {
        update_post_meta($post_id, 'enlace_externo', esc_url_raw($_POST['ms_enlace_externo']));
    }

}
add_action('save_post', 'ms_guardar_datos_proyecto');

<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); }

/**
 * Encolar scripts necesarios para el selector de medios
 */
function series_enqueue_media_scripts() {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'series') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'series_enqueue_media_scripts');

/**
 * Mostrar campo en formulario de nueva serie
 */
function series_add_meta_field() {
    ?>
    <div class="form-field term-group">
        <label for="serie-image-id">Imagen de la Serie</label>
        <input type="hidden" id="serie-image-id" name="serie-image-id" value="" />
        <div id="serie-image-preview" style="margin-bottom: 10px;"></div>
        <button type="button" class="button serie-image-upload">Seleccionar Imagen</button>
        <button type="button" class="button serie-image-remove" style="display:none;">Eliminar Imagen</button>
        <p>Imagen representativa de esta serie</p>
    </div>
    <?php
}
add_action('series_add_form_fields', 'series_add_meta_field', 10, 2);

/**
 * Mostrar campo en edición de serie
 */
function series_edit_meta_field($term) {
    $image_id = get_term_meta($term->term_id, 'serie-image-id', true);
    $image_url = '';
    
    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'medium');
    }
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="serie-image-id">Imagen de la Serie</label></th>
        <td>
            <input type="hidden" id="serie-image-id" name="serie-image-id" value="<?php echo esc_attr($image_id); ?>" />
            <div id="serie-image-preview" style="margin-bottom: 10px;">
                <?php if ($image_url): ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width: 300px; height: auto; display: block;" />
                <?php endif; ?>
            </div>
            <button type="button" class="button serie-image-upload">Seleccionar Imagen</button>
            <button type="button" class="button serie-image-remove" <?php echo $image_id ? '' : 'style="display:none;"'; ?>>Eliminar Imagen</button>
            <p class="description">Imagen representativa de esta serie</p>
        </td>
    </tr>
    <?php
}
add_action('series_edit_form_fields', 'series_edit_meta_field', 10, 2);

/**
 * Guardar el meta
 */
function save_series_meta($term_id) {
    if (isset($_POST['serie-image-id'])) {
        update_term_meta($term_id, 'serie-image-id', absint($_POST['serie-image-id']));
    }
}
add_action('created_series', 'save_series_meta', 10, 2);
add_action('edited_series', 'save_series_meta', 10, 2);

/**
 * JavaScript para el selector de medios
 */
function series_media_selector_script() {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'series') {
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            var mediaUploader;
            
            // Abrir selector de medios
            $('.serie-image-upload').on('click', function(e) {
                e.preventDefault();
                
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                
                mediaUploader = wp.media({
                    title: 'Seleccionar Imagen de Serie',
                    button: {
                        text: 'Usar esta imagen'
                    },
                    multiple: false
                });
                
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#serie-image-id').val(attachment.id);
                    $('#serie-image-preview').html('<img src="' + attachment.url + '" style="max-width: 300px; height: auto; display: block;" />');
                    $('.serie-image-remove').show();
                });
                
                mediaUploader.open();
            });
            
            // Eliminar imagen
            $('.serie-image-remove').on('click', function(e) {
                e.preventDefault();
                $('#serie-image-id').val('');
                $('#serie-image-preview').html('');
                $(this).hide();
            });
        });
        </script>
        <?php
    }
}
add_action('admin_footer', 'series_media_selector_script');
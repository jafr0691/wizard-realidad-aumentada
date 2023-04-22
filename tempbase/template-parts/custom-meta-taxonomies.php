<?php
/**
 * Created by PhpStorm.
 * User: Personal
 * Date: 12/12/2017
 * Time: 2:08 PM
 */

/**
 * Test Taxonomy Custom Meta
 */
class Test_Taxonomy_Custom_Meta
{
    public function __construct()
    {
        add_action( 'init', array($this, 'register_custom_fields_taxonomy'));

        /**
         * Add new category data fields
         */
        add_action( 'empresa_add_form_fields', array($this, 'add_new_custom_fields'));

        /**
         * Edit category data fields
         */
        add_action( 'empresa_edit_form_fields', array($this, 'add_edit_custom_fields'));

        /**
         * Save the category data
         */
        add_action( 'edited_empresa', array($this, 'save_custom_taxonomy_meta') );
        add_action( 'create_empresa', array($this, 'save_custom_taxonomy_meta') );
    }

    /**
     * Register the social update
     */
    public function register_custom_fields_taxonomy()
    {
        register_taxonomy('empresa', 'buses', array(
            // Hierarchical taxonomy (like categories)
            'hierarchical' => true,
            // This array of options controls the labels displayed in the WordPress Admin UI
            'labels' => array(
                'name' => 'Empresas',
                'singular_name' => 'Empresa',
                'search_items' =>  __( 'Buscar empresas' ),
                'all_items' => __( 'Todas las empresas' ),
                'parent_item' => __( 'Padre empresa' ),
                'parent_item_colon' => __( 'Padre empresa:' ),
                'edit_item' => __( 'Editar empresa' ),
                'update_item' => __( 'Actualizar empresa' ),
                'add_new_item' => __( 'Añadir nueva empresa' ),
                'new_item_name' => __( 'Nuevo nombre de la empresa' ),
                'menu_name' => __( 'Empresas' ),
            ),

            // Control the slugs used for this taxonomy
            'rewrite' => array(
                'slug' => 'empresa', // This controls the base slug that will display before each term
                'with_front' => false, // Don't display the category base before "/locations/"
                'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        ));
    }

    /**
     * Add the edit custom fields
     */
    public function add_edit_custom_fields( $term )
    {
        $termMeta = get_option( 'custom_taxonomy_meta_' . $term->term_id );
        ?>

        <tr class="form-field">
        <th scope="row" valign="top">
        <label for="term_meta[zona]">
        <?php _e( 'Zona' ); ?>
        </label>
        </th>
        <td>
            <div class="form-field">
                <label for="term_meta[zona]"><?php _e( 'Zona' ); ?></label>
                <select name="term_meta[zona]" id="term_meta[zona]">
                    <option value="0">Seleccione</option>
                    <option value="1"
                        <?php
                        if($termMeta['zona'] == 1){
                            echo " selected ";
                        }
                        ?> >Norte</option>
                    <option value="2"
                        <?php
                        if($termMeta['zona'] == 2){
                            echo " selected ";
                        }
                        ?> >Sur</option>
                    <option value="3" <?php
                    if($termMeta['zona'] == 3){
                        echo " selected ";
                    }
                    ?> >Este</option>
                    <option value="4" <?php
                    if($termMeta['zona'] == 4){
                        echo " selected ";
                    }
                    ?> >Oeste</option>
                </select>
            </div>
        </td>
        </tr>

        <?php
    }

    /**
     * Add the new custom fields
     */
    public function add_new_custom_fields( )
    {
        ?>
        <div class="form-field">
            <label for="term_meta[zona]"><?php _e( 'Zona' ); ?></label>
            <select name="term_meta[zona]" id="term_meta[zona]">
                <option value="0">Seleccione</option>
                <option value="1">Norte</option>
                <option value="2">Sur</option>
                <option value="3">Este</option>
                <option value="4">Oeste</option>
            </select>
        </div>

        <?php
    }

    /**
     * Save the taxonomy custom meta
     */
    public function save_custom_taxonomy_meta($termId)
    {
        if ( !empty( $_POST['term_meta'] ) )
        {
            $term_meta = get_option( 'custom_taxonomy_meta_' . $termId );

            foreach ( $_POST['term_meta'] as $key => $val )
            {
                $term_meta[$key] = sanitize_text_field($val);
            }

            update_option( 'custom_taxonomy_meta_' . $termId, $term_meta );
        }
    }
}
/**
 * Usage
 *
 * $termMeta = get_option( 'custom_taxonomy_meta_' . $termId );
 */


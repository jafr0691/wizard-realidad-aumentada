<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// Fin



function restrict_admin_bus_rol(){
  if (!current_user_can('manage_options') && (!defined('DOING_AJAX') || ! DOING_AJAX )){
    wp_redirect(site_url());
    exit;
  }
}
add_action('admin_init', 'restrict_admin_bus_rol', 1);



// Funcion de la creacion del POST_TYPE BUS

function buses() {

    $labels = array(
        'name' =>  _x( 'Buses', 'buses' ),
        'singular_name' => 'Bus',
        'add_new' => 'Añadir nuevo',
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'menu_icon' => 'dashicons-id',
        'show_ui' => true,
        // 'hierarchical' => true,
        'query_var' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false,
        'can_export' => true,
        'rewrite' => true,
        'menu_position' => 5,
        'show_in_rest'       => true,
        'rest_base' => 'buses',
        'capability_type' => 'post',
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes' , 'comments'),
    );

    register_post_type( 'buses' , $args );

}
add_action('init', 'buses');

// Fin de la creacion del POST_TYPE BUS-----------------------------------------

// if( !function_exists( 'unregister_cpt_tax' ) ) {
//     function unregister_cpt_tax(){
//         unregister_post_type( 'buses' );
//         unregister_taxonomy( 'Menu-buses' );
//         unregister_taxonomy( 'menu-buses' );
//         unregister_taxonomy( 'placa' );
//         unregister_taxonomy( 'empresa' );
//         unregister_taxonomy( 'fotografo' );
//         unregister_taxonomy( 'carroceria' );
//         unregister_taxonomy( 'chasis' );
//         unregister_taxonomy( 'provincia' );
//     }
// }
// add_action('init','unregister_cpt_tax');

// Funcion de la creacion de todas las taxonomia del post_type bus provincia, placa, carroceria, chasis, menu-bus, fotografo y empresa

/* taxomonies for buses */
function buses_register_custom_taxonomies(){
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Menu buses'),
        'singular_name'     => __( 'Menu bus'),
        'search_items'      => __( 'Buscar Menu bus'),
        'all_items'         => __( 'Todos los Menu bus'),
        'edit_item'         => __( 'Editar Menu bus'),
        'update_item'       => __( 'Actualizar Menu bus'),
        'add_new_item'      => __( 'Agregar nueva Menu bus'),
        'not_found'         => __( 'Menu bus no se encontró!'),
    );
    $args = array(
        'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'menu-bus')
    );
    register_taxonomy( 'menu-bus', array( 'buses' ), $args );

   // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Placas'),
        'singular_name'     => __( 'Placa'),
        'search_items'      => __( 'Buscar Placas'),
        'all_items'         => __( 'Todas las placas'),
        'edit_item'         => __( 'Editar placa'),
        'update_item'       => __( 'Actualizar placa'),
        'add_new_item'      => __( 'Agregar nueva placa'),
        'not_found'         => __( 'Placa no se encontró!'),
    );
    $args = array(
        'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'placa')
    );
    register_taxonomy( 'placa', array( 'buses' ), $args ); 

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Empresas'),
        'singular_name'     => __( 'Empresa'),
        'search_items'      => __( 'Buscar empresas'),
        'all_items'         => __( 'Todas las empresas'),
        'edit_item'         => __( 'Editar empresa'),
        'update_item'       => __( 'Actualizar empresa'),
        'add_new_item'      => __( 'Agregar nueva empresa'),
        'not_found'         => __( 'Empresa no se encontró!'),
    );
    $args = array(
        'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'empresa')
    );
    register_taxonomy( 'empresa', array( 'buses' ), $args );

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Fotógrafos'),
        'singular_name'     => __( 'Fotógrafo'),
        'search_items'      => __( 'Buscar fotógrafos'),
        'all_items'         => __( 'Todas las fotógrafos'),
        'edit_item'         => __( 'Editar fotógrafo'),
        'update_item'       => __( 'Actualizar fotógrafo'),
        'add_new_item'      => __( 'Agregar nueva Fotógrafo'),
        'not_found'         => __( 'Fotógrafo no se encontró!'),
    );
    $args = array(
        'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'fotografo')
    );
    register_taxonomy( 'fotografo', array( 'buses' ), $args );

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Carrocerías'),
        'singular_name'     => __( 'Carrocería'),
        'search_items'      => __( 'Buscar carrocerías'),
        'all_items'         => __( 'Todas las carrocerías'),
        'edit_item'         => __( 'Editar carrocería'),
        'update_item'       => __( 'Actualizar carrocería'),
        'add_new_item'      => __( 'Agregar nueva carrocería'),
        'not_found'         => __( 'Carrocería no se encontró!'),
    );
    $args = array(
        'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'Carroceria')
    );
    register_taxonomy( 'carroceria', array( 'buses' ), $args );

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Chasis'),
        'singular_name'     => __( 'Chasi'),
        'search_items'      => __( 'Buscar chasis'),
        'all_items'         => __( 'Todas las chasis'),
        'edit_item'         => __( 'Editar chasi'),
        'update_item'       => __( 'Actualizar chasi'),
        'add_new_item'      => __( 'Agregar nueva chasis'),
        'not_found'         => __( 'Chasis no se encontró!'),
    );
    $args = array(
        'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'chasis')
    );
    register_taxonomy( 'chasis', array( 'buses' ), $args );

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Provincias'),
        'singular_name'     => __( 'Provincia'),
        'search_items'      => __( 'Buscar provincia'),
        'all_items'         => __( 'Todas las provincias'),
        'edit_item'         => __( 'Editar provincia'),
        'update_item'       => __( 'Actualizar provincia'),
        'add_new_item'      => __( 'Agregar nueva provincia'),
        'not_found'         => __( 'Provincia no se encontró!'),
    );
    $args = array(
        'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'provincia')
    );
    register_taxonomy( 'provincia', array( 'buses' ), $args );


}
add_action('init', 'buses_register_custom_taxonomies');

// Fin de la creacion de todas las taxonomia del post_type bus provincia, placa, carroceria, chasis, menu-bus, fotografo y empresa---------------------

// Funcion del hoock para insertar script de cambios de las imagenes destacadas y slider de la publicacion del bus

function gallery_post(){
    if(is_single()){
        global $post;
        $thumbID = get_post_thumbnail_id( $post->ID );
        $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );
        if(is_array($imgDestacada)){
            $pathImgDestacada = $imgDestacada[0];
        }else{
            $pathImgDestacada = site_url().'bus/wp-content/plugins/elementor/assets/images/placeholder.png';
        }
        
        $timepost = get_post_time( 'd/m/Y \- g:i:s A', '', '', true );
        ?>
            <script>
                document.getElementsByClassName('img-destacada-post')[0].children[0].children[1].setAttribute('src', '<?php echo $pathImgDestacada; ?>');
                let galleryImg = document.getElementsByClassName('slider_bus');
                for (var i =  0; i < galleryImg.length; i++) {
                    galleryImg[i].addEventListener('click', function(e){
                        document.getElementsByClassName('img-destacada-post')[0].children[0].children[1].setAttribute('srcset', e.target.src); 
                    });
                }
            </script>
        <?php
    }
    if(is_user_logged_in()){
        ?>
        <script type="text/javascript">
            if(document.querySelectorAll('.menu-item-666')){
                var leng = document.querySelectorAll('.menu-item-666').length;
                for (var i = 0; i < leng; i++) {
                    document.querySelector('.menu-item-666').remove();
                }
            }
            
        </script>
        
        <?php
    }else{

        ?>
        <script type="text/javascript">
            if(document.querySelectorAll('.menu-item-665')){
                var leng = document.querySelectorAll('.menu-item-665').length;
                for (var i = 0; i < leng; i++) {
                    document.querySelector('.menu-item-665').remove();
                }
            }
            if(document.querySelectorAll('.menu-item-667')){
                var leng = document.querySelectorAll('.menu-item-667').length;
                for (var i = 0; i < leng; i++) {
                    document.querySelector('.menu-item-667').remove();
                }
            }
            if(document.querySelectorAll('.menu-item-822')){
                var leng = document.querySelectorAll('.menu-item-822').length;
                for (var i = 0; i < leng; i++) {
                    document.querySelector('.menu-item-822').remove();
                }
            }
        </script>
        
        <?php
    }
};
add_action('wp_footer', 'gallery_post');

// Fin del hoock para insertar script de cambios de las imagenes destacadas y slider de la publicacion del bus-------------------



// Funcion del shortcode para insertar la fecha, visitas y cantidad de comentarios de la publicaicon del bus

function buses_fecha_publicado($atts) {
    $fecha = get_the_date('d/m/Y');
    $hora = get_the_date("g:i:s a");

    $publicado = "<div style='text-align: center;'><p><strong> $fecha </strong> - $hora</p>";

    $views = pvc_get_post_views( get_the_ID() );

    $publicado .= "<p style='font-family: Barlow, Sans-serif !important;'><strong> $views </strong> Visualizaciones</p>";

    $count_comments =  wp_count_comments(get_the_ID());

    if($count_comments->total_comments == 1){
        $publicado .= "<p style='font-family: Barlow, Sans-serif !important;'><strong>". $count_comments->total_comments ."</strong> Comentario</p></centre>";
    }else{
        $publicado .= "<p style='font-family: Barlow, Sans-serif !important;'><strong>". $count_comments->total_comments ."</strong> Comentarios</p></div>";
    }

    return $publicado;
}
add_shortcode('publicado', 'buses_fecha_publicado');

// Fin del shortcode para insertar la fecha, visitas y cantidad de comentarios de la publicaicon del bus---------------- 



// Funcion del shortcode para insertar la descripcion de la publicacion del bus

function buses_description($atts) {

    return get_post_field('post_content', get_the_ID());

}
add_shortcode('bus_descrip', 'buses_description');

// Fin del shortcode para insertar la descripcion de la publicaicon del bus-----------------------



// Funcion del shortcode para insertar la marca de la empresa en la publicacion del bus

function empresa_marca($atts) {

   $terms = wp_get_post_terms( get_the_ID(), 'empresa');
   if(!empty($terms)){
        $id_empresa = $terms[0]->term_id;
       $name_empresa = $terms[0]->name;
       $assoc = taxonomy_image_plugin_get_associations();
       $thumb = wp_get_attachment_image_src( $assoc[$id_empresa], 'full' );

       if(isset($thumb[0])){
            echo "<div style='text-align: center;'><img src='".$thumb[0]."'></div>";
       }else{
            echo "<div style='text-align: center;'><h2 style='color: #000000; font-family: Barlow, Sans-serif !important; font-weight: 600;'>$name_empresa</div>";
       }
   }

}
add_shortcode('empresa_titulo', 'empresa_marca');

// Fin del shortcode inserta la marca de la empresa en la publicacion-----------------



// Funcion del shortcode para insertar el slider de la galria de imagen en la publicacion del bus

    function buses_carrusel($atts) {

        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'>
        <style>
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        .wrapper{
          display: flex;
          max-width: 1200px;
          position: relative;
        }
        .wrapper i{
          top: 50%;
          height: 44px;
          width: 44px;
          color: #343F4F;
          cursor: pointer;
          font-size: 1.15rem;
          position: absolute;
          text-align: center;
          line-height: 44px;
          background: #fff;
          border-radius: 50%;
          transform: translateY(-50%);
          transition: transform 0.1s linear;
        }
        .wrapper i:active{
          transform: translateY(-50%) scale(0.9);
        }
        .wrapper i:hover{
          background: #f2f2f2;
        }
        .wrapper i:first-child{
          left: -22px;
          display: none;
        }
        .wrapper i:last-child{
          right: -22px;
        }
        .wrapper .carousel{
          font-size: 0px;
          cursor: pointer;
          overflow: hidden;
          white-space: nowrap;
          scroll-behavior: smooth;
        }
        .carousel.dragging{
          cursor: grab;
          scroll-behavior: auto;
        }
        .carousel.dragging img{
          pointer-events: none;
        }
        .carousel img{
          height: 120px;
          object-fit: cover;
          user-select: none;
          margin-left: 14px;
          width: calc(100% / 3);
        }
        .carousel img:first-child{
          margin-left: 0px;
        }

        @media screen and (max-width: 900px) {
          .carousel img{
            width: calc(100% / 2);
          }
        }

        </style>";

        echo "<script>
        setTimeout( carrusel_bustime, 2000);
        function carrusel_bustime(){
        const carousel = document.querySelector('.carousel'),
firstImg = carousel.querySelectorAll('img')[0],
arrowIcons = document.querySelectorAll('.wrapper i');

        let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;

        const showHideIcons = () => {
            // showing and hiding prev/next icon according to carousel scroll left value
            let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
            arrowIcons[0].style.display = carousel.scrollLeft == 0 ? 'none' : 'block';
            arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? 'none' : 'block';
        }

        arrowIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
                // if clicked icon is left, reduce width value from the carousel scroll left else add to it
                carousel.scrollLeft += icon.id == 'left' ? -firstImgWidth : firstImgWidth;
                setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
            });
        });

        const autoSlide = () => {
            // if there is no image left to scroll then return from here
            if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;

            positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
            let firstImgWidth = firstImg.clientWidth + 14;
            // getting difference value that needs to add or reduce from carousel left to take middle img center
            let valDifference = firstImgWidth - positionDiff;

            if(carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
                return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
            }
            // if user is scrolling to the left
            carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
        }

        const dragStart = (e) => {
            // updatating global variables value on mouse down event
            isDragStart = true;
            prevPageX = e.pageX || e.touches[0].pageX;
            prevScrollLeft = carousel.scrollLeft;
        }

        const dragging = (e) => {
            // scrolling images/carousel to left according to mouse pointer
            if(!isDragStart) return;
            e.preventDefault();
            isDragging = true;
            carousel.classList.add('dragging');
            positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
            carousel.scrollLeft = prevScrollLeft - positionDiff;
            showHideIcons();
        }

        const dragStop = () => {
            isDragStart = false;
            carousel.classList.remove('dragging');

            if(!isDragging) return;
            isDragging = false;
            autoSlide();
        }

        carousel.addEventListener('mousedown', dragStart);
        carousel.addEventListener('touchstart', dragStart);

        document.addEventListener('mousemove', dragging);
        carousel.addEventListener('touchmove', dragging);

        document.addEventListener('mouseup', dragStop);
        carousel.addEventListener('touchend', dragStop);
        }
        </script>";

    global $dynamic_featured_image, $post; 

    if($dynamic_featured_image){
        $dynamic_bus = $dynamic_featured_image->get_featured_images();
    }

   

        $thumbID = get_post_thumbnail_id( $post->ID );
        $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );

        echo "<div class='wrapper'>
            <i id='left' class='fa-solid fa-angle-left'></i>
            <div class='carousel'>";
            if(is_array($imgDestacada)){
                echo "<img class='slider_bus' src='".$imgDestacada[0]."' alt='img' draggable='false'>";
            }
            if($dynamic_bus){
            foreach ($dynamic_bus as $key => $value) {
                echo "<img class='slider_bus' src='".$value['full']."' alt='img' draggable='false'>";
            }
           }
        echo "</div>
          <i id='right' class='fa-solid fa-angle-right'></i>
        </div>";


    }

add_shortcode('bus_carrusel', 'buses_carrusel');

// Fin del shortcode carrusel de la imagenes en la publicacion del bus ----------------------------------



// Funcion del shortcode ingresa el campo para el titulo del bus 

function bus_input_placa_post($atts) {

    $v = shortcode_atts([  'placeholder'=> 'Escribir la placa del Bus'  ], $atts);

    echo "<input class='bus-input-placa' type='text' name='title-placa' placeholder='".$v['placeholder']."' required>";

}

add_shortcode('bus_input_placa', 'bus_input_placa_post');

// Fin del shortcode del titulo de la publicacion del bus --------------------------



// Funcion del shortcode ingresa el campo textarea para la descripcion del bus

function bus_textarea_descrip_post($atts) {
    $v = shortcode_atts([  'placeholder' => ''  ], $atts);
    $args = array(

    'textarea_rows' => 3,
    'media_buttons' => FALSE,
    'teeny' => false,
    'quicktags' => false

);

wp_editor( $v['placeholder'], 'descrip', $args );


}

add_shortcode('bus_textarea_descrip', 'bus_textarea_descrip_post');

// Fin del shortcode de la descripcion del bus ------------------



// Funcion del shortcode para seleccionar la provincia de la placa del bus

function bus_select_provincia_post($atts) {
    $provincia = get_terms( 'provincia', array(
        'orderby'    => 'name',
        'order'      => 'asc',
        'hide_empty' => false,
    ));

    echo "<select class='bus-select-provincia' name='provincia' required>";

        foreach ($provincia as $key => $value) {
            echo "<option value='".$value->term_id."'>".$value->name."</option>";
    
        }
    echo "</select>";


}

add_shortcode('bus_select_provincia', 'bus_select_provincia_post');

// Fin del shortcode seleccion de la provincia del bus ----------------



// Funcion del shortcode para seleccionar la empresa del bus

function bus_select_empresa_post($atts) {
    $empresa = get_terms( 'empresa', array(
        'orderby'    => 'name',
        'order'      => 'asc',
        'hide_empty' => false,
    ));

    echo "<select class='bus-select-empresa' name='empresa' required>";

        foreach ($empresa as $key => $value) {
            echo "<option value='".$value->term_id."'>".$value->name."</option>";
    
        }
    echo "</select>";


}

add_shortcode('bus_select_empresa', 'bus_select_empresa_post');

// Fin del shortcode seleccion de la empresa el bus ----------------



// Funcion del shortcode para seleccionar el fotografo del bus

function bus_select_fotografo_post($atts) {

    $current_user = wp_get_current_user();

    $name = $current_user->first_name . " " . $current_user->last_name;

    $fotografo = get_terms( 'fotografo', array(
        'orderby'    => 'name',
        'order'      => 'asc',
        'hide_empty' => false,
    ));

    echo "<select class='bus-select-fotografo' name='fotografoselect' onchange='inputfotografo()' required>";

        $t=0;
        foreach ($fotografo as $key => $value) {
            if($name == $value->name){
                echo "<option value='".$value->name."' selected>".$value->name."</option>";
                $t++;
            }else{
                echo "<option value='".$value->name."'>".$value->name."</option>";
            }
        }
        if($t==0){
            echo "<option value='".$name."' selected>".$name."</option>";
        }
        echo "<option value='otro'>Escribir</option>";
    echo "</select>
        <div class='div-text-fotografo' style='display:none'>
            <input type='text' name='fotografoinput' class='bus-input-fotografo' placeholder='Escribir el Nombre y Apellido'>
            <button type='button' class='btn-hiden' onclick='Hiden()' style='width: 100%;'>Volver</button>
        </div>";


}

add_shortcode('bus_select_fotografo', 'bus_select_fotografo_post');

// Fin del shortcode seleccion del fotografo el bus ----------------



// Funcion shortcode seleccion de ubicacion en el menu

function bus_select_menu_post($atts) {
    $menu = get_terms( 'menu-bus', array(
        'orderby'    => 'name',
        'order'      => 'asc',
        'hide_empty' => false,
    ));

    echo "<select class='bus-select-menu' name='menu' required>";
        foreach ($menu as $key => $value) {
            if($value->parent == 0){
                echo "<optgroup label='".$value->name."'>";
            }
            foreach ($menu as $key => $value2) {
                if($value->term_id == $value2->parent){
                    echo "<option value='".$value2->term_id."'>".$value2->name."</option>"; 
                }else{
                    echo "</optgroup>";
                }
            }
        }

    echo "</select>";

}

add_shortcode('bus_select_menu', 'bus_select_menu_post');

// Fin del shortcode para ingresar el menu------------------------



// Funcion del shortcode para selecionar la imagen destacada

function bus_select_img_post($atts) {
    
    if(!is_user_logged_in()){
        ?>
        <script>
            location.href = '<?php echo home_url(); ?>';
        </script>
        <?php
    }
    
    $v = shortcode_atts([ 'label' => 'Click aquí para subir la foto del autobús y editarla'  ], $atts);

    echo '<link rel="stylesheet" href="'.get_template_directory_uri().'-child/js/slim.css">';

    echo "<form name='new_post_type_bus' id='new_post_type_bus' method='post' enctype='multipart/form-data' action=''>";
    echo "
        <div class='slim'
            data-label='".$v['label']."' 
             data-meta-user-id='1234'
             data-ratio='16:9'
             data-size='600,337'
             data-filter-sharpen='1'
             data-will-save='addTime' >
            <input type='file' id='file'  accept='image/jpeg,image/jpg' name='slim' required>
        </div>";

}

add_shortcode('bus_destacada_img', 'bus_select_img_post');

// Fin del shortcode para ingresar la imagen destacada --------------



// Funcion del shortcode para ingresar las imagenes del slider

function bus_galeri_post($atts) {

    ?>
        <?php wp_nonce_field( 'my_file_upload', 'fileup_nonce' ); ?>
        <input class="bus-file-slider" name="my_file_upload[]"  accept='image/jpeg,image/jpg' type="file" multiple required />

    <?php
}

add_shortcode('bus_slider_img', 'bus_galeri_post');

// Fin del shortcode imagen slider ---------------



// Funcion del shortcode agrega el boton de envio publicar bus desde frontend bus

function bus_form_btn($atts = '') {

    $n = shortcode_atts([  'text' => 'Publicar', 'class' => 'btn-publicar'  ], $atts);

    echo "<input type='submit' class='".$n['class']."' value='".$n['text']."'>";

    echo "</form>";

    echo '
    <script>
        function addTime(data, ready) {

            // add additional data
            data.meta.now = Date.now();

            // continue saving the data
            ready(data);

        }
        function inputfotografo(){

            var selectfoto = document.querySelector(".bus-select-fotografo");
            if(selectfoto.value == "otro"){
                selectfoto.style.display = "none";
                document.querySelector(".div-text-fotografo").style.display = "block";
            }
        }

        function Hiden(){
            document.querySelector(".div-text-fotografo").style.display = "none";
            document.querySelector(".bus-select-fotografo").style.display = "block";
        }
    </script>
    <script src="'.get_template_directory_uri().'-child/js/panel_scripts.js"></script>
    <script src="'.get_template_directory_uri().'-child/js/slim.jquery.js"></script>
    <script src="'.get_template_directory_uri().'-child/js/slim.kickstart.js"></script>';

        if(is_user_logged_in()){
        $user_id = get_current_user_id();

        $post_type = 'buses';

        if(isset($_POST['title-placa'],$_POST['descrip']) and !empty($_POST['title-placa']) and !empty($_POST['descrip'])){

            $title = $_POST['title-placa'];
            $content = $_POST['descrip'];
            $provincia = isset($_POST['provincia'])? $_POST['provincia']:false;
            $menu = isset($_POST['menu'])? $_POST['menu']:false;
            $empresa = isset($_POST['empresa'])? $_POST['empresa']:false;
            if($_POST['fotografoselect'] == 'otro'){
                if(empty($_POST['fotografoinput'])){
                    $fotografo = false;
                }else{
                    $fotografo = $_POST['fotografoinput'];
                }
                    
            }else{
                    $fotografo = $_POST['fotografoselect'];
            }

            $array_post_bus = array(
                'post_title'    => wp_strip_all_tags($title),
                'post_name'     => sanitize_title_with_dashes(wp_strip_all_tags($title), '', 'save'),
                'post_content'  => $content,
                'post_type'     => $post_type,
                'post_status'   => 'pending',
                'post_author'   => $user_id);
            

            $post_id_form = wp_insert_post($array_post_bus, false);

            if($fotografo != 'otro'){
                insertCreaTaxonomia($post_id_form, $fotografo, 'fotografo');
            }

            insertCreaTaxonomia($post_id_form, $title, 'placa');
            if($empresa){
                wp_set_post_terms($post_id_form, $empresa, 'empresa');
            }
            if($provincia){
                wp_set_post_terms($post_id_form, $provincia, 'provincia');
            }
            if($menu){
                wp_set_post_terms($post_id_form, $menu , 'menu-bus');
            }
            


            if($post_id_form != 0){
                
                $images = Slim::getImages();

                $image = $images[0];

                $data = $image['output']['data'];
                $image_name = $image['input']['name'];

                $file = Slim::saveFile($data, $image_name, get_theme_root() . "/phlox-child/template-parts/temp_images/");

                if(isset($file) && is_array($file)){
                    addTextWatermark($file['path'], $fotografo, $file['path']);
                    insert_attachment_from_path($file['path'], $post_id_form, true);
                    try{
                        unlink($file['path']);
                    }catch(Exception $e){

                    }
                }
            }

            if(isset($_POST['fileup_nonce'])){

                if( wp_verify_nonce( $_POST['fileup_nonce'], 'my_file_upload' ) ){

                    if ( ! function_exists( 'wp_handle_upload' ) ) {
                        require_once ABSPATH . 'wp-admin/includes/file.php';
                    }

                    $files = & $_FILES['my_file_upload'];


                    foreach ( $files['name'] as $key => $value ) {

                        if( empty( $files['name'][ $key ] ) ){
                            continue;
                        }

                        $file = array(
                            'name'     => $files['name'][ $key ],
                            'type'     => $files['type'][ $key ],
                            'tmp_name' => $files['tmp_name'][ $key ],
                            'error'    => $files['error'][ $key ],
                            'size'     => $files['size'][ $key ],
                        );

                        $movefile[] = wp_handle_upload( $file, [ 'test_form' => false ] );

                    }
                
                    foreach ($movefile as $value) {
                        $direc = explode('uploads', $value['url'])[1];
                        $input_array[] = $value['url'].','.$value['url'];
                    }
                    $tt = sanitize_array_bus( $input_array );

                    update_post_meta( $post_id_form, 'dfiFeatured', $tt );
                }
            }
            $newPostBus = post_permalink($post_id_form);
            wp_redirect($newPostBus);
        }
    }else{
        wp_redirect(9);
    }

}

add_shortcode('bus_publicar_btn', 'bus_form_btn');

// Fin del shortcode para ingresar el boton que envia el formulario publicacion del bus frontend ----------------


function insertCreaTaxonomia($post_id, $name, $taxonomy){
    $term_id_foto = term_exists( $name, $taxonomy );

    if ( $term_id_foto !== 0 && $term_id_foto !== null ) {
        if(is_array($term_id_foto)){
            $term_id_foto = $term_id_foto['term_id'];
        }
        wp_set_post_terms( $post_id, $term_id_foto, $taxonomy, false );

    }else{
        $term_id = wp_insert_term( $name, $taxonomy );
        wp_set_post_terms( $post_id, $term_id['term_id'], $taxonomy, false );

    }
}


// Funcion para organizar el array de las imagenes para el slider

function sanitize_array_bus( $input_array ) {
    $sanitized = array();

    foreach ( $input_array as $value ) {
        $sanitized[] = sanitize_text_field( wp_unslash( $value ) );
    }

    return $sanitized;
}

 // Fin -------------/////////////////



 //Class para poder subir las imagenes destacadas


abstract class SlimStatus {
    const Failure = 'failure';
    const Success = 'success';
}

class Slim {

    public static function getImages($inputName = 'slim') {

        $values = Slim::getPostData($inputName);

        // test for errors
        if ($values === false) {
            return false;
        }

        // determine if contains multiple input values, if is singular, put in array
        $data = array();
        if (!is_array($values)) {
            $values = array($values);
        }

        // handle all posted fields
        foreach ($values as $value) {
            $inputValue = Slim::parseInput($value);
            if ($inputValue) {
                array_push($data, $inputValue);
            }
        }

        // return the data collected from the fields
        return $data;

    }

    // $value should be in JSON format
    private static function parseInput($value) {

        // if no json received, exit, don't handle empty input values.
        if (empty($value)) {return null;}

        // The data is posted as a JSON String so to be used it needs to be deserialized first
        $data = json_decode(stripcslashes($value));

        // shortcut
        $input = null;
        $actions = null;
        $output = null;
        $meta = null;

        if (isset ($data->input)) {
            $inputData = isset($data->input->image) ? Slim::getBase64Data($data->input->image) : null;
            $input = array(
                'data' => $inputData,
                'name' => $data->input->name,
                'type' => $data->input->type,
                'size' => $data->input->size,
                'width' => $data->input->width,
                'height' => $data->input->height,
            );
        }

        if (isset($data->output)) {
            $outputData = isset($data->output->image) ? Slim::getBase64Data($data->output->image) : null;
            $output = array(
                'data' => $outputData,
                'width' => $data->output->width,
                'height' => $data->output->height
            );
        }

        if (isset($data->actions)) {
            $actions = array(
                'crop' => $data->actions->crop ? array(
                    'x' => $data->actions->crop->x,
                    'y' => $data->actions->crop->y,
                    'width' => $data->actions->crop->width,
                    'height' => $data->actions->crop->height,
                    'type' => $data->actions->crop->type
                ) : null,
                'size' => $data->actions->size ? array(
                    'width' => $data->actions->size->width,
                    'height' => $data->actions->size->height
                ) : null
            );
        }

        if (isset($data->meta)) {
            $meta = $data->meta;
        }

        // We've sanitized the base64data and will now return the clean file object
        return array(
            'input' => $input,
            'output' => $output,
            'actions' => $actions,
            'meta' => $meta
        );
    }

    // $path should have trailing slash
    public static function saveFile($data, $name, $path = 'tmp/', $uid = true) {

        // Add trailing slash if omitted
        if (substr($path, -1) !== '/') {
            $path .= '/';
        }

        // Test if directory already exists
        if(!is_dir($path)){
            mkdir($path, 0755);
        }

        // Let's put a unique id in front of the filename so we don't accidentally overwrite older files
        if ($uid) {
            $name = uniqid() . '_' . $name;
        }
        $path = $path . $name;

        // store the file
        Slim::save($data, $path);

        // return the files new name and location
        return array(
            'name' => $name,
            'path' => $path
        );
    }

    public static function outputJSON($status, $fileName = null, $filePath = null) {

        header('Content-Type: application/json');

        if ($status !== SlimStatus::Success) {
            echo json_encode(array('status' => $status));
            return;
        }

        echo json_encode(
            array(
                'status' => $status,
                'name' => $fileName,
                'path' => $filePath
            )
        );
    }

    /**
     * Gets the posted data from the POST or FILES object. If was using Slim to upload it will be in POST (as posted with hidden field) if not enhanced with Slim it'll be in FILES.
     * @param $inputName
     * @return array|bool
     */
    private static function getPostData($inputName) {

        $values = array();

        if (isset($_POST[$inputName])) {
            $values = $_POST[$inputName];
        }
        else if (isset($_FILES[$inputName])) {
            // Slim was not used to upload this file
            return false;
        }

        return $values;
    }

    /**
     * Saves the data to a given location
     * @param $data
     * @param $path
     */
    private static function save($data, $path) {
        file_put_contents($path, $data);
    }

    /**
     * Strips the "data:image..." part of the base64 data string so PHP can save the string as a file
     * @param $data
     * @return string
     */
    private static function getBase64Data($data) {
        return base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
    }

}

// Function to add text water mark over image
function addTextWatermark($src, $watermark, $save=NULL) {
    list($width, $height) = getimagesize($src);
    $image_color = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($src);
    imagecopyresampled($image_color, $image, 0, 0, 0, 0, $width, $height, $width, $height);
    $txtcolor = imagecolorallocate($image_color, 255, 255, 255);
    $font = get_theme_root() . "/phlox-child/template-parts/arial.ttf";

    if($width < 350){
        $font_size = 12;
    }else{
        $font_size = 15;
    }


    $dimensions = imagettfbbox($font_size, 0, $font, $watermark);
    $textWidth = abs($dimensions[4] - $dimensions[0]);

    $x = $width - $textWidth - 7;
    $y = $height - 7;
    imagettftext($image_color, $font_size, 0, $x, $y, $txtcolor, $font, $watermark);
    if ($save<>'') {
        imagejpeg ($image_color, $save, 100);
    } else {
        header('Content-Type: image/jpeg');
        imagejpeg($image_color, null, 100);
    }
    imagedestroy($image);
    imagedestroy($image_color);
}
// Function to add image watermark over images
// function addImageWatermark($SourceFile, $WaterMark, $DestinationFile=NULL, $opacity) {
//     $main_img = $SourceFile;
//     $watermark_img = $WaterMark;

//     $watermark = imagecreatefrompng($watermark_img);
//     $watermark_width = imagesx($watermark);
//     $watermark_height =imagesy($watermark);


//     $image = imagecreatefromjpeg($main_img);
//     if(!$image || !$watermark) die("Error: main image or watermark image could not be loaded!");

//     $size = getimagesize($main_img);
    
//  // En esta linea se cambia el tamaño del watermark 100 = 100%.
//     $newwidth  = getPercentage($size[0], 100);

//     $newheight = ($watermark_height / $watermark_width) * ( $newwidth  );
//     // create a new image with the new dimension.
//     $new_watermark = imagecreatetruecolor($newwidth, $newheight);
//     // Retain image transparency for your watermark, if any.
//     imagealphablending($new_watermark, false);
//     imagesavealpha($new_watermark, true);
//     imagecopyresized($new_watermark, $watermark, 0, 0, 0, 0, $newwidth, $newheight, $watermark_width, $watermark_height);

//     $dest_x = 5;

//     $dest_y = $size[1] - ($newheight + 100);
//     // since you are using 100% alpha, why bother with that parameter?
//     imagecopy($image, $new_watermark, $dest_x, $dest_y, 0, 0, $newwidth, $newheight);
//     if ($DestinationFile<>''){
//         imagejpeg($image, $DestinationFile, 100);
//     }else {
//         header('Content-Type: image/jpeg');
//         imagejpeg($image);
//     }


//     imagedestroy($image);
//     imagedestroy($watermark);
//     imagedestroy($new_watermark);
// }


function getPercentage($number, $percentage){
    return $number * ($percentage / 100);
}


function agregar_marca_de_agua($limit = 1, $offset = 0, $exclude = array()){
    $args = array(
        'posts_per_page' => $limit,
        'offset' => $offset,
        'post_type' => 'buses',
        'post__not_in' => $exclude,
    );

    $images = new WP_Query($args);
    if($images->have_posts()){
        while($images->have_posts()){ $images->the_post();
            $image_post_id = $images->post->ID;
            if( has_post_thumbnail($image_post_id ) )
            {
            $image_url = get_the_post_thumbnail_url();
            if(isset($image_url) && !empty($image_url)) {

                list($txt, $ext) = explode(".", $image_url);
                $txt = explode("/", $txt);
                $txt = $txt[count($txt) - 1];
                $file_name = get_theme_root() . "/phlox-child/template-parts/temp_images/" . $txt . '.' . $ext;
                $upload = copy(get_the_post_thumbnail_url(), $file_name);
                if ($upload == true) {
                    $terms = wp_get_post_terms($image_post_id, 'fotografo');
                    $watermark = "";
                    foreach ($terms as $term) {
                        $watermark = $term->name;
                    }
                    addTextWatermark($file_name, $watermark, $file_name);
                    $WaterMark = get_field('general_watermark', 'option');
                    addImageWatermark($file_name, $WaterMark, $file_name, 50);

                    $attachment_id = get_post_thumbnail_id( $image_post_id );
                    wp_delete_attachment($attachment_id, true);

                    insert_attachment_from_path($file_name, $image_post_id, true);
                    try{
                        unlink($file_name);
                    }catch(Exception $e){

                    }

                    echo "<hr>";
                    echo "<img src='" . get_the_post_thumbnail_url() . "'>";

                }


            }

            }
        }
    }
}


function insert_attachment_from_path( $file, $post_id = 0 , $set_as_featured = false ) {
    $file_name = explode("/",$file);
    $file_name = $file_name[count($file_name)-1];

    $upload = wp_upload_bits( $file_name, null, file_get_contents( $file ) );

    $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );
    $wp_upload_dir = wp_upload_dir();
    $attachment = array(
        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename( $file_name )),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment( $attachment, $upload['file'], $post_id );

    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    if( $set_as_featured == true ) {
        update_post_meta( $post_id, '_thumbnail_id', $attach_id );
    }

}



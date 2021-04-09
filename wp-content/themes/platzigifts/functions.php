<?php

function init_template() {
    // Coloca barra de ayuda de WP
    add_theme_support('post-thumbnails');
    // Coloca el titulo en el tag
    add_theme_support('title-tag');

    register_nav_menus(
        array(
            'top_menu' => 'Menu Principal'
        )
    );
}

// Ejecutar dentro del codigo fuente de WP
// Usaremos un Hook ya que no podemos editar directamente el codigo
add_action('after_setup_theme', 'init_template');

// Manejo de librerias
function assets() {
    // Registrar a Bootstrap como dependencia
    //(nombre), (url), (dependencias), (version), (medi)
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css', '', '5.0', 'all');
    // Fuente para poder usar los estilos
    wp_register_style('montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap', '', '1.0', 'all');
    // Agregarlas
    wp_enqueue_style( 'estilos', get_stylesheet_uri(), array('bootstrap', 'montserrat'), '1.0', 'all');

    // Scripts a usar
    // Inicializa
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js', '', '1.16.1', true);
    // Carga
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js', array('jquery', 'popper'), '5.0', true);

    // Llamar scripts propios
    wp_enqueue_script('custom', get_template_directory_uri() . './assets/js/custom.js', '', '1.0', true);
}

// Agregamos un hook
add_action('wp_enqueue_scripts', 'assets');

//Widgets
function sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de pagina',
            'id' => 'footer',
            'description' => 'Zona de widgets para pie de pagina',
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        )
    );
}

add_action('widgets_init', 'sidebar');

function productos_type(){
    $labels = array(
        'name' => 'Productos',
        'singular_name' => 'Producto',
        'menu_name' => 'Productos',
    );
    $args = array(
        'lavel' => 'Productos',
        'description' => 'Productos de Platzi',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'can_export' => true,
        'publicly_queryable' => true,
        'rewrite' => true,
        'show_in_rest' => true
    );
    // Funcion para crear el post type
    register_post_type('producto', $args);
}

// Generando un hook
add_action('init', 'productos_type');
<?php

//Plugin name: Modo Oscuro
//Description: Activa el modo oscuro en tu theme
//Version: 1.0
//Author: Patrick Jhonatan Hernandez Blanco
//Author URI: https://github.com/kelevo

function estilos_plugin(){

    // Variable que contiene la localizacion del archivo
    // __FILE__ devuelde la ubicacion y plugin_dir_url la convierte
    $estilos_url = plugin_dir_url(__FILE__);

    wp_enqueue_style('modo_oscuro', $estilos_url . './assets/css/estilo.css', '', '1.0', 'all');
}

// Hook
add_action('wp_enqueue_scripts', 'estilos_plugin');
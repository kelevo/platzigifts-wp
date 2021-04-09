<?php

//Plugin name: Formulario TEKSI
//Description: Formulario personalizado usando un shortcode [teksi_plugin_form]
//Version: 1.0
//Author: Patrick Jhonatan Hernandez Blanco
//Author URI: https://github.com/kelevo

// Hook de WP que se activa cuando se activa el plugin
// __FILE__ devuelde la ruta actual
register_activation_hook( __FILE__ , "teksi_form_init");

function teksi_form_init()
{
    global $wpdb;
    // Devuelve prefijo para la tabla
    $tabla_form = $wpdb->prefix . 'form';
    $charset_collate = $wpdb->get_charset_collate();

    // Prepara la consulta quevamos a lanzar para crear la tabla
    $query = "CREATE TABLE IF NOT EXISTS $tabla_form (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(40) NOT NULL,
        correo varchar(100) NOT NULL,
        nivel_html smallint(4) NOT NULL,
        aceptacion smallint(4) NOT NULL,
        create_at datetime NOT NULL,
        UNIQUE (id)
    ) $charset_collate";

    // Lanzar consulta para que cree la tabla
    include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);
}

// Definicion del shortcode que invocara al formulario
add_shortcode('teksi_plugin_form', 'TEKSI__Plugin_form' );

// Definimos la funcion que pasamos como parametro
function TEKSI__Plugin_form()
{
    global $wpdb;

    if (!empty($_POST)
        AND $_POST['nombre'] != ''
        AND is_email($_POST['correo'])
        AND $_POST['nivel_html'] != ''
        AND $_POST['aceptacion'] == '1'
    ) {
        $tabla_form = $wpdb->prefix . 'form';
        // Sanitizando variables para evitar inyeccion SQL
        $nombre = sanitize_text_field($_POST['nombre']);
        $correo = $_POST['correo'];
        $nivel_html = (int)$_POST['nivel_html'];
        $aceptacion = (int)$_POST['aceptacion'];
        $create_at = date('Y-m-d H:i:s');

        // Insercion en la BD
        $wpdb->insert(
            $tabla_form,
            array(
                'nombre' => $nombre,
                'correo' => $correo,
                'nivel_html' => $nivel_html,
                'aceptacion' => $aceptacion,
                'create_at' => $create_at,
            )
        );
        echo "<p class='exito'><b>Tus datos han sido registrados!!</b> Gracias...</p>";
    }
    ob_start();
    ?>

    <!--HTML-->
    <!--El action cargar le formulario y nos regresa a donde estabamos-->
    <form action="<?php get_the_permalink(); ?>" method="post" class="cuestionario">
        <!--nombre-->
        <div class="form-input">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" requiered="required">
        </div>
        <!--Correo-->
        <div class="form-input">
            <label for='correo'>Correo</label>
            <input type="email" name="correo" id="correo" required>
        </div>
        <!--Nivel de HTML-->
        <div class="form-input">
            <label for="nivel_html">¿Cuál es tu nivel de HTML?</label>
            </br>
            <input type="radio" name="nivel_html" value="1" required>Nada</input>
            </br>
            <input type="radio" name="nivel_html" value="2" required>Estoy aprendiendo</input>
            </br>
            <input type="radio" name="nivel_html" value="3" required> Tengo experiencia</input>
            <br>
            <input type="radio" name="nivel_html" value="4" required> Lo domino al dedillo</input>
        </div>
        <!--Aceptar terminos-->
        <div class="form-input">
            <label for="aceptacion">La información facilitada se tratará con respeto y admiración.</label>
            <input type="checkbox" id="aceptacion" name="aceptacion" value="1" required>
            Entiendo y acepto las condiciones
            </input>
        </div>
        <div class="form-input">
            <input type="submit" value="Enviar">
        </div>
    </form>

    <?php
    // Regresa HTML
    return ob_get_clean();
}

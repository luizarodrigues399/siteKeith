<?php
/*
Plugin Name: keith-plugin
Description: Adds my custom codes to WordPress.
Version: 1.0
Author: Luiza Rodrigues
*/

include_once(dirname(__DIR__, 4) . '/FW/importConstantes.php');

add_action('wp', 'importarJSEspecifico');
add_action('wp_enqueue_scripts', 'importarGlobalJS');
add_action('wp_enqueue_scripts', 'importarAjaxJS');
add_action('wp_enqueue_scripts', 'owlCarousel');
add_action('wp_enqueue_scripts', 'datepickerJS');
add_action('wp_enqueue_scripts', 'importarAgendarHorarioJS');
add_action('wp_enqueue_scripts', 'wordpressGlobalJS');
add_action('wp_enqueue_scripts', 'importarJSView');

function importarJSView() {
    wp_enqueue_script(
        'jsviews',
        get_site_url() .'./../node_modules/jsviews/jsviews.min.js',
        array('jquery'), // depende do jQuery
        null,
        false// true = carrega no footer
    );
}

function importarAjaxJS() {
    wp_enqueue_script(
        'ajax', // identificador único
        get_site_url() .'/../js/ajax.js?preventCache=' . rand(), // caminho do arquivo
        array('jquery'), // dependência (se precisar do jQuery)
        '1.0', // versão (pode mudar se atualizar o arquivo)
        false // carregar no footer (true) ou header (false)
    );
}

function wordpressGlobalJS() {
    wp_enqueue_script(
        'wordpress-global', // identificador único
        get_site_url() .'/../js/site/wordpress-global.js?preventCache=' . rand(), // caminho do arquivo
        array('jquery'), // dependência (se precisar do jQuery)
        '1.0', // versão (pode mudar se atualizar o arquivo)
        false // carregar no footer (true) ou header (false)
    );
}


function datepickerJS() {
    wp_enqueue_style(
        'jquery-ui',
        get_site_url() .'/../libs/jquery-ui-1.12.1/jquery-ui.min.css'
    );
    wp_enqueue_script(
        'jquery-ui',
        get_site_url() .'/../libs/jquery-ui-1.12.1/jquery-ui.min.js',
        array('jquery'), // depende do jQuery
        null,
        false// true = carrega no footer
    );
}

function owlCarousel() {
    wp_enqueue_style(
        'owl-carousel',
        get_site_url() .'/../node_modules/owl.carousel/dist/assets/owl.carousel.min.css'
    );
    wp_enqueue_script(
        'owl-carousel',
        get_site_url() .'/../node_modules/owl.carousel/dist/owl.carousel.min.js',
        array('jquery'), // depende do jQuery
        null,
        false// true = carrega no footer
    );
}

function importarAgendarHorarioJS() {
    // registra e carrega o arquivo global.js
    wp_enqueue_script(
        'agendar-horario', // identificador único
        get_site_url() .'/../js/site/wordpress-agendar-horario.js?preventCache=' . rand(), // caminho do arquivo
        array('jquery'), // dependência (se precisar do jQuery)
        '1.0', // versão (pode mudar se atualizar o arquivo)
        false // carregar no footer (true) ou header (false)
    );
}

function importarGlobalJS() {
    // registra e carrega o arquivo global.js
    wp_enqueue_script(
        'global', // identificador único
        get_site_url() .'/../js/global.js?preventCache=' . rand(), // caminho do arquivo
        array('jquery'), // dependência (se precisar do jQuery)
        '1.0', // versão (pode mudar se atualizar o arquivo)
        false // carregar no footer (true) ou header (false)
    );
}

function importarJSEspecifico() {
    global $post;
    
    $wordpress = ($post->post_name == 'blog' || $post->post_name == 'noticia' ? 'wordpress-' : '');
        
    $file = '../js/site/'. $wordpress . $post->post_name . '.js';
    $path = ABSPATH . $file;

    if (file_exists($path)) {
        $file = get_site_url() . '/'. $file . '?preventCache=' . rand();

        wp_enqueue_script('javascript', $file, array('jquery'), null, false);
    }
}


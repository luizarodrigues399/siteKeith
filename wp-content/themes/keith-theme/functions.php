<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function my_header_notification() {
    echo '<div style="background:#f00; color:#fff; padding:10px; text-align:center;">Welcome to Our Site!</div>';
}
add_action('wp_head', 'my_header_notification');
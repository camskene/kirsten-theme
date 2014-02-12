<?php
    /*
     * Small Header
     */
    function header_small_screen() {
        require get_template_directory() . '/inc/header-small-screen.php';
        die();
    }
    // creating Ajax call for WordPress
    add_action( 'wp_ajax_nopriv_header_small_screen', 'header_small_screen' );
    add_action( 'wp_ajax_header_small_screen', 'header_small_screen' );
?>
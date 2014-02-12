<?php
    /*
     * Large Header
     */
    function header_large_screen() {
        require get_template_directory() . '/inc/header-large-screen.php';
        die();
    }
    // creating Ajax call for WordPress
    add_action( 'wp_ajax_nopriv_header_large_screen', 'header_large_screen' );
    add_action( 'wp_ajax_header_large_screen', 'header_large_screen' );

    // function archive_large_screen() {
    //     global $wp_query;
    //     $ID = $wp_query->post->ID;
    //     echo $ID;
    //     get_the_image( array('post_id' => $ID, 'attachment' => true, 'image_scan' => true, 'size' => 'thumbnail', 'default_image' => 'http://kirstenrickert.com/wp-content/uploads/2011/05/IMG_7889-150x150.jpg') );
    //     die();
    // }
    // // creating Ajax call for WordPress
    // add_action( 'wp_ajax_nopriv_archive_large_screen', 'archive_large_screen' );
    // add_action( 'wp_ajax_archive_large_screen', 'archive_large_screen' );

?>
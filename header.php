<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Kirsten
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> data-ythreshold="200">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- <link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/5cdb7618-9f95-470a-84dd-5d907b7e17bf.css"/> -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
            <?php
                if ( !is_mobile() ) {
                    include('inc/header-large-screen.php');
                } else {
                    include('inc/header-small-screen.php');
                }
            ?>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container">

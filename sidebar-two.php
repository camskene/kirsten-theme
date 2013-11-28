<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Kirsten
 */
?>
	<div id="tertiary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-two' ); ?>
	</div><!-- #secondary -->

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kirsten
 */
?>
		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="hide-on-large">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="screen-reader-text skip-link"><a href="#content"><?php _e( 'Skip to content', 'kirsten' ); ?></a></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
				

				<div class="site-search">
					<?php get_search_form(); ?>
				</div>

				<ul id="menu-social">
					<li><a href="http://instagram.com/kirstenrickert" class="icon-instagram"></a></li>
					<li><a href="http://www.pinterest.com/kirstenrickert/" class="icon-pinterest"></a></li>
					<li><a href="https://www.facebook.com/Kirsten.Rickert" class="icon-facebook"></a></li>
				</ul>
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
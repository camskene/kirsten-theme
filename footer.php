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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19185701-2', 'kirstenrickert.com');
  ga('send', 'pageview');

</script>

</body>
</html>
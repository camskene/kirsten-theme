
    <div class="site-branding">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    </div>

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

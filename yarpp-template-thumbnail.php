<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<h1 class="widget-title">Related Posts</h1>
<?php if (have_posts()):?>
<ol>
	<?php while (have_posts()) : the_post(); ?>
		<li>
			<figure>
				<?php if ( function_exists( 'get_the_image' ) ) get_the_image( array( 'attachment' => true, 'image_scan' => true, 'size' => 'thumbnail', 'default_image' => 'http://kirstenrickert.com/wp-content/uploads/2011/05/IMG_7889-150x150.jpg') ); ?>
			</figure>
			<h5>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h5>
		</li>
	<?php endwhile; ?>
</ol>

<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>

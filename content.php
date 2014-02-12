<?php
/**
 * @package Kirsten
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<figure class="entry-image">
			<?php get_the_image( array( 'attachment' => false, 'image_scan' => true, 'size' => 'thumbnail', 'default_image' => 'http://kirstenrickert.com/wp-content/uploads/2011/05/IMG_7889-150x150.jpg') ); ?>
		</figure>
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php kirsten_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'kirsten' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kirsten' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<!--<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'kirsten' ) );
				if ( $categories_list && kirsten_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'kirsten' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'kirsten' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'kirsten' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'kirsten' ), __( '1 Comment', 'kirsten' ), __( '% Comments', 'kirsten' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'kirsten' ), '<span class="edit-link">', '</span>' ); ?>
	</footer> .entry-meta -->
</article><!-- #post-## -->

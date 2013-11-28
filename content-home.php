<?php
/**
 * The template used for displaying page content in home.php
 *
 * @package Kirsten
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure class="entry-image">
        <?php if ( function_exists( 'get_the_image' ) ) get_the_image( array( 'attachment' => false, 'image_scan' => true ) ); ?>
    </figure>

    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <p class="entry-meta"><?php echo get_the_category_list( __( ', ', 'kirsten' ) ); ;?></p>
    </header>

    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>
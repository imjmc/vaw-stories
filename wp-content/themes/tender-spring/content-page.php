<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package tenderSpring
 * @since tenderSpring 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">
	<div class="entry-wrapper-inner">
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<small class="postmetadata">
			<?php
			if($post->post_parent) {
				printf( __( '&laquo; <a href="%1$s" title="Parent page: %2$s">%3$s</a> | ', 'tenderSpring' ),
					esc_url( get_permalink($post->post_parent) ),
					esc_attr( get_the_title($post->post_parent) ),
					get_the_title($post->post_parent),
					esc_attr( get_the_date( ) )
				);
			}
			?>
			<?php printf( __( 'Posted on %1$s', 'tenderSpring' ),
					esc_attr( get_the_date( ) )
				);
			?>
		</small>

		<?php edit_post_link( __( 'Edit', 'tenderSpring' ), '<span class="edit-link">', '</span>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
		  $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=1');
		  if ($children) { ?>
		  <h3 class="subpages"><?php printf( __( 'Subpages', 'tenderSpring' ) ); ?></h3>
		  <ul class="subpages">
			<?php echo $children; ?>
		  </ul>
		<?php } ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tenderSpring' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	</div><!-- .entry-wrapper-inner -->
	</div><!-- .entry-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->

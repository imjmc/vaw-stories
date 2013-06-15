<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package tenderSpring
 * @since tenderSpring 1.0
 */

get_header(); ?>

		<section id="primary" class="site-content">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'tenderSpring' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php //tenderSpring_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php tenderSpring_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<div class="entry-wrapper">
					<div class="entry-wrapper-inner">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'tenderSpring' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tenderSpring' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
					</div><!-- .entry-wrapper-inner -->
					</div><!-- .entry-wrapper -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
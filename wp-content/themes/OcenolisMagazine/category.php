<?php get_header(); ?>

<?php if (get_option('swt_slider') == 'Hide') { ?>
<?php { echo ''; } ?>
<?php } else { include(TEMPLATEPATH . '/includes/slide.php'); } ?>

<div id="contentwrap">
<div class="inside">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
           <div class="comwrap">
           <?php comments_popup_link('0', '1', '%', 'comm'); ?>
           </div>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">
                 <?php if ( function_exists( 'get_the_image' ) ) {
                 get_the_image( array( 'custom_key' => array( 'post_thumbnail' ), 'default_size' => 'full', 'image_class' => 'alignleft', 'width' => '200', 'height' => '150' ) ); }
            ?>
					<?php the_content(''); ?>
				</div>
          <div class="morebg"></div><a class="more-link" href="<?php the_permalink() ?>#more">Read More</a>
			</div>


		<?php endwhile; ?>

		<div class="navigation">
        <?php
            include('includes/wp-pagenavi.php');
            if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
        ?>
		</div>

    	<?php else : ?>

    <?php endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

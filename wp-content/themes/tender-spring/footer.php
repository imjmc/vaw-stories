<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package tenderSpring
 * @since tenderSpring 1.0
 */
?>

	</div><!-- #main -->

	

</div><!-- #container -->
</div><!-- #page .hfeed .site -->
</div><!-- #containerForRightBk -->
</div><!-- #containerForLeftBk -->


<div id="footerMiddle">
	<div id="footerRight">
		<div id="footerLeft">
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<?php do_action( 'tenderSpring_credits' ); ?>
					<?php printf( __( 'Proudly powered by %1$s', 'tenderSpring' ), '<a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform" rel="generator">WordPress</a> | ' ); ?>
					<?php printf( __( 'Theme %1$s by %2$s.', 'tenderSpring' ), 'Tender Spring', '<a href="http://regretless.com/" rel="designer">Ying Zhang</a>' ); ?>
				</div><!-- .site-info -->
				<?php printf( __( '%1$s', 'tenderSpring' ), '<a id="top" href="#top">Back to top</a>' ); ?>
			</footer><!-- .site-footer .site-footer -->
		</div>
	</div>
</div>

<?php wp_footer(); ?>


</body>
</html>
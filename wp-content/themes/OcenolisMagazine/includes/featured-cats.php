<div class="side-widget">
<h3>Featured Posts</h3>
<div class="widgetin">
<?php $featured_category1 = get_option('swt_featured_category1'); $featured_number1 = get_option('swt_featured_number1'); ?>
<?php if(($featured_category1 == "Choose a category:") || ($featured_number1 == '')) { ?>
<?php { /* nothing */ } ?>
<?php } else { ?>
<div class="feat-cat-entry">
<?php
//insert your category name
$my_query = new WP_Query('category_name='. $featured_category1 . '&' . 'offset=' . '&' . 'showposts='. $featured_number1);
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID; $the_post_ids = get_the_ID();
?>
<div class="feat-cat-meta post-<?php the_ID(); ?>">
<?php get_the_image( array( 'custom_key' => array( 'fi' ), 'default_size' => 'full', 'image_class' => 'alignleft', 'width' => '51', 'height' => '49' ) ); ?>
<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
<span class="timef"><?php the_time('M d, Y'); ?></span>&nbsp;
<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'fcomm'); ?>
<div class="clearfix"></div>
</div><!-- FEAT META <?php the_ID(); ?> END -->
<?php endwhile;?>
</div><!-- FEAT CAT ENTRY END -->
<?php } ?>
</div></div>
<div class="widget-bot"></div>

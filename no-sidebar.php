<?php
/*
Template Name: Page with no sidebar
*/
?>
<?php get_header(); ?>
<div id="main">
	<div class="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if (is_attachment()) { ?>
				<p class="attachmentnav">&larr; Back to <a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php echo get_the_title($post->post_parent) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></p>
			<?php } ?>
			<div class="entry">
				<?php the_content(); ?>
				<div style="spacer"></div>
				<?php wp_link_pages('before=<p class="page-link">&after=</p>&next_or_number=number&pagelink=page %'); ?>	
			</div>
		</div>			
		<?php endwhile; ?><?php endif; ?>
	</div>
	<div class="content last">
		<div class="grid_4">
		<?php comments_template( '', true ); ?>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>
<?php
global $blog; 
$blog = true;
get_header();
global $wp_query;
?>
<div id="main">
	<div id="page-container">
		<div class="grid_3" style="margin-left: 0; margin-right: 0;" id="left-bar">
			
			<div class="content">
			<div class="post">
				<h2 class="pagetitle">Search Results for: <em><?php the_search_query(); ?></em></h2>
				<small class="date"><?php echo $wp_query->found_posts; ?> results</small>			
			</div>

			</div>
			<?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
			<div class="content">
			<div class="post">
				<small class="date"><b><?php the_time('m.d.Y') ?></b></small>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<small><b>Topic(s):</b> <?php the_category(', ') ?> <?php the_tags(' | <b>Tags:</b> ', ', ', ''); ?> <?php if ( $user_ID ) : 
				?> | <b>Modify:</b> <?php edit_post_link(); ?> <?php endif; ?>| <?php comments_popup_link('No Comments &#187;this page in the codex', '1 Comment &#187;', '% Comments &#187;'); ?></small>
				<?php echo "<p>".custom_trim_excerpt(100) . "</p>"; ?>
				<a href= "<?php the_permalink() ?>">[Continue Reading]</a>
			</div>
			</div>
			<?php comments_template(); ?>
			
			<?php endwhile; ?>
	
			<?php if (($wp_query->post_count) >= get_option('posts_per_page')) { ?>
			<div class="content last">
				<div class="post">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				</div>	
			</div>
			<?php } ?>
	
			<?php else : ?>
			<div class="content last">
				<div class="post">
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
				</div>
			</div>
			<?php endif; ?>					
		</div>
		
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
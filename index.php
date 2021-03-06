<?php
global $blog;
$blog = true;
get_header();

?>
<div id="main">
	<div id="page-container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9"  id="left-bar">
				<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

				<div class="content">
				<div class="post">
					<small class="date"><b><?php the_time('m.d.Y') ?></b></small>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					<small>
					<?php if(in_category( 'uncategorized', get_the_ID()) == false) : ?>
					Topic(s): <?php the_category(', ') ?> | <?php endif; ?>
					<?php if ( $user_ID ) :?>
					Modify: <?php edit_post_link(); ?> <?php endif; ?>
					</small>
					<?php echo "<p>" . get_post_meta(get_the_ID(), "excerpt", true) . "</p>"; ?>

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
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>

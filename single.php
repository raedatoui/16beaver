<?php
include('linkify.php');
global $blog;
$blog = true;
get_header();

?>
<div id="main">
	<div id="page-container">
		<div class="grid_3" style="margin-left: 0; margin-right: 0;" id="left-bar">
			<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

			<div class="content last">
				<div class="post">
					<small class="date"><b><?php the_time('m.d.Y') ?></b></small>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					<small>
						<?php if(in_category( 'uncategorized', get_the_ID()) == false) : ?>
						<b>Topic(s):</b> <?php the_category(', ') ?> |<?php endif; ?>
						<?php if ( $user_ID ) :?>
						<b>Modify:</b> <?php edit_post_link(); ?> | <?php endif; ?> <?php comments_popup_link('No Comments', '1 Comment &#187;', '% Comments &#187;'); ?></small>
					<?php
					$content = apply_filters ("the_content", $post->post_content);
					echo  linkify_html($content);?>
				</div>
			</div>
			<?php comments_template(); ?>

			<?php endwhile; ?>

			<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php endif; ?>

			<div id="pfiller">
				<div></div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>

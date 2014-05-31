<?php
  $klass1 = get_the_title(get_the_ID()) == "Events" ? "col-md-12 col-lg-9" : "col-xs-12 col-sm-12 col-md-9";
  get_header();
  ?>
<div id="main" class="<?php echo  get_post( $post )->post_name ?>">
  <div id="page-container">
    <div class="row">
      <div class="<?php echo  $klass1 ?>" id="left-bar">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if (is_attachment()) { ?>
          <p class="attachmentnav">&larr; Back to <a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php echo get_the_title($post->post_parent) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></p>
          <?php } ?>
          <div class="entry">
            <article>
              <?php the_content(); ?>
            </article>
            <div style="spacer"></div>
            <?php wp_link_pages('before=<p class="page-link">&after=</p>&next_or_number=number&pagelink=page %'); ?>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if (get_the_title(get_the_ID()) != "About" && get_the_title(get_the_ID()) != "Events" && get_the_ID() != 0) { ?>
        <div class="content home">
          <div class="col-xs-12 col-sm-4">
            <?php comments_template( '', true ); ?>
          </div>
        </div>
        <?php } ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>

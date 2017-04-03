<?php get_header(); ?>
<?php
		$post_id = $post->ID;
		display_quote($post_id);
    include 'marathon.php';
    ?>


<div id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <div class="entry">
      <?php if(!is_page('gallery')){the_content_gallery_stripped();} else {the_content();}

	   ?>
    </div> <!-- /.entry  -->
  </div> <!-- /#post -->
  <?php endwhile; endif; ?>

</div> <!-- /#content -->
<?php  get_sidebar(); ?>

<div class="devnote">page.php</div>
<?php get_footer(); ?>

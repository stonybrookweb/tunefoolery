<?php get_header(); ?>

<div id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <h1>
      <?php the_title(); ?>
    </h1>
    <div class="entry">
      <?php the_content('Read the rest of this entry &raquo;'); ?>
    </div>
  </div>
  <?php endwhile; else: ?>
  <h2 class="center">Not Found</h1>
  <p class="center">Sorry, but you are looking for something that isn't here.</p>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<div class="devnote">single-misc.php</div>
<?php get_footer(); ?>
<?php get_header(); ?>

<div id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <h1>
      <?php the_title(); ?>
    </h1>
    <div class="entry">
      <?php the_content('Read the rest of this entry &raquo;'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
      <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> 
      <?php $mycategory = get_the_category();
	  if ($mycategory) {
		  ?>
          Posted in <?php the_category(', '); ?>
          <?php } ?>
</p>

<div class="pagination">
    <div class="alignleft">
      <?php previous_post_link('%link', 'Previous Item') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link','Next Item ') ?>
    </div>
  </div>
  <!-- /pagination -->

    </div>
  </div>
  <?php endwhile; else: ?>
  <h2 class="center">Not Found</h1>
  <p class="center">Sorry, but you are looking for something that isn't here.</p>
  <?php endif; ?>
</div>
<div class="devnote">single.php</div>
<?php get_footer(); ?>

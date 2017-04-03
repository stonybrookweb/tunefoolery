<?php get_header(); ?>

	<div id="content" role="main">

	<?php $postcount = 0;
	if (have_posts()) : while (have_posts()) : the_post(); 
		$postcount ++;
	?>


		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<?php 
				if ($postcount <2 ) {
					?><small><?php the_time('F jS, Y') ?></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?></p>
                <?php }  else { ?>
                <div class="entry">
					<?php the_excerpt('Read more'); ?>
				</div>
				<?php } ?>
			</div>
            
            

		<?php endwhile; ?>

  <div class="pagination">
    <div class="alignleft">
      <?php previous_post_link('%link', 'Previous Item') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link','Next Item ') ?>
    </div>
  </div><!-- /pagination -->
  

	<?php else : ?>

		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<div class="devnote">index.php</div>
<?php get_footer(); ?>

<?php get_header(); ?>

	<div id="content" role="main" class="searchresults">

	<?php if (have_posts()) : ?>

		<h1>Search Results</h1>

  <div class="pagination">
    <div class="alignleft">
      <?php previous_post_link('%link', 'Previous Results') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link','Next Results ') ?>
    </div>
  </div><!-- /pagination -->


		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php
                // only bother showing time/tags/category if it's a Post
                if ($post->post_type=='post') {?>
                    <small><?php the_time('l, F jS, Y') ?></small>
                    
                    <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?></p>
                <?php } ?>
	
			</div>

		<?php endwhile; ?>

  <div class="pagination">
    <div class="alignleft">
      <?php previous_post_link('%link', 'Previous Results') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link','Next Results ') ?>
    </div>
  </div><!-- /pagination -->

	<?php else : ?>

		<h1>Nothing found. Try a different search?</h1>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<div class="devnote">search.php</div>
<?php get_footer(); ?>
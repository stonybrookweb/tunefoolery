<?php

/**
 * Template Name: Home Page
 * Description: Home page stuff and things
 *
*/

?>
<?php get_header(); ?>

	<div id="content" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<small><?php the_time('F jS, Y') ?></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_sidebar(); ?>
<div class="devnote">home.php</div>
<?php get_footer(); ?>
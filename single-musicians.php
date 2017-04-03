<?php 

	get_header(); 
	
	$format = get_post_format();
	
?>

    <div id="content" role="main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post">
        <?php	$post_id = $post->ID;?>
        <div class="post-content">
        <?php 
        if ( has_post_thumbnail() ) {
								the_post_thumbnail('medium');
							}
							else {
								echo '<img src="' . TEMPLATE_URL . '/images/blank_avatar.png" alt="avatar" />';
							} ?>
                            
                            
        <h2 class="post-title">
        <?php the_title(); ?>
        </h2>
 		<?php the_content(); ?>


          <div class="clear"></div>
        
        </div>
        <!-- /post-content -->
        
        <?php endwhile; else: ?>
        <p>
          <?php _e("We couldn't find any posts that matched your query. Please try again.", "baskerville");  
					
					?>
        </p>
        <?php endif; ?>
       
        
      </div>
      <!-- /post --> 
      
    </div>
    <!-- /content -->

<?php get_sidebar(); ?>
<?php echo '<!-- devnote: single-musicians.php-->'; ?>

<?php get_footer(); ?>

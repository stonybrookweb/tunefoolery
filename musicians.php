<?php
/*
Template Name: Musicians Home Page
*/
?>

<?php get_header(); ?>



<div class="wrapper section medium-padding">
										
	<div class="section-inner">
	
		<div class="content full-width">
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<div class="post">

			
				
					<?php if ( has_post_thumbnail() ) : ?>
						
						<div class="featured-media">
						
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							
								<?php the_post_thumbnail('post-image'); ?>
								
								<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
												
									<div class="media-caption-container">
									
										<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
										
									</div>
									
								<?php endif; ?>
								
							</a>
									
						</div> <!-- /featured-media -->
							
					<?php endif; ?>
				   				        			        		                
					<div class="post-content">
								                                        
						<?php the_content(); ?>
                        
                        <?php 
						// List all categories
						// Arguments to get
						$args = array(
									'show_option_all'    => '',
									'orderby'            => 'name',
									'order'              => 'ASC',
									'style'              => 'list',
									'show_count'         => 0,
									'hide_empty'         => 1,
									'use_desc_for_title' => 0,
									'child_of'           => 33,
									'feed'               => '',
									'feed_type'          => '',
									'feed_image'         => '',
									'exclude'            => '',
									'exclude_tree'       => '',
									'include'            => '',
									'hierarchical'       => 1,
									'title_li'           => '',
									'show_option_none'   => __( 'No categories' ),
									'number'             => null,
									'echo'               => 1,
									'depth'              => 0,
									'current_category'   => 0,
									'pad_counts'         => 0,
									'taxonomy'           => 'category',
									'walker'             => null
								); 
								
						?>
                        <div id="musician-categories" >
                        <ul>
                        <li><a href="#" class="active-category">All Genres</a></li>
						<?php wp_list_categories( $args ); ?>
                        </ul>
                        </div>
						
						<div id="outer-musicians">
						<?php
						// List all musicians
						
						// Set arguments to get from database
						$args = array(
									'posts_per_page'   => -1, // This shows all
									'offset'           => 0,
									'category'         => '',
									'orderby'          => 'rand',
									'order'            => 'rand',
									'include'          => '',
									'exclude'          => '',
									'meta_key'         => '',
									'meta_value'       => '',
									'post_type'        => 'musicians',
									'post_mime_type'   => '',
									'post_parent'      => '',
									'post_status'      => 'publish',
									'suppress_filters' => true );
						
						// Get all musicians into array		
						$myposts = get_posts( $args );
						
						//Set up empty array to add musicians
						$my_musicians =  array();
						
						//Loop through array and print
						
						
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                        
                        		  <?php 	// Get Musician Categories - here so we can use in Div and in content
											
											$categories = (get_the_category($post ->  ID));
											$separator = ', ';
											$class_separator = ' ';
											$output = '';
											$class_output = '';
											if($categories){
													foreach($categories as $category) {
														$output .= $category->slug . $separator;
														$class_output .= $category->slug . $class_separator;
													}
												
												}
									?>
                        
                 				<?php 
								
								$my_link = get_permalink($id);
								$title = the_title('', '', false);
								
								$single_musician = '<div class="all_musicians ' .  trim($class_output, $class_separator) . '" > ';
								
								$single_musician .= '<div class="musician-image"><a href="'. $my_link . '">';
								$musician_thumbnail = get_the_post_thumbnail( $post ->  ID, 'thumbnail' ); 
									if($musician_thumbnail){
										$single_musician .=  $musician_thumbnail;}
										else{
											$single_musician .=  '<img src="' . TEMPLATE_URL . '/images/blank_avatar.png" alt="avatar">';
											}
								$single_musician .= '</a>';
								
								$single_musician .= '<div class="musician-text">';
								

								
								$single_musician .= '<a href="';
								$single_musician .= $my_link;
								$single_musician .= '"><h4>';
								$single_musician .=  $title ;
								$single_musician .= '</h4></a>';
								
								/*the_content(); */ 
									//add categories from above
								$single_musician .= '<p>' . trim($output, $separator) . '</p>';
								$single_musician .= '</div>';
								$single_musician .= '</div>';
								

								$single_musician .= '</div>';
								
								array_push($my_musicians, $single_musician);
								
						endforeach;
							// End and musicians
						
						
						
						//create left div
						echo '<div id="musicians-left">';
						
						foreach ($my_musicians as $musician){
							echo $musician;
							}
						echo '</div>';
						
						
						
						
	
	
						?>

                            </div> <!--End outer-musicians -->
                            
                            
                        
						
						<?php if ( current_user_can( 'manage_options' ) ) : ?>
																								
						<?php endif; ?>
															            			                        
					</div> <!-- /post-content -->
					
									
				</div> <!-- /post -->
			
			<?php endwhile; else: ?>
			
				<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "baskerville"); ?></p>
		
			<?php endif; ?>
		
			<div class="clear"></div>
			
		</div> <!-- /content -->
				
		<div class="clear"></div>
	
	</div> <!-- /section-inner -->

</div> <!-- /wrapper -->

<script>
jQuery.noConflict();
 
jQuery( document ).ready(function( $ ) {
    // You can use the locally-scoped $ in here as an alias to jQuery.
	
	$("#musician-categories a").click(function(event) {
		//first prevent click from continiung
		event.preventDefault();
		
		//remove active category
		$('#musician-categories ul li a').removeClass('active-category');
		
		// Add active class to current category
		$(this).addClass('active-category');
		
		//next show all musicians before hiding musicians only with the clicked category
		$('.all_musicians').show();
		
		//test if "All Genres" clicked, if so do nothing, else hide all elements that don't match clicked category
		if($(this).html() != 'All Genres'){
			//Hide musicians that match clicked category
			var tf_category = $(this).html();
			// replace space and slashes with hyphens and make lower case to match to class structure
			tf_category = tf_category.replace('/','-');
			tf_category = tf_category.replace(' ','-');
			tf_category = tf_category.toLowerCase();
			console.log(tf_category);
			
			// To use variable in :not expression create the selector into a variable
			var tf_class = 'div.all_musicians:not(.' + tf_category + ')';
			$(tf_class).hide();
		
		}		
});  // end click		
}); // end ready

</script>
								
<?php get_footer(); ?>
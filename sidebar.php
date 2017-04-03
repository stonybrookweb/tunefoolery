<div id="sidebar" role="complementary">
 
 <div class="sidebar fright" role="complementary">
	
    <?php if(is_page('home')) { 
		?>
					<?php // add if statement for on home page to display current news	
                        $post_id = $post->ID;
                        //Old way before adding simple fields
						//display_sidebar_news($post_id);
						
						echo '<div class="current-news">';
						echo simple_fields_value( 'home_page_news_text',$post_id);
						echo '</div>';
                     ?>
                     
                       <div id="mc_embed_signup">
                            <form target="_blank" class="validate" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form" method="post" action="http://tunefoolery.us4.list-manage.com/subscribe/post?u=6e381d58396d21195a292c69d&amp;id=1a40727cf3">
                            <label for="mce-EMAIL">Subscribe to our mailing list</label><br>
                            <input type="email" required placeholder="email address" id="mce-EMAIL" class="email" name="EMAIL" value="">
                            <div class="clear"><input type="submit" class="button" id="mc-embedded-subscribe" name="subscribe" value="Subscribe"></div>
                            </form>
                        </div> <!-- /#mc_embed_signup -->
                     
                     
                        <div id="google_calendar">
                        
                            <iframe src="<?php echo TEMPLATE_URL; ?>/gcalendar-wrapper.php?title=Upcoming%20Performances&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%231695be&amp;src=tunefoolery.org_vhgb684e74nijp6bc0bou3oi5o%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=America%2FNew_York" style=" border-width:0 " width="300" height="400"></iframe>                  
                        </div><!-- end google_calendar -->
                        
                        
                
                

                        
                        <?php } elseif(is_page('listen')) { ?>
                        
                        <div class="cdbaby-player" style="max-width:600px;max-height:645px;min-width:180px;"><div style="position: relative;height: 0;overflow: hidden;padding-bottom:100%;padding-top:30px;"><iframe name="square" style="position:absolute;top:0px;left:0px;width:100%;height:100%;border:0px;" src="http://widget.cdbaby.com/84ecd18d-9406-4ad4-9d88-cc96a00374ad/square/dark/opaque"></iframe></div></div>
						
                        
                        <div class="cdbaby-player" style="max-width:600px;max-height:645px;min-width:180px;"><div style="position: relative;height: 0;overflow: hidden;padding-bottom:100%;padding-top:30px;"><iframe name="square" style="position:absolute;top:0px;left:0px;width:100%;height:100%;border:0px;" src="http://widget.cdbaby.com/4bd14d27-3276-4741-bd8d-9ec314ec5d5d/square/dark/opaque"></iframe></div></div>
                        
                        <div class="cdbaby-player" style="max-width:600px;max-height:645px;min-width:180px;"><div style="position: relative;height: 0;overflow: hidden;padding-bottom:100%;padding-top:30px;"><iframe name="square" style="position:absolute;top:0px;left:0px;width:100%;height:100%;border:0px;" src="http://widget.cdbaby.com/c6683f49-ee1b-4a0b-8cb3-57a9f1886c3f/square/dark/opaque"></iframe></div></div>
                        
                        
						
						
						<?php } elseif (in_array('single-musicians', get_body_class($class))){
										$post_id = $post->ID;
										display_single_musician_player($post_id);
										
						} elseif(is_page('gallery')) {
							// here we do nothing!
						
						
						} else { ?>
                        
                       <?php  
					   
					   if(get_post_gallery()){
							echo get_post_gallery();   
					   }
					   
					   ?>
                        
                        <?php }; ?>

</div><!-- /.sidebar fright -->
</div> <!-- /#sidebar -->  
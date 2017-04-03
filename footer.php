</div><!-- close #main -->
</div><!-- close #doc --> 

<div id="ft" role="contentinfo">
  <p> &copy; <?php echo date('Y'); ?> 
    Tunefoolery Music, Inc.
    &bull; 
    <a href="contact">info@tunefoolery.org</a>
    &bull;
    Find us: 
	<a href="http://www.facebook.com/tunefoolery" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>/images/icons/facebook-16.png" width="16" height="16" alt="Follow us on facebook" /></a> 
	<a href="http://twitter.com/tunefoolery" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>/images/icons/twitter-16.png" width="16" height="16" alt="Follow us on Twitter" /></a>
	
</div> <!-- /.ft -->
<div id="mobile-footer" >

<a href="tel:6176268991" id="mobile_phone">617.626.8991</a> &nbsp; 
<a href="mailto:info@tunefoolery.org?subject=Website contact&amp;" id="mobile_mailto"><img src="<?php echo TEMPLATE_URL; ?>/images/icons/icon_envelope_white_18h.png" alt="Send an email" width="27" height="18"></a>

    <div id="mobile-social">
        <a href="http://www.facebook.com/tunefoolery" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>/images/icons/facebook-icon.png"  alt="Facebook" /></a> 
        <a href="http://twitter.com/tunefoolery" target="_blank"><img src="<?php echo TEMPLATE_URL; ?>/images/icons/twitter-icon.png" alt="Twitter" /></a>
    </div>
</div>

<script>
jQuery(document).ready(
	function($) {
	// insert any code needed here.
	
	setTimeout(function(){$('#gallery-1 > a ').click();}, 1000);


	

});
</script>



<?php wp_footer(); ?>
<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-34216439-1', 'auto');
  ga('send', 'pageview');

</script>


</body></html>
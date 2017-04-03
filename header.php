<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>
<?php bloginfo( $show );
wp_title(' | ', true, 'left'); ?>

</title>



<?php 
// enqueue styles and scripts for better caching on live website.
wp_enqueue_style( 'reset',  TEMPLATE_URL . '/css/reset-min.css', '', 1,'all' );
wp_enqueue_style( 'style',  TEMPLATE_URL . '/style.css', 'reset', 1,'all' );
wp_enqueue_style( 'menu',  TEMPLATE_URL . '/menu.css', 'menu', 1,'screen' );
wp_enqueue_style( 'mobile-menu',  TEMPLATE_URL . '/css/if-mobile.css', 'style', 1,'all' );
wp_enqueue_style( 'print',  TEMPLATE_URL . '/print.css', 'print', 1,'print' );

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

<link href='https://fonts.googleapis.com/css?family=Marck+Script' rel='stylesheet' type='text/css'>

<!-- Favicons and app icons from generator -->
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


<?php
	# enqueue scripts are now in functions.php, per warning to use the wp_enqueue_scripts action
	#  see: http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	wp_head(); 
?>


<meta name="viewport" content="user-scalable=yes, initial-scale=1" />
</head>

<body <?php body_class( bodypageclass() ); ?>>

<div id="mobile-menu" class="nodesktop">
<div id="hamburger-switch"><span></span></div>
 <?php /*
   Used for mobile menu for slide down from top of screen.
   This needs to stay outside of all other elements for ease of positioning.
   Requires declaration of 'mobile; menu in functions php
 */
 
 // Use mobile menu assigned in theme locations screeen else call primary menu instead
 if(has_nav_menu('mobile')) {
	 wp_nav_menu( array( 'container_class' => 'mobile-header mobile-menu-closed','theme_location' => 'mobile','fallback_cb'=> false));
	 } else { echo wp_page_menu ( array('menu_class' => 'mobile-header mobile-menu-closed'));}
	 
?>

</div>



<div id="hd" role="banner">
  <h1><a href="<?php echo get_option('home'); ?>/">
    <?php bloginfo('name'); ?>
    </a></h1>
  <div class="description">
    <?php bloginfo('description'); ?>
  </div>
</div>
<!-- close #hd -->




<div id="access" role="navigation">
	<div id="inner-access">
  <?php /*
    Our navigation menu.  If one isn't filled out, wp_nav_menu falls
    back to wp_page_menu.  The menu assigned to the primary position is
    the one used.  If none is assigned, the menu with the lowest ID is used. 
	*/
 wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary-menu' ) ); ?>

</div>
</div>
<!-- #access -->

<div id="doc">

 <div id="donate-div"><!-- begin firstgiving donation button -->
<a href="javascript:void(0)" id="491aa36a-2023-11e0-a279-4061860da51d.80e3fd06-b849-4ec3-810d-5bfe5acc3d16" class="fg-donation-button-4ccb04fb46c30" onclick="FG_DONATE_BUTTON.openDonationWindow(this,'https://donate.firstgiving.com'); return false;" style="text-indent: -999999px; background: url('https://donate.firstgiving.com/dpa/static/img/donate_button_green-dark.png') no-repeat; width: 188px; height: 44px; display: block;"></a> <script language="javascript" type="text/javascript">function FG_4ccb04fb46c30_loadScript(){var fgScriptUrl='https://donate.firstgiving.com/dpa/static/js/site/fg_donation_opener.min.js';var script=document.createElement('script');script.type='text/javascript';if(script.readyState){script.onreadystatechange=function(){if(script.readyState=="loaded"||script.readyState=="complete"){script.onreadystatechange=null}}}else{script.onload=function(){}}script.src=fgScriptUrl;document.body.appendChild(script)}FG_4ccb04fb46c30_loadScript();</script>
<!-- end firstgiving --></div>



<div id="main">

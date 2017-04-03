<?php
/*
Template Name: Redirect (put new URL into body area)
*/
// in this situation, we just go over to a new page:
?>
<?php 
$location = '/media-tags/recent/'; 
if ($post->post_content) {
	$location = $post->post_content;
	$location = split("\n",$location);
	$location = $location[0];
}
header ('HTTP/1.1 301 Moved Permanently');
header("Location: $location");
exit;
?>
<?php
// define this constant so we don't get sloggy database queries
define('TEMPLATE_URL',get_bloginfo('template_directory'));
define('TEMPLATE_VERSION','2.1.0');
//http://codex.wordpress.org/Content_Width
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

// see http://wordpress.stackexchange.com/questions/1216/changing-the-order-of-admin-menu-sections
//require_once('wp-admin-menu-classes.php');
//add_action('admin_menu','bkjdefault_admin_menu');

function my_theme_add_editor_styles() {
	add_editor_style('editor-style.css');
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );

// you can specify some special thumbnials if you want:
set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 125, 9999 ); // Permalink thumbnail size
add_image_size( 'home-page-slider', 1280, 720, true ); // homepage slider size; note we are forcing a crop

// update to include post thumbnail for different post types: change 'committees' etc. if you have something else
add_theme_support( 'post-thumbnails', array( 'post', 'page','misc','committees','people','notes','articles','ads', 'leads', 'musicians' ) );

function my_scripts() {
	wp_enqueue_script('site', TEMPLATE_URL . "/scripts/site.js", array('jquery'), '1.0', true);
}    
 
add_action('wp_enqueue_scripts', 'my_scripts');


// from http://wpforce.com/automatically-set-the-featured-image-in-wordpress/
// force featured image

function wpforce_featured() {
          global $post;
          $already_has_thumb = has_post_thumbnail($post->ID);
		  if (!$already_has_thumb)  {
			  $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
				  if ($attached_image) {
						foreach ($attached_image as $attachment_id => $attachment) {
							set_post_thumbnail($post->ID, $attachment_id);
						}
				   }
			}
      }  //end function
/* add_action('the_post', 'wpforce_featured');
add_action('save_post', 'wpforce_featured');
add_action('draft_to_publish', 'wpforce_featured');
add_action('new_to_publish', 'wpforce_featured');
add_action('pending_to_publish', 'wpforce_featured');
add_action('future_to_publish', 'wpforce_featured');
*/



// adds support for custom fields
function get_custom_field_value($szKey, $bPrint = false) {
	global $post;
	$szValue = get_post_meta($post->ID, $szKey, true);
	if ( $bPrint == false ) return $szValue; else echo $szValue;
}


// this section registers a menu named "primary menu" using the wordpress menu function

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => 'Primary Menu',
			'mobile' => 'Mobile Menu'
		)
	);
}




// to add notes for BKJ clients, we use the "notes" Custom Field
add_filter( 'manage_pages_columns', 'add_notes_column');
function add_notes_column($cols) {

	$cols['notes'] ='notes';
	return $cols;
}
// add_action('manage_pages_custom_column',  'my_show_columns');

function my_show_columns($name) {
    global $post;
    switch ($name) {
        case 'notes':
            $mycolumn = get_post_meta($post->ID, 'notes', true);
            echo $mycolumn;
    }
}

// page slug:

function get_page_slug($page_id) {
	$pages = get_pages('include='.$page_id);
	$page = $pages[0];

	return $page->post_name;
}



// from http://codex.wordpress.org/Function_Reference/body_class
// add category nicenames in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category(@$post->ID)) as $category)
		$classes[] = 'category-' . $category->category_nicename;
	return $classes;
}
//add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');



// courtesy
// http://lorelle.wordpress.com/2007/09/06/using-wordpress-categories-to-style-posts/
function the_category_unlinked($separator = ' ') {
	$categories = (array) get_the_category();	
	$thelist = '';
	foreach($categories as $category) {    // concate
		$thelist .= $separator . $category->category_nicename;
	}
	return $thelist;

//thanks to Adam Dempsey:
// http://adamdempsey.com/2011/11/post-list-filters-for-custom-taxonomies-in-manage-posts/
function pippin_add_tag_filters() {
 	$taxonomies = array('tag');
		$tags = get_tags();
		echo "<select name='tag' id='tag' class='postform'>";
		echo "<option value=''>Show All Tags</option>";
		foreach ($tags as $tag){
			if ($tag->count == 0) {continue;}
				echo '<option value='. $tag->slug, @$_GET['tag'] == $tag->slug ? ' selected="selected"' : '','>' . $tag->name .' (' . $tag->count .')</option>'; 
			}
		echo "</select>";
}
// add_action( 'restrict_manage_posts', 'pippin_add_tag_filters' );



// styles for editor: Change if  you want some special menus in the editor

add_filter( 'tiny_mce_before_init', 'bkjdefault_mce_before_init' );

function bkjdefault_mce_before_init( $settings ) {
    $style_formats = array(
    	array(
    		'title' => 'Button',
    		'selector' => 'a',
    		'classes' => 'button'
    	),
        array(
        	'title' => 'pullquote',
        	'block' => 'div',
        	'classes' => 'pullquote',
        	'wrapper' => true
        ),
        array(
        	'title' => 'purple',
        	'inline' => 'span',
        	'classes' => 'purple',
        	'wrapper' => true
        ),
		 array(
        	'title' => 'orange',
        	'inline' => 'span',
        	'classes' => 'orange',
        	'wrapper' => true
        ),
		 array(
        	'title' => 'gold',
        	'inline' => 'span',
        	'classes' => 'gold',
        	'wrapper' => true
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

}


# is_top_level_page()
#
# Returns true if is_page() is true, and the current page has no ancestors
function is_top_level_page() {
	global $post;
	$ancestors = get_post_ancestors($post);

	return (is_page()) && (!$ancestors);
}

function get_top_level_ancestor_id($post) {
	$ancestors = get_post_ancestors($post);

	if ($ancestors) {
		#topmost ancestor is last in the array
		$section_id = intval(end($ancestors));
	} else {
		$section_id = $post->ID;
	}

	return $section_id;
}

// output a gallery
function getgallery($atts) {
	global $post;
	$output = '<div id="slideshow" class="slideshow">';
	extract(shortcode_atts(array(
		'orderby' => 'menu_order ASC, ID ASC',
		'id' => $post->ID,
		'itemtag' => 'dl',
		'icontag' => 'dt',
		'captiontag' => 'dd',
		'columns' => 3,
		'size' => 'full',
		'link' => 'file'
		), $atts));

	$args = array(
		'post_type' => 'attachment',
		'post_parent' => $id,
		'numberpost' => -1,
		'orderby' => $orderby
		);

	$images = get_posts($args);
	foreach ( $images as $image) {
		if ($image->menu_order > 0) {
			$caption = $image->post_excerpt;
			$description = $image->post_content;
			if ($description == '') {$description = $title;}
			$image_alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
			$img = wp_get_attachment_image_src($image->ID, $size);
			$output .= '<img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" />' . "\n";
			}
		}
	$output .= "</div>\n";
	return $output;
	
}

function slugify($input) {
	return str_replace(' ', '-', strtolower($input));	
}


function bodypageclass() {
	global $post;
	$post_slug = $post->post_name;
	$parent = get_page($post->post_parent);
	$parent_post_slug = $parent->post_name;
	if ($parent_post_slug==$post_slug) {$parent_post_slug = '';}
	$parent_id = $parent->ID;
	$post_type = 'outer_' . get_post_type($post->ID);
	// get some category information:
	$doc_post_category = '';
	foreach(  get_the_category($post->ID) as $catemp) {
		$doc_post_category .= ' category_' . $catemp -> category_nicename;
		}
	return "$post_slug $post_type $parent_post_slug $doc_post_category";

}
	
	
// development:

function dprint_r($x) {
	echo "<pre>\n";
	print_r($x);
	echo "</pre>";
}
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// from 
// http://wordpress.stackexchange.com/questions/6731/if-is-custom-post-type
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

 /* turn off comments menus */
 
add_action( 'admin_bar_menu', 'bkj_remove_menubar_items', 999 );
add_action( 'admin_menu', 'bkj_remove_menu_items' );
function bkj_remove_menu_items() {
	remove_menu_page('edit-comments.php');
}
	
function bkj_remove_menubar_items( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'wpseo-menu' );
}

function fix_title_widow($title) {
	$x = strrpos($title,' ');
	if ($x>0) { $title = substr($title,0,$x) . '&nbsp;' . substr($title,$x+1);}
	return $title;
}
add_filter('the_title', 'fix_title_widow');


//removes “preview & view” options from the new post and post edit admin screens
//Enter any post type you would like to remove the “view and preview” buttons from “custom post type, post, page
//http://wpsnipp.com/index.php/functions-php/hide-post-view-and-post-preview-admin-buttons/
function posttype_admin_css() {
    global $post_type;
    $post_types = array(
                        /* set post types */
                        'post',
                        'page',
                        'misc',
				    'notes',
				    'articles',
				    'artist',
				    'exhibit'
                  );
    if(in_array($post_type, $post_types))
    echo '<style type="text/css">#post-preview, #view-post-btn{display: none;}</style>';
}
add_action( 'admin_head-post-new.php', 'posttype_admin_css' );
add_action( 'admin_head-post.php', 'posttype_admin_css' );

//register_new_royalslider_files(1);
// We strip out the [gallery] shortcode and use that
// rather than doing the_content(), do the_content_gallery_stripped() instead, which echoes the content WITHOUT the gallery,
// then gives you "$mygallery" as a variable to do with as you will.
$mygallery = the_content_gallery_stripped();


// Now, when you are ready to use $mygallery, do it like this:
// get custom field, and make sure it has the royalslider code in it.
// Make sure you have the right ID number for $royalslider
// Option: you could do it as a custom field: $mygallery = get_custom_field_value('gallery');
$royalslider = 1;
if ( !strpos("x$mygallery",'royal') ) {
	$mygallery = str_replace('[gallery ','[gallery royalslider="' . $royalslider . '" ',$mygallery);
}
echo do_shortcode($mygallery);


function the_content_gallery_stripped () {
	$content = get_the_content();
	$content_shortcode_start = strpos("x$content", '[gallery');
	if ($content_shortcode_start>0) {
		$content_shortcode_start = strpos("$content", '[gallery');
		}
		else {
			$content = apply_filters('the_content', $content);
			echo $content;
			return "";
		}
	$content_shortcode_stop = strpos($content,']',$content_shortcode_start);
	$gallery_code = substr($content, $content_shortcode_start, $content_shortcode_stop - $content_shortcode_start+1);
	if($content_shortcode_start == 0) {
		$content = substr($content,$content_shortcode_stop+1);
	}
	else {
		$content = substr($content,0,$content_shortcode_start-1) . substr($content,$content_shortcode_stop+1);
		}
	$content = trim($content);
	$gallery_code = trim($gallery_code);
	$content = apply_filters('the_content', $content);
	//$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
	return $gallery_code;
}



function display_quote($post_id){
	$tune_attribution = get_post_meta( $post_id, 'quote_attribution', true);
	if ($tune_attribution){
		$tune_attribution = '<br><span id="quote-attribution">'. $tune_attribution .'</span>';
	}else { $tune_attribution = "";}
		
		
	$tune_quote = get_post_meta( $post_id, 'quote_content', true);
		if($tune_quote){ 
			echo '<div class="quote">
				<div class="quote_content">	
				<p>';
			if(!is_page('home')){echo '“';}
			echo $tune_quote;
			if(!is_page('home')){echo  '”';}
			echo  $tune_attribution;
			
			echo '</p></div> <!-- end Quote content -->
					  </div> <!-- end Quote -->';
			}
}

function display_sidebar_news($post_id){
	$tune_sidebar_news = get_post_meta( $post_id, 'sidebar_news', true);
		if($tune_sidebar_news){
			echo '<div class="current-news">';
			echo $tune_sidebar_news;
			echo '</div>';
		}
}
			
function display_single_musician_player($post_id){
	$music_player = get_post_meta( $post_id, 'music_player', true);
	if ($music_player){ echo $music_player;} 
}

			
// From wordpress set title for home page of custom front page
// https://codex.wordpress.org/Function_Reference/wp_title		
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}
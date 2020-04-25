<?php
/*
Author: Ben Beekman
URL: http://benbeekman.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/solarity.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function solarity_ahoy() {

	//Allow editor style.
	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

	// let's get language support going, if you need it
	//load_theme_textdomain( 'solarity', get_template_directory() . '/library/translation' );

	// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
	//require_once( 'library/custom-post-type.php' );

	// launching operation cleanup
	add_action( 'init', 'solarity_head_cleanup' );
	// A better title
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	// remove WP version from RSS
	add_filter( 'the_generator', 'solarity_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'solarity_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'solarity_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'solarity_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'solarity_scripts_and_styles', 999 );
	// ie conditional wrapper

	// launching this stuff after theme setup
	solarity_theme_support();

	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'solarity_register_sidebars' );

	// cleaning up random code around images
	add_filter( 'the_content', 'solarity_filter_ptags_on_images' );
	// cleaning up excerpt
	add_filter( 'excerpt_more', 'solarity_excerpt_more' );

} /* end solarity ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'solarity_ahoy' );

/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// // Thumbnail sizes
// add_image_size( 'landscape-large', 1200, 856, true );
// add_image_size( 'landscape-med', 600, 428, true );
// add_image_size( 'landscape-small', 300, 214, true );
//
// add_image_size( 'portrait-large', 856, 1200, true );
// add_image_size( 'portrait-med', 428, 600, true );
// add_image_size( 'portrait-small', 214, 300, true );
//
// add_image_size('square-lg', 500, 500, true);
// add_image_size('square-med', 300, 300, true);
// add_image_size( 'square-small', 150, 150, true );
// add_image_size( 'icon', 72, 72, true );
//
// add_filter( 'image_size_names_choose', 'solarity_custom_image_sizes' );
//
// function solarity_custom_image_sizes( $sizes ) {
// 		return array_merge( $sizes, array(
// 				'landscape-large' => __('1200px by 856px', 'solarity'),
// 				'landscape-med' => __('600px by 428px', 'solarity'),
// 				'landscape-small' => __('300px by 214px', 'solarity'),
// 				'portrait-large' => __('856px by 1200px', 'solarity'),
// 				'portrait-med' => __('300px by 500px', 'solarity'),
// 				'portrait-small' => __('150px by 250px', 'solarity'),
// 				'square-lg' => __('500px by 500px', 'solarity'),
// 				'square-med' => __('300px by 300px', 'solarity'),
// 				'square-small' => __('150px by 150px', 'solarity'),
// 				'icon' => __('72px by 72px', 'solarity')
// 		) );
// }

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
	A good tutorial for creating your own Sections, Controls and Settings:
	http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

	Good articles on modifying the default options:
	http://natko.com/changing-default-wordpress-theme-customization-api-sections/
	http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

	To do:
	- Create a js for the postmessage transport method
	- Create some sanitize functions to sanitize inputs
	- Create some boilerplate Sections, Controls and Settings
*/

function solarity_theme_customizer($wp_customize) {
	// $wp_customize calls go here.
	//
	// Uncomment the below lines to remove the default customize sections

	// $wp_customize->remove_section('title_tagline');
	// $wp_customize->remove_section('colors');
	// $wp_customize->remove_section('background_image');
	// $wp_customize->remove_section('static_front_page');
	// $wp_customize->remove_section('nav');

	// Uncomment the below lines to remove the default controls
	// $wp_customize->remove_control('blogdescription');

	// Uncomment the following to change the default section titles
	$wp_customize->get_section('colors')->title = __( 'Theme Colors', 'solarity' );
	$wp_customize->get_section('background_image')->title = __( 'Images', 'solarity' );

}

add_action( 'customize_register', 'solarity_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function solarity_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'solarity' ),
		'description' => __( 'The first (primary) sidebar.', 'solarity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'blog',
		'name' => __( 'Blog Sidebar', 'solarity' ),
		'description' => __( 'The blog sidebar.', 'solarity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'single',
		'name' => __( 'Single Sidebar', 'solarity' ),
		'description' => __( 'The single post sidebar.', 'solarity' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	/*
	Reference the banner sidebar with sidebar-banner.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function solarity_comments( $comment, $args, $depth ) {
	 $GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
		<article  class="cf">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'solarity' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'solarity' ),'  ','') ) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'solarity' )); ?> </a></time>

			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'solarity' ); ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content cf">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
		</article>
	</div>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function solarity_fonts() {
	wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Droid+Sans:400,700');
}

add_action('wp_enqueue_scripts', 'solarity_fonts');

// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );



function pluralize($count, $singular, $plural = false) //pluralize a word if count value other than 1 (i.e. Installation(s))
{
   if (!$plural) $plural = $singular . 's';

  return ($count == 1 ? $singular : $plural) ;
}


//Make embedded Vimeo and other videos bigger (screen size permitting)
add_filter( 'embed_defaults', 'bigger_embed_size' );

function bigger_embed_size() {
 return array(	 'width' => 960,
 		'height' => 530,
 	);
}

function the_featured_image_caption() { //display featured image caption with the_post_thumbnail_caption();
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

function my_acf_format_value_for_api($value, $post_id, $field){
    return str_replace( ']]>', ']]>', apply_filters( 'the_content', $value) );
}

function my_on_init(){
    if(!is_admin()){
        remove_all_filters('acf/format_value_for_api/type=wysiwyg');
        add_filter('acf/format_value_for_api/type=wysiwyg', 'my_acf_format_value_for_api', 10, 3);
    }
}
add_action('init', 'my_on_init');

function after_more($content) {
	global $post;
	$content = $post->post_excerpt;

	// return only the content after the more tag
	$morestring = '<!--more-->';
	$explodemore = explode($morestring, $post->post_content);
	$aftermore = $explodemore[1];
	// Make sure to return the content
	$content = $aftermore;
	return $content;
}

add_filter( 'after_more', 'wpautop' ); //apply the content filter to the after_more() output


function sort_chronologically() { //sort only the sustainability section in chronological order
	if (is_category('climate-change-sustainability')) {
		// WP_Query arguments
		$args = array (
			'cat'                    => '14',
			'order'                  => 'ASC', //newest at the bottom
			'orderby'                => 'date' //sorted by date
		);
	}
}


function breadcrumbs_and_social_buttons() { ?>
	<?php if (function_exists('synved_social_share_markup')) { ?><div class="alignright">
	<?php echo synved_social_share_markup();?></div><?php } ?>
	<?php #Breadcrumbs via Yoast SEO plugin ?>
	<?php if ( function_exists('yoast_breadcrumb') )
	{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
<?php }



//enqueuing custom scripts and styles for the templates that use them only
function enqueue_front_page() { //the slideshow called only on the home page
	if( is_front_page() ) {
		wp_register_script('jquery-fullscreenr', get_stylesheet_directory_uri() . '/library/js/libs/jquery.fullscreenr.js', array('jquery'));

		wp_enqueue_script('jquery-fullscreenr');
	}

	// 	//enqueue supersized styles
	// 	 wp_register_style( 'supersized-css', get_stylesheet_directory_uri() . '/supersized/css/supersized.min.css', array(), '2.0.1');
	// 	 wp_enqueue_style('supersized-css');
	//              wp_register_style( 'supersized-shutter-css', get_stylesheet_directory_uri() . '/supersized/theme/supersized.shutter.min.css', array(), '2.0.1');
	//              wp_enqueue_style('supersized-shutter-css');


		//enqueue supersized scripts
		// wp_register_script('jquery-easing', get_stylesheet_directory_uri() . '/supersized/js/jquery.easing.min.js', array('jquery'));
		// wp_register_script ('supersized', get_stylesheet_directory_uri() . '/supersized/js/supersized.3.2.7.min.js', array('jquery'), 1, TRUE);
		// wp_register_script ('supersized-shutter', get_stylesheet_directory_uri() . '/supersized/theme/supersized.shutter.min.js', array('jquery'), 1, TRUE);
		// wp_register_script ('supersized-json', get_stylesheet_directory_uri() . '/supersized/supersized-json.js', array('jquery'), 1, TRUE);
		//
		// wp_enqueue_script('jquery-easing');
		// wp_enqueue_script ( 'supersized' );
		// wp_enqueue_script ( 'supersized-shutter' );
		// wp_enqueue_script ( 'supersized-json' );
}

function enqueue_single_gallery() { //map-related JS called only on single gallery pages
	if (has_post_format('gallery') ) {
		wp_register_script ('gmaps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'), 1, TRUE);
		wp_register_script ('gmaps-bgb', get_stylesheet_directory_uri() . '/library/js/gmaps.js', array('jquery'), 1, TRUE);
		wp_enqueue_script( 'gmaps-api' );
		wp_enqueue_script( 'gmaps-bgb' );
	}
}
//* DON'T DELETE THIS CLOSING TAG */ ?>

<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.min.js?v=846531254542', array( 'jquery', ), '', false, true );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css?v=846531254542', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
	}

	// Add featured images to posts and pages
	add_theme_support( 'post-thumbnails', array('post') );
	set_post_thumbnail_size( 80, 80, true ); // default Post Thumbnail dimensions (cropped)
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size('grande', 768, 9999);
    add_image_size('small', 512, 9999);
    add_image_size('small-crop', 512, 512, true);
		add_image_size('smaller', 256, 9999);
		add_image_size('smaller-crop', 256, 256, true);
		add_image_size('compact', 128, 9999);
	}

    function new_excerpt_more($more) {
    	return '&hellip;';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

  require_once('post_types/work.php');
  require_once('post_types/colouring_submission.php');

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'millie_work'
    ));
    return $query;
  }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

@ini_set( 'upload_max_size' , '5M' );
@ini_set( 'post_max_size', '5M');
@ini_set( 'max_execution_time', '300' );

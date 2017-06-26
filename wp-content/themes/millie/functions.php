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
    add_image_size('cinema', 2048, 9999);
    add_image_size('desktop', 1600, 9999);
    add_image_size('laptop', 1200, 9999);
    add_image_size('grande', 768, 9999);
    add_image_size('grande-crop', 768, 768, true);
    add_image_size('small', 512, 9999);
    add_image_size('small-crop', 512, 512, true);
		add_image_size('smaller', 256, 9999);
		add_image_size('smaller-crop', 256, 256, true);
		add_image_size('compact', 128, 9999);
	}

// Remove max_srcset_image_width.
function remove_max_srcset_image_width( $max_width ) {
 return false;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

    function new_excerpt_more($more) {
    	return '&hellip;';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

  require_once('post_types/work.php');
  require_once('post_types/creature.php');
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

// add_action("pre_get_posts", "custom_front_page");
// function custom_front_page($wp_query){
//     //Ensure this filter isn't applied to the admin area
//     if(is_admin()) {
//         return;
//     }

//     if($wp_query->get('page_id') == get_option('page_on_front')):

//         $wp_query->set('post_type', 'millie_work');
//         $wp_query->set('page_id', ''); //Empty

//         //Set properties that describe the page to reflect that
//         //we aren't really displaying a static page
//         $wp_query->is_page = 0;
//         $wp_query->is_singular = 0;
//         $wp_query->is_post_type_archive = 1;
//         $wp_query->is_archive = 1;

//     endif;

// }

// Widont
function widont($str = '')
{
  return preg_replace( '|([^\s])\s+([^\s]+)\s*$|', '$1&nbsp;$2', $str);
}

add_filter( 'wp_image_editors', 'change_graphic_lib' );
function change_graphic_lib($array) {
 return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}

// Show pending submissions
add_filter( 'add_menu_classes', 'show_pending_number');
function show_pending_number( $menu ) {
    $type = "colouring_submission";
    $status = "pending";
    $num_posts = wp_count_posts( $type, 'readable' );
    $pending_count = 0;
    if ( !empty($num_posts->$status) )
        $pending_count = $num_posts->$status;

    // build string to match in $menu array
    if ($type == 'post') {
        $menu_str = 'edit.php';
    } else {
        $menu_str = 'edit.php?post_type=' . $type;
    }

    // loop through $menu items, find match, add indicator
    foreach( $menu as $menu_key => $menu_data ) {
        if( $menu_str != $menu_data[2] )
            continue;
        $menu[$menu_key][0] .= " <span class='update-plugins count-$pending_count'><span class='plugin-count'>" . number_format_i18n($pending_count) . '</span></span>';
    }
    return $menu;
}

// Hide all image uploads from media gallery
// http://wordpress.stackexchange.com/questions/231165/how-to-hide-cpt-files-from-media-library-programmatically
function create_hidden_taxonomy() {
    register_taxonomy(
        'hidden_taxonomy',
        'attachment',
        array(
            'label' => __( 'Hidden Attachment Taxonomy' ),
            'public' => false, // it's hidden!
            'rewrite' => false,
            'hierarchical' => false,
        )
    );
}
add_action( 'init', 'create_hidden_taxonomy' );

function tomjn_add_term( $post_id, \WP_Post $p, $update ) {

    if ( 'attachment' !== $p->post_type ) {
        return;
    }
    if ( wp_is_post_revision( $post_id ) ) {
        return;
    }
    if ( $post->post_parent ) {
        $excluded_types = array( 'colouring_submission' );
        if ( in_array( get_post_type( $p->post_parent ), $excluded_types ) ) {
            return;
        }
    }
    $result = wp_set_object_terms( $post_id, 'show_in_media_library', 'hidden_taxonomy', false );
    if ( !is_array( $result ) || is_wp_error( $result ) ) {
        wp_die( "Error setting up terms") ;
    }
}
add_action( 'save_post', 'tomjn_add_term', 10, 2 );

add_action( 'pre_get_posts' , 'assets_hide_media' );

/**
 * Only show attachments tagged as show_in_media_library
 **/
function assets_hide_media( \WP_Query $query ){
    if ( !is_admin() ) {
        return;
    }
    global $pagenow;
    if ( 'upload.php' != $pagenow && 'media-upload.php' != $pagenow ) {
        return;
    }

    if ( $query->is_main_query() ) {
        $query->set('hidden_taxonomy', 'show_in_media_library' );
    }

    return $query;
}

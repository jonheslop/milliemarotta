<?
/* https://generatewp.com/post-type/ */
// Register Custom Post Type
function register_submission_post_type() {

  $labels = array(
    'name'                  => _x( 'Submission', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Submission', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Submission', 'text_domain' ),
    'name_admin_bar'        => __( 'Submission Post Type', 'text_domain' ),
    'archives'              => __( 'Submission Archives', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'All submissions', 'text_domain' ),
    'add_new_item'          => __( 'Add New submission', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Item', 'text_domain' ),
    'edit_item'             => __( 'Edit Item', 'text_domain' ),
    'update_item'           => __( 'Update Item', 'text_domain' ),
    'view_item'             => __( 'View Item', 'text_domain' ),
    'search_items'          => __( 'Search Item', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Submission', 'text_domain' ),
    'description'           => __( 'Colouring submissions', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor',),
    'taxonomies'            => array( 'colouring_book', 'post_tag' ),
    'hierarchical'          => false,
    'rewrite' => array('slug' => 'colouring-galleries', 'with_front' => true),
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'colouring_submission', $args );

}
add_action( 'init', 'register_submission_post_type', 0 );

function themes_taxonomy() {  
    register_taxonomy(  
        'colouring_book',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'colouring_submission',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Colouring Book',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'colouring-book', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'themes_taxonomy');
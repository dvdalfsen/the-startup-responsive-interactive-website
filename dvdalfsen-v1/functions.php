<?php 

// create custom post type

add_action( 'init', 'custom_post_types' );
function custom_post_types() {
	function create_post_type($name, $slug = '') {
		$slug = $slug === '' ? strtolower($name) : $slug;
		register_post_type( $name,
			array(
			'labels'                => array(
				'name'                => $name,
				'singular_name'       => $name,
				'menu_name'           => $name,
				'add_new'             => 'New',
				'add_new_item'        => 'New',
				'new_item'            => 'New',
				'edit'                => 'Edit',
				'edit_item'           => 'Edit',
				'view'                => 'View',
				'view_item'           => 'View',
				'search_items'        => 'Search',
				'not_found'           => 'Not found',
				'not_found_in_trash'  => 'Not found in trash',
			),
			'public'                => true,
			'menu_position'         => 10,
			'taxonomies'			=> array( 'category' ),
			'supports'           	=> array( 'title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
			'show_in_rest' 			=> true,
			'rewrite'               => array('slug' => $slug),
			)
		);
	}
	
	create_post_type('Routes', 'routes'); // to edit url/slug, add second parameter
	


}

// remove default post type

add_action( 'admin_menu', 'remove_post_type' );
function remove_post_type(){
	remove_menu_page( 'edit.php' );
}

// write to console
function console_log($output, $with_script_tags = true) {
	$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
	if ($with_script_tags) {
		$js_code = '<script>' . $js_code . '</script>';
	}
	echo $js_code;
}

// add_action('wp_enqueue_scripts', 'adding_styles', 999 );	
// function adding_styles() {
// 	wp_enqueue_style('style', get_template_directory_uri() . filemtime( get_stylesheet_directory() . '/css/style.min.css' ) );
// }

function additional_custom_styles() {

    /*Enqueue The Styles*/
    wp_enqueue_style( 'uniquestylesheetid', get_template_directory_uri() . '/css/style.css' ); 
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

?>
<?php
remove_action('wp_head','wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
foreach ( array( 'rss2_head', 'commentsrss2_head', 'rss_head', 'rdf_header',
	'atom_head', 'comments_atom_head', 'opml_head', 'app_head' ) as $action ) {
	if ( has_action( $action, 'the_generator' ) )
		remove_action( $action, 'the_generator' );
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
 	wp_deregister_script('jquery');
	wp_deregister_script( 'wp-embed' );
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );



function custom_menu_page_removing() {
  remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit.php?post_type=page' );
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'link-manager.php' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' );


/**
 * Only from certain origins
 */
add_action( 'rest_api_init', function() {

	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {

		$origin = get_http_origin();
		if ( $origin && in_array( $origin, array(
				'http://localhost:8080',
				'http://www.bropublishing.com'
			) ) ) {
			header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $origin ) );
			header( 'Access-Control-Allow-Methods: GET' );
			header( 'Access-Control-Allow-Credentials: true' );
		}

		return $value;

	});
}, 15 );



/*-------------------------------------------*/
/*	Custom post type _ news
/*-------------------------------------------*/
add_post_type_support( 'news', 'front-end-editor' );

add_action( 'init', 'jul_news_create_post_type', 0 );
function jul_news_create_post_type() {
 $Label = 'News';
 register_post_type( 'news', /* post-type */
 array(
   'labels' => array(
   'name' => $Label,
   'singular_name' => $Label
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'show_in_rest' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
}

/*-------------------------------------------*/
/*	Custom post type _ projects
/*-------------------------------------------*/
add_post_type_support( 'issues', 'front-end-editor' );

add_action( 'init', 'jul_issues_create_post_type', 0 );
function jul_issues_create_post_type() {
 $Label = 'Issues';
 register_post_type( 'issues', /* post-type */
 array(
   'labels' => array(
   'name' => $Label,
   'singular_name' => $Label
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'show_in_rest' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
}

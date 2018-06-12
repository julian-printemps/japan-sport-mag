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
	// remove_menu_page( 'edit.php?post_type=page' );
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'link-manager.php' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' );


/*
** Set REST API
*/
add_action( 'rest_api_init', function() {

	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {

		$origin = get_http_origin();
		if ( $origin && in_array( $origin, array(
			'http://localhost:8080'
		) ) ) {
			header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $origin ) );
			header( 'Access-Control-Allow-Methods: GET' );
			header( 'Access-Control-Allow-Credentials: true' );
		}

		return $value;
	});

	register_rest_route( 'japan-sports-mag/v1', '/send-email', array(
		'methods' => 'POST',
		'callback' => 'send_email_func',
	) );

	register_rest_route( 'japan-sports-mag/v1', '/subscribe', array(
		'methods' => 'POST',
		'callback' => 'subscribe_func',
	) );
}, 15 );



/*-------------------------------------------*/
/*	Custom post type _ news
/*-------------------------------------------*/
// add_post_type_support( 'news', 'front-end-editor' );
//
// add_action( 'init', 'jul_news_create_post_type', 0 );
// function jul_news_create_post_type() {
// 	$Label = 'News';
// 	register_post_type( 'news', /* post-type */
// 	array(
// 		'labels' => array(
// 			'name' => $Label,
// 			'singular_name' => $Label
// 		),
// 		'public' => true,
// 		'menu_position' =>5,
// 		'has_archive' => true,
// 		'show_in_rest' => true,
// 		'supports' => array('title','editor','excerpt','thumbnail','author')
// 	)
// );
// }

/*-------------------------------------------*/
/*	Custom post type _ stories
/*-------------------------------------------*/
add_post_type_support( 'stories', 'front-end-editor' );

add_action( 'init', 'jul_stories_create_post_type', 0 );
function jul_stories_create_post_type() {
	$Label = 'Stories';
	register_post_type( 'stories', /* post-type */
	array(
		'labels' => array(
			'name' => $Label,
			'singular_name' => $Label
		),
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array('title','editor','excerpt','thumbnail','author')
	)
);
}


/*-------------------------------------------*/
/*	Custom post type _ partners
/*-------------------------------------------*/
add_post_type_support( 'partners', 'front-end-editor' );

add_action( 'init', 'jul_partners_create_post_type', 0 );
function jul_partners_create_post_type() {
	$Label = 'Partners';
	register_post_type( 'partners', /* post-type */
		array(
			'labels' => array(
				'name' => $Label,
				'singular_name' => $Label
			),
			'public' => true,
			'menu_position' => 5,
			'has_archive' => true,
			'show_in_rest' => true,
			'supports' => array('title','editor','excerpt','thumbnail','author')
		)
	);
	// Add information category
	register_taxonomy(
		'partners-tag',
		'partners',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => _x('Category','admin menu'),
			'singular_label' => _x('Category','admin menu'),
			'public' => true,
			'show_in_rest' => true,
			'show_ui' => true
		)
	);
}


/*-------------------------------------------*/
/*	Custom post type _ issues
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





add_action('phpmailer_init','send_smtp_email');
function send_smtp_email( $phpmailer )
{
	$phpmailer->isSMTP();
	$phpmailer->Host       = SMTP_HOST;
	$phpmailer->SMTPAuth   = SMTP_AUTH;
	$phpmailer->Port       = SMTP_PORT;
	$phpmailer->Username   = SMTP_USER;
	$phpmailer->Password   = SMTP_PASS;
	$phpmailer->SMTPSecure = SMTP_SECURE;
	$phpmailer->From       = SMTP_FROM;
	$phpmailer->FromName   = SMTP_NAME;
}


function send_email_func( WP_REST_Request $request ) {
	$to = 'julian.printemps@gmail.com';
	$subject = 'Subscription';
	$body = 'New subscription';
	$email = $request['email'];
	$name = $request['name'];
	$headers = array(
		'MIME-Version: 1.0',
		'Content-Type: text/html; charset=UTF-8'
	);
	wp_mail( $to, $subject, $body, $headers );
	return 'Mail sent';
}


function subscribe_func( WP_REST_Request $request ) {
	$data = [
  	'email'     => $request['email'],
    'status'    => 'subscribed',
    'firstname' => $request['firstname'],
    'lastname'  => $request['lastname'],
	];
	syncMailchimp($data);
}

function syncMailchimp($data) {
	$apiKey = '9304710d5dec14c7a61bec4086033b0a-us18';
  $listId = '7a83639333';

	$memberId = md5(strtolower($data['email']));
  $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
  $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

	$json = json_encode([
    'email_address' => $data['email'],
    'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
    'merge_fields'  => [
        'FNAME'     => $data['firstname'],
        'LNAME'     => $data['lastname']
    ]
  ]);

	$ch = curl_init($url);

  curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

  $result = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  return $httpCode;
}

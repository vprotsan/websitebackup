<?php
//add_filter('acf/settings/show_admin', '__return_false');
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('TEMPLATE_DIRECTORY_URI', get_theme_file_uri());
define('TEMPLATE_DIRECTORY_PATH', dirname(__FILE__));
define('SITE_NAME_DESCR', get_bloginfo('name') . ' - ' . get_bloginfo('description'));

include( TEMPLATE_DIRECTORY_PATH . '/classes/drop_menu.php' );
include( TEMPLATE_DIRECTORY_PATH . '/classes/dash_menu.php' );
include( TEMPLATE_DIRECTORY_PATH . '/rad-api/class-rad-api.php' );

add_filter( 'widget_text', 'do_shortcode');
add_filter( 'the_generator', '__return_null' );

remove_action( 'wp_head', 'wp_generator' );

add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

register_nav_menus(
					array(
							'dash' => 'Dashboard Navigation',
							'userdrop' => 'User Drop',
							'updates' => 'Updates page',
							'legal' => 'Legal page'
							)
				);

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action( 'after_setup_theme', 'rad_after_setup_theme' );
function rad_after_setup_theme() {
	add_theme_support( 'woocommerce' );

    $image_sizes_arr = array(
								'thumbnail_14x14'	=>	array(14, 14, true),
								'thumbnail_128x128'	=>	array(128, 128, true)
							);
	foreach($image_sizes_arr as $key => $val){
		add_image_size( $key, $val[0], $val[1], $val[2] );
	}
}

/*
*	[email]admin@local.com[/email]
*/
add_shortcode( 'email', 'theme_email' );
function theme_email( $atts, $content ) {
	return antispambot( $content );
}

/*
*	<img alt="" src="[template-url]/images/img.jpg">
*/
add_shortcode( 'template-url', 'theme_template_url' );
function theme_template_url( $text ) {
	return TEMPLATE_DIRECTORY_URI;
}

/*
*	<a href="[site-url]">home</a>
*/
add_shortcode( 'site-url', 'theme_site_url' );
function theme_site_url( $text ) {
	return home_url();
}

add_filter( 'nav_menu_css_class', 'change_menu_classes' );
function change_menu_classes( $css_classes ) {
	return str_replace( array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' ), 'active', $css_classes );
}

add_action( 'wp_enqueue_scripts', 'rad_scripts_styles' );
function rad_scripts_styles() {
	wp_enqueue_script( 'awesomplete-js', TEMPLATE_DIRECTORY_URI . '/js/awesomplete.js', array( 'jquery' ) );
	wp_enqueue_script( 'tab-custom-js', TEMPLATE_DIRECTORY_URI . '/js/tab.js', array( 'jquery' ) );
	wp_enqueue_script( 'nice-select-js', TEMPLATE_DIRECTORY_URI . '/js/jquery.nice-select.js', array( 'jquery' ) );
	wp_enqueue_script( 'theme-script', TEMPLATE_DIRECTORY_URI . '/js/jquery.main.js', array( 'jquery' ) );
	wp_enqueue_script( 'theme-custom-js', TEMPLATE_DIRECTORY_URI . '/js/custom.js', array( 'jquery' ) );

	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array() );
	wp_enqueue_style( 'bootstrap-css', TEMPLATE_DIRECTORY_URI . '/css/bootstrap.min.css', array() );
	wp_enqueue_style( 'awesomplete-css', TEMPLATE_DIRECTORY_URI . '/css/awesomplete.css', array() );
	wp_enqueue_style( 'theme-main', TEMPLATE_DIRECTORY_URI . '/css/main.css', array() );
	wp_enqueue_style( 'marketing-theme-style', TEMPLATE_DIRECTORY_URI . '/css/marketing.css', array() );

	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('theme-style') );
	wp_enqueue_style( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ) );
}

/*
 *	ACF - Add option page
*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('General options');
}

/*
 *	ACF - Google Map API Key
*/
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	acf_update_setting('google_api_key', '  ');
}

/*
 *	Contact Form 7 - form class filter
*/
add_filter( 'wpcf7_form_class_attr', 'rad_wpcf7_form_class_attr' );
function rad_wpcf7_form_class_attr( $class ) {
	return $class . ' contact_form';
}

/*
 *	WooCom default image src
*/
add_filter( 'woocommerce_placeholder_img_src', 'rad_woocommerce_placeholder_img_src' );
function rad_woocommerce_placeholder_img_src(){
    return TEMPLATE_DIRECTORY_URI . '/images/logo.png';
}

/*
 *	prepare phone for href attr
*/
function call_phone($phone){
	return str_replace(
						array(',', '.', ' ', '-', '(', ')'),
						'',
						$phone
					);
}

/*
 *	content filters and shortcodes for text
*/
function apply_content_filters_shortcodes($content){
	return apply_filters( 'the_content', do_shortcode($content) );
}

function rad_param_security($item){
	return htmlspecialchars(strip_tags(trim($item)));
}

add_filter( 'body_class', 'rad_body_class' );
function rad_body_class( $classes ) {
    if (
			is_page_template( 'pages/registration.php' ) or
			is_page_template( 'pages/login.php' ) or
			is_page_template( 'pages/lostpass.php' )
		) {
        $classes[] = 'registration';
    }
    return $classes;
}

/*	woocommerce	*/
add_filter( 'woocommerce_add_to_cart_redirect', 'rad_woocommerce_add_to_cart_redirect' );
function rad_woocommerce_add_to_cart_redirect($url){
	global $woocommerce;
    return $woocommerce->cart->get_checkout_url();
}

add_action('woocommerce_payment_complete_order_status_completed',	'rad_woocommerce_payment_complete');
add_action('woocommerce_payment_complete',							'rad_woocommerce_payment_complete');
function rad_woocommerce_payment_complete($order_ID){
	$order = new WC_Order( $order_ID );

	$order_user = $order->get_user();
	$user_acf_ID = 'user_' . $order_user->ID;
	$user_credits = get_field('credits', $user_acf_ID);

    $order_items = $order->get_items();
    foreach ($order_items as $item) {
		$prod_credits = get_field('credits', $item['product_id']);
		if($prod_credits) {
			update_field( 'field_59186b44992c0', $user_credits + $prod_credits, $user_acf_ID );
		}
    }
}

add_action('wp_logout','rad_logout_redirect');
function rad_logout_redirect(){
    wp_redirect( home_url() );
    exit;
}

add_action( 'wp_login_failed', 'rad_wp_login_failed' );
function rad_wp_login_failed( $username ) {
	wp_redirect( add_query_arg(array('fail' => '1'), get_field('login_page', 'option')) );
	exit;
}

add_filter('woocommerce_account_payment_methods_columns', 'rad_woocommerce_account_payment_methods_columns');
function rad_woocommerce_account_payment_methods_columns(){
		return array(
		        'method' => __( 'Method', 'woocommerce' ),
		        'expires' => __( 'Expires', 'woocommerce' ),
		        'actions' => __( 'Edit', 'woocommerce' )
		 );
}

add_filter( 'woocommerce_my_account_my_orders_columns', 'rad_woocommerce_my_account_my_orders_columns' );
function rad_woocommerce_my_account_my_orders_columns($columns){
	$columns['order-actions'] = 'invoice';
	return $columns;
}

add_filter( 'wpo_wcpdf_myaccount_button_text', 'rad_wpo_wcpdf_myaccount_button_text' );
function rad_wpo_wcpdf_myaccount_button_text(){
	return 'Download';
}

add_filter( 'woocommerce_account_menu_items', 'rad_woocommerce_account_menu_items');
function rad_woocommerce_account_menu_items($items){
	$new_items['edit-account'] = 'My profile';
	$new_items['orders'] = 'My transactions';
	$new_items['payment-methods'] = 'Payment method';
	$new_items['edit-address/billing'] = 'Billing address';
	return $new_items;
}

add_filter( 'woocommerce_order_item_permalink', 'rad_woocommerce_order_item_permalink');
function rad_woocommerce_order_item_permalink(){
	return '';
}

add_filter( 'woocommerce_my_account_my_orders_actions', 'rad_woocommerce_my_account_my_orders_actions', 10, 2 );
function rad_woocommerce_my_account_my_orders_actions($actions, $order){
	unset($actions['view']);
	return $actions;
}

add_filter( 'woocommerce_checkout_fields' , 'rad_woocommerce_checkout_fields' );
function rad_woocommerce_checkout_fields( $fields ) {
	unset($fields['billing']['billing_first_name']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_email']);
	unset($fields['billing']['billing_city']);
	return $fields;
}

//removing phone field
add_filter( 'woocommerce_billing_fields' , 'custom_remove_phone_fields' );

function custom_remove_phone_fields( $fields ) {
  unset($fields['billing_phone']);
  return $fields;
}
//end

add_filter('upload_mimes', 'rad_upload_mimes');
function rad_upload_mimes($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter( 'the_title', 'rad_the_title');
function rad_the_title( $title) {
	if ( is_wc_endpoint_url() && in_the_loop() ) {
		$title = 'Account Settings';
	}
	return $title;
}

add_action( 'woocommerce_save_account_details', 'rad_woocommerce_save_account_details' );
function rad_woocommerce_save_account_details($user_id){
	$industry = $platforms = $environment = $affiliation = array();
	$industry_buf = $platforms_buf = $environment_buf = $affiliation_buf = array();

	$industry_buf = array_map('trim', explode(',', $_POST['industry']));
	foreach($industry_buf as $item){
		$industry[] = array('field_590e3eed18f2d' => $item);
	}

	$platforms_buf = array_map('trim', explode(',', $_POST['platforms']));
	foreach($platforms_buf as $item){
		$platforms[] = array('field_590e3f0c18f2f' => $item);
	}

	$environment_buf = array_map('trim', explode(',', $_POST['environment']));
	foreach($environment_buf as $item){
		$environment[] = array('field_590e3f1718f31' => $item);
	}

	$affiliation_buf = array_map('trim', explode(',', $_POST['affiliation']));
	foreach($affiliation_buf as $item){
		$affiliation[] = array('field_590e355122d92' => $item);
	}

	$acf_uid = 'user_' . $user_id;
	update_field( 'field_590e3eed18f2c', $industry, $acf_uid );
	update_field( 'field_590e3f0c18f2e', $platforms, $acf_uid );
	update_field( 'field_590e3f1718f30', $environment, $acf_uid );
	update_field( 'field_590e2aa165a1c', $affiliation, $acf_uid );
}

add_action('init', 'makelogout', 1);
function makelogout(){
	if(isset($_GET['makelogout'])){
		wp_destroy_current_session();
		wp_clear_auth_cookie();
		wp_safe_redirect( wp_lostpassword_url() );
		exit();
	}
}
/*	end woocommerce	*/

add_action('init', 'rad_sign_func', 11);
function rad_sign_func(){
	/*
	*	Update acene
	*/
	if ( isset( $_POST['edit_sceme_field'] ) and wp_verify_nonce( $_POST['edit_sceme_field'], 'edit_sceme_action' ) ) {

		$post_ID = absint($_POST['postid']);
		$scene = esc_attr(strip_tags($_POST['scene-text']));
		$notes = esc_attr(strip_tags($_POST['notes-text']));

		$maybe_post = get_post($post_ID);
		if($maybe_post->ID){
			$my_post = array(
				'ID'			=> $post_ID,
				'post_content'	=> $notes,
				'post_excerpt'	=> $scene,
			);
			wp_update_post( $my_post );
		}

		header('Content-Type: application/json');
		$return_arrat = array(
								'content' => "{$notes}",
								'excerpt' => "{$scene}"
							);
		echo json_encode( $return_arrat );
		die();
	}


	/*
	*	User registstation -> make user login -> redirect to second
	*/
	if (
		isset( $_POST['rad_signup'] ) and
		wp_verify_nonce( $_POST['rad_reg_field'], 'rad_reg' ) and
		isset($_POST['email']) and
		filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
		) {

		if ( !email_exists($_POST['email']) ) {
			$random_password = wp_generate_password();
			$user_id = wp_create_user( $_POST['email'], $random_password, $_POST['email'] );

			$free_credits = get_field('free_credits', 'option');
			if(!$free_credits) $free_credits = 10;
			update_field( 'field_59186b44992c0', $free_credits, 'user_'.$user_id );

			wp_signon( array('user_login' => $_POST['email'], 'user_password' => $random_password, 'remember' => true) );

			wp_safe_redirect( get_field('registration', 'option') );
			exit();

		} else {
			$random_password = 'User already exists.';
		}

	}

	/*
	*	User 2nd registration step
	*/
	if (
		isset( $_POST['rad_signup_2'] ) and
		wp_verify_nonce( $_POST['rad_reg_field_2'], 'rad_reg_2' ) and
		isset($_POST['fname']) and
		isset($_POST['lname']) and
		isset($_POST['pass'])
		) {

		$current_user = wp_get_current_user();
		if ( $current_user->ID ) {
			$fname = rad_param_security($_POST['fname']);
			$lname = rad_param_security($_POST['lname']);

			// Adding email to AC mailing list #1 {
			require_once( TEMPLATE_DIRECTORY_PATH . '/ac-api/ActiveCampaign.class.php' );
			$ac = new ActiveCampaign(get_field('ac_url', 'option'), get_field('ac_key', 'option'));
			if(absint($ac->credentials_test())){
				$contact = array(
					"email"             => $current_user->data->user_email,
					"first_name"        => $fname,
					"last_name"         => $lname,
					"p[1]"				=> 1,
					"status[1]"			=> 1	// "Active" status
				);

				$contact_sync = $ac->api("contact/sync", $contact);
				if (absint($contact_sync->success)) {
					$contact_id = (int)$contact_sync->subscriber_id;
				}
			}
			// }

			update_user_meta($current_user->ID, 'billing_first_name', $fname);
			update_user_meta($current_user->ID, 'billing_last_name', $lname);

			update_user_meta($current_user->ID, 'first_name', $fname);
			update_user_meta($current_user->ID, 'last_name', $lname);

			$pass = trim($_POST['pass']);

			wp_set_password( $pass, $current_user->ID );

			wp_signon( array('user_login' => $current_user->data->user_login, 'user_password' => $pass, 'remember' => true) );

			wp_safe_redirect( add_query_arg('step', '2', get_field('registration', 'option')) );
			exit();
		}

	}

	/*
	*	User 3d registration step
	*/
	if (
		isset( $_POST['rad_signup_3'] ) and
		wp_verify_nonce( $_POST['rad_reg_field_3'], 'rad_reg_3' ) and
		isset($_POST['affiliation']) and
		isset($_POST['industry']) and
		isset($_POST['platforms']) and
		isset($_POST['environment'])
		) {

		$current_user = wp_get_current_user();
		if ( $current_user->ID ) {
			/*
			field_590e3eed18f2c = industry
				field_590e3eed18f2d = item
			field_590e3f0c18f2e = platforms
				field_590e3f0c18f2f = item
			field_590e3f1718f30 = environment
				field_590e3f1718f31 = item
			field_590e2aa165a1c = affiliation
				field_590e355122d92 = item
			*/

			$industry = $platforms = $environment = $affiliation = array();
			$industry_buf = $platforms_buf = $environment_buf = $affiliation_buf = array();

			$industry_buf = array_map('trim', explode(',', $_POST['industry']));
			foreach($industry_buf as $item){
				$industry[] = array('field_590e3eed18f2d' => $item);
			}

			$platforms_buf = array_map('trim', explode(',', $_POST['platforms']));
			foreach($platforms_buf as $item){
				$platforms[] = array('field_590e3f0c18f2f' => $item);
			}

			$environment_buf = array_map('trim', explode(',', $_POST['environment']));
			foreach($environment_buf as $item){
				$environment[] = array('field_590e3f1718f31' => $item);
			}

			$affiliation_buf = array_map('trim', explode(',', $_POST['affiliation']));
			foreach($affiliation_buf as $item){
				$affiliation[] = array('field_590e355122d92' => $item);
			}

			$acf_uid = 'user_' . $current_user->ID;
			update_field( 'field_590e3eed18f2c', $industry, $acf_uid );
			update_field( 'field_590e3f0c18f2e', $platforms, $acf_uid );
			update_field( 'field_590e3f1718f30', $environment, $acf_uid );
			update_field( 'field_590e2aa165a1c', $affiliation, $acf_uid );

			if(isset($_POST['organization'])){
				update_user_meta($current_user->ID, 'billing_company', rad_param_security($_POST['organization']));
			}

			wp_safe_redirect( add_query_arg('hello', '1', get_permalink(get_option('woocommerce_myaccount_page_id')) ) );
			//wp_safe_redirect( add_query_arg('hello', '1', get_permalink('projects') ) );
			exit;
		}

	}

	/*
	*	Get "create project" form
	*/
	if(
		isset( $_POST['create-prj'] ) and
		isset( $_POST['file-data'] ) and
		wp_verify_nonce( $_POST['create_prj_action_field'], 'create_prj_action' )
		) {

		$current_user = wp_get_current_user();
		$acf_user_ID = 'user_' . $current_user->ID;
		$proj_title = trim(strip_tags($_POST['proj-title']));
		$scene = trim(strip_tags($_POST['scene']));
		$notes = trim(strip_tags($_POST['notes']));

		$parent_post_ID = 0;
		$args = array(
			'title'		=>	$proj_title,
			'post_type'	=>	'scene',
			'author'	=>	$current_user->ID
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ){					// if post exists
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$parent_post_ID = get_the_ID();
			}
		} else {											// create a new project with parent = 0
			$parent_post_ID = wp_insert_post(array(
												'post_author'		=> $current_user->ID,
												'post_title'		=> $proj_title,
												'post_status'		=> 'publish',
												'post_type'			=> 'scene',
												'comment_status'	=> 'closed'
											)
										);
		}
		wp_reset_postdata();

		$posts = get_posts(
			array(
				'posts_per_page'   => -1,
				'post_type'        => 'scene',
				'post_parent'      => $parent_post_ID
			)
		);
		$scene_ID = count($posts) + 1;

		$new_scan_post_ID = wp_insert_post(array(
											'post_author'		=> $current_user->ID,
											'post_title'		=> 'Scan #' . $scene_ID,
											'post_status'		=> 'publish',
											'post_type'			=> 'scene',
											'comment_status'	=> 'closed',
											'post_content'		=>	$notes,
											'post_excerpt'		=>	$scene,
											'post_parent'		=>	$parent_post_ID
										)
									);

		if(!is_wp_error($new_scan_post_ID) and $new_scan_post_ID){

			$file_data_array = array();
			foreach($_POST['file-data'] as $key => $value){
				$file_data_array['file-data' . $key] = $value;
				update_post_meta( $new_scan_post_ID, 'file-data' . $key, $value);
			}

			if($file_data_array['file-dataurl']){

				// Create scene by RAD API
				$params = array(
								    'scene_id'		=> $new_scan_post_ID,
								    'project_id'	=> $parent_post_ID,
								    'user_id'		=> $current_user->ID,
								    'file_url'		=> $file_data_array['file-dataurl'],
								    'user_plan'		=> get_field('credits', 'user_'.$current_user->ID),
								    'project_name'	=> $proj_title,
								    'scene_name'	=> 'Scan #' . $scene_ID
								);
				$radapi = new RADAPI;
				$radapi->create_scene($params);

			}

			wp_redirect(add_query_arg( array('step' => $new_scan_post_ID) ));
			exit();
		}

	}

}

add_action( 'init', 'rad_create_post_type', 9);
function rad_create_post_type() {
	// Scenes
    register_post_type( 'scene',
        array(
                'labels' => array( 'name' => 'Scenes', 'singular_name' => 'Scenes' ),
                'publicly_queryable' => true,
                'public' => true,
                'show_ui' => true,
                'hierarchical' => true,
                'menu_position' => null,
                'query_var' => true,
                'supports' => array('title','thumbnail','author','editor', 'excerpt', 'custom-fields', 'page-attributes')
            )
    );

	// FAQs
	$labels = array(
		'name'               => 'Questions',
		'singular_name'      => 'Question',
		'menu_name'          => 'Questions',
		'name_admin_bar'     => 'Questions',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Questions',
		'new_item'           => 'New Question',
		'edit_item'          => 'Edit Question',
		'view_item'          => 'View Question',
		'all_items'          => 'All Questions',
		'search_items'       => 'Search Questions',
		'parent_item_colon'  => 'Parent Questions:',
		'not_found'          => 'No Questions found.',
		'not_found_in_trash' => 'No Questions found in Trash.'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 10,
		'menu_icon'			 => 'dashicons-format-status',
		'supports'           => array( 'title', 'editor' )
	);
    register_post_type( 'questions', $args );
	register_taxonomy( 'question-categories', 'questions', array( 'label' => 'Categories', 'rewrite' => array('slug' => 'questions'), 'hierarchical' => true, 'public' => true, 'show_admin_column' => true ) );

	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Updates';
	$labels->singular_name = 'Update';
	$labels->add_new = 'New Update';
	$labels->add_new_item = 'New Update';
	$labels->edit_item = 'Edit Update';
	$labels->new_item = 'New Update';
	$labels->view_item = 'View Updates';
	$labels->search_items = 'Search Updates';
	$labels->not_found = 'Not found';
	$labels->not_found_in_trash = 'Not found in trash';
}
//strtolower($item)
function prepare_option_items($item){
	return trim( str_replace('  ', ' ', $item) );
}

add_action( 'admin_menu', 'rad_admin_menu' );
function rad_admin_menu() {
    global $menu, $submenu;
    $menu[5][0] = 'Updates';
    $submenu['edit.php'][5][0] = 'Updates';
    $submenu['edit.php'][10][0] = 'New Update';
    $submenu['edit.php'][16][0] = 'Update Tags';
}


add_filter('woocommerce_login_redirect', 'rad_login_redirect');
function rad_login_redirect( $redirect_to ) {
	$redirect_to = get_field('redirect_after_login', 'option');
	return $redirect_to;
}

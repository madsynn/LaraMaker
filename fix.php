<?php
if(!defined('ABSPATH')){
	exit;
}

function add_payment_method_to_admin_new_order($order, $is_admin_email)
{

	if($is_admin_email){
		echo '<p><strong>Payment Method:</strong> ' . $order->payment_method_title . '</p>';
	}
}

add_action('woocommerce_email_after_order_table', 'add_payment_method_to_admin_new_order', 15, 2);

function woo_cc_all_emails()
{
	return 'Bcc: mark@graceframe.com' . "\r\n";
}

add_filter('woocommerce_email_headers', 'woo_cc_all_emails');

function woo_override_checkout_fields($fields)
{

	$fields['shipping']['shipping_country'] = [
		'type' => 'select',
		'label' => __('My New Country List', 'woocommerce'),
		'options' => ['USA' => 'United States']
	];

	return $fields;
}

add_filter('woocommerce_checkout_fields', 'woo_override_checkout_fields');

add_filter('woocommerce_email_subject_new_order', 'change_admin_email_subject', 1, 2);

function change_admin_email_subject($subject, $order)
{
	global $woocommerce;

	$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

	$subject = sprintf('[%s] New Customer Order (# %s) from Name %s %s', $blogname, $order->id, $order->billing_first_name, $order->billing_last_name);

	return $subject;
}

add_filter('script_loader_src', 'add_id_to_script', 10, 2);
function add_id_to_script($src, $handle)
{
	if('cx.app.js' != $handle){
		return $src;
	}

	return $src . "' id='cx-app-js-id' data-cfasync='false'";
}

function phillips_custom_setup()
{
	add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
	function my_wpcf7_ajax_loader()
	{
		return get_stylesheet_directory_uri() . '/ajax-loader.gif';
	}

	add_filter('pre_option_link_manager_enabled', '__return_true');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	add_theme_support('woocommerce');
	add_theme_support('title-tag');
	add_action('wp_print_scripts', 'disableAutoSave');
	function disableAutoSave()
	{
		wp_deregister_script('autosave');
	}

	function child_manage_woocommerce_styles()
	{
		remove_action('wp_head', [$GLOBALS['woocommerce'], 'generator']);
	}

	function custom_theme_features()
	{
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
	}

	add_action('after_setup_theme', 'custom_theme_features');
	function enqueue_our_required_stylesheets()
	{
		wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
		wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Abel|Rock+Salt|Neucha|Fjalla+One|Open+Sans:400,600,700');
		wp_enqueue_style('googleFonts');
		wp_enqueue_style('font-awesome');
	}

	add_action('wp_enqueue_scripts', 'enqueue_our_required_stylesheets');

	if(!session_id()){
		add_action('init', 'session_start');
	}

	function scripts_styles_print_frontend()
	{

		if(is_child_theme()){
		}
		if(!current_user_can('manage_options')){
			wp_enqueue_style('parent-style', trailingslashit(get_template_directory_uri()) . 'style.css');
			wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css?v=' . time(), ['parent-style']);
			wp_enqueue_style('default-style', get_stylesheet_directory_uri() . '/css/default.css?v=' . time(), ['parent-style', 'child-style'], false, 'all');
			wp_enqueue_style('important', get_stylesheet_directory_uri() . '/important.css?v=' . time(), ['parent-style', 'child-style', 'default-style'], false, 'all');
		}else{
			wp_enqueue_style('parent-style', trailingslashit(get_template_directory_uri()) . 'style.css');
			wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', ['parent-style']);
			wp_enqueue_style('default-style', get_stylesheet_directory_uri() . '/css/default.css', ['parent-style', 'child-style'], false, 'all');
			wp_enqueue_style('important', get_stylesheet_directory_uri() . '/important.css', ['parent-style', 'child-style', 'default-style']);
		}
		if(is_page('4')):
			wp_enqueue_style('shop', get_stylesheet_directory_uri() . '/css/page-shop.css', [], false, 'all');
		endif;
		if(is_page('5')):
			wp_enqueue_style('page-cart', get_stylesheet_directory_uri() . '/css/page-cart.css', [], false, 'all');
		endif;
		if(is_page('6')):
			wp_enqueue_style('page-checkout', get_stylesheet_directory_uri() . '/css/page-checkout.css', [], false, 'all');
		endif;
		if(is_page('223')):
			wp_enqueue_style('qnique-quilter-images', get_stylesheet_directory_uri() . '/css/page-qnique-quilter-images.css', [], false, 'all');
		endif;
		if(is_page('1568')): /*page: features*/
			wp_enqueue_style('features', get_stylesheet_directory_uri() . '/css/page-features.css', [], false, 'all');
		endif;
		if(is_page('1148')):
			wp_enqueue_style('contact', get_stylesheet_directory_uri() . '/css/contact.css', [], false, 'all');
		endif;
		if(is_page('1967')): /*page: sitemap */
			wp_enqueue_style('sitemap', get_stylesheet_directory_uri() . '/css/sitemap.css', [], false, 'all');
		endif;
		if(is_singular(['product'])):
			wp_enqueue_style('product', get_stylesheet_directory_uri() . '/css/product.css', [], false, 'all');
		endif;
		if(is_page('662')):
			wp_enqueue_style('homepage', get_stylesheet_directory_uri() . '/css/page-home-2.css', [], false, 'all');
		endif;
		if(is_page('1192')): /*page: faq */
			wp_enqueue_style('faq', get_stylesheet_directory_uri() . '/css/faq.css', [], false, 'all');
		endif;
		wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css', ['child-style'], false, 'all');
		if(function_exists('is_woocommerce') && (is_account_page()
				|| is_shop()
				|| is_product_taxonomy()
				|| is_product()
				|| is_cart()
				|| is_checkout()
				|| is_checkout_pay_page()
				|| is_order_received_page()
				|| is_wc_endpoint_url('order-pay')
				|| is_wc_endpoint_url('order-received')
				|| is_wc_endpoint_url('view-order')
				|| is_wc_endpoint_url('edit-account')
				|| is_wc_endpoint_url('edit-address')
				|| is_wc_endpoint_url('lost-password')
				|| is_wc_endpoint_url('customer-logout')
				|| is_wc_endpoint_url('add-payment-method')
			)
		){
		}else{
			wp_dequeue_style('woocommerce_frontend_styles');
			wp_dequeue_style('woocommerce_fancybox_styles');
			wp_dequeue_style('woocommerce_chosen_styles');
			wp_dequeue_style('woocommerce_prettyPhoto_css');
		}
	}

	add_action('wp_enqueue_scripts', 'scripts_styles_print_frontend');

	function pm_load_scripts()
	{
		// wp_enqueue_script( 'inview', get_stylesheet_directory_uri() . '/lib/js/jquery.inview.js', array('jquery' ), false, true);
		//wp_enqueue_script( 'fade', get_stylesheet_directory_uri() . '/lib/js/fade.js', array('jquery' ), false, true);
		wp_register_script('matchHeight', get_stylesheet_directory_uri() . '/lib/js/jquery.matchHeight-min.js', ['jquery'], true, false);
		wp_enqueue_script('matchHeight');

		// wp_enqueue_script('add', get_stylesheet_directory_uri() . '/lib/js/add.js', array('jquery'), true, false);

		wp_register_script('loader', get_stylesheet_directory_uri() . '/lib/js/loader.js', ['jquery'], true, false);
		wp_enqueue_script('loader');

		$browser = $_SERVER['HTTP_USER_AGENT'];
		global $variable_array;
		if(strpos($browser, 'MSIE') !== false){
			wp_enqueue_script('html5', '//html5shiv.googlecode.com/svn/trunk/html5.js', false, false, false);
			wp_enqueue_script('respond', get_stylesheet_directory_uri() . '/lib/js/respond.js', false, false, false);
			wp_enqueue_script('selectivizr', get_stylesheet_directory_uri() . '/lib/js/selectivizr.js', false, false, false);
		}
		if(function_exists('is_woocommerce') && (is_account_page()
				|| is_shop()
				|| is_product_taxonomy()
				|| is_product()
				|| is_cart()
				|| is_checkout()
				|| is_checkout_pay_page()
				|| is_order_received_page()
				|| is_wc_endpoint_url('order-pay')
				|| is_wc_endpoint_url('order-received')
				|| is_wc_endpoint_url('view-order')
				|| is_wc_endpoint_url('edit-account')
				|| is_wc_endpoint_url('edit-address')
				|| is_wc_endpoint_url('lost-password')
				|| is_wc_endpoint_url('customer-logout')
				|| is_wc_endpoint_url('add-payment-method')
			)
		){
		}else{
			wp_dequeue_script('wc_price_slider');
			wp_dequeue_script('wc-single-product');
			wp_dequeue_script('wc-add-to-cart');
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('wc-checkout');
			wp_dequeue_script('wc-add-to-cart-variation');
			wp_dequeue_script('wc-single-product');
			wp_dequeue_script('wc-cart');
			wp_dequeue_script('wc-chosen');
			wp_dequeue_script('prettyPhoto');
			wp_dequeue_script('prettyPhoto-init');
			wp_dequeue_script('jquery-blockui');
			wp_dequeue_script('jquery-placeholder');
			wp_dequeue_script('fancybox');
			wp_dequeue_script('jqueryui');
		}
	}

	add_action('wp_enqueue_scripts', 'pm_load_scripts');

	if(!function_exists('phillips_footer_sidebar')){
		function phillips_footer_sidebar()
		{
			$args = [
				'id' => 'footside',
				'name' => __('Footer Sidebar', 'text_domain'),
				'description' => __('For popular search tags on the bottom of the page', 'text_domain'),
				'before_title' => '<h3 class="widget-title" itemprop="name">',
				'after_title' => '</h3>',
				'before_widget' => '<aside id="%1$s" class="widget %2$s" role="contentinfo" itemscope itemtype="//schema.org/WPFooter"><section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section></aside>'
			];
			register_sidebar($args);
		}

		add_action('widgets_init', 'phillips_footer_sidebar');
	}
	if(!function_exists('phillips_navigation_menus')){
		add_action('init', 'phillips_navigation_menus', '999');
		function phillips_navigation_menus()
		{
			$locations = [
				'footer' => __('Footer Menu', 'text_domain'),
				'disclosures' => __('Disclosures Menu', 'text_domain')
			];
			register_nav_menus($locations);
		}
	}

	add_filter('woocommerce_get_availability', 'availability_filter_func');
	function availability_filter_func($availability)
	{
		$availability['availability'] = str_ireplace('Out of stock', 'Around 2 Weeks Back Order ( please call 800-264-0644 )', $availability['availability']);
		return $availability;
	}

	function phillips_setup_author()
	{
		global $wp_query;
		if($wp_query->is_author() && isset($wp_query->post)){
			$GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
		}
	}

	if(!function_exists('jeg_social_icon')){
		function jeg_social_icon($withtext)
		{
			$html = "<ul>";
			$socialarray = jeg_populate_social();
			foreach($socialarray as $soc){
				if($withtext){
					$html .= "<li itemprop='sameAs'><a name=" . $soc['text'] . " title=" . $soc['text'] . " target='_blank' href='" . $soc['url'] . "' class='" . $soc['class'] . "'><i class='" . $soc['icon'] . "'></i>" . $soc['text'] . "</a></li>";
				}else{
					$html .= "<li itemprop='sameAs'><a name=" . $soc['text'] . " title=" . $soc['text'] . " target='_blank' href='" . $soc['url'] . "' class='" . $soc['class'] . "'><i class='" . $soc['icon'] . "'></i></a></li>";
				}
			}
			$html .= "</ul>";
			return $html;
		}
	}
//add_action('admin_head', 'my_custom_admin_css');
	function my_custom_admin_css()
	{
		echo '<style>
    td.plugin-title strong{float:left;margin-right:12px;}
    div.plugin-description p{display:none;}
</style>';
	}

	add_action('admin_menu', 'custom_css_hooks');
	add_action('save_post', 'save_custom_css');
	add_action('wp_head', 'insert_custom_css');
	function custom_css_hooks()
	{
		add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
		add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
	}

	function custom_css_input()
	{
		global $post;
		echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="' . wp_create_nonce('custom-css') . '" />';
		echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">' . get_post_meta($post->ID, '_custom_css', true) . '</textarea>';
	}

	function save_custom_css($post_id)
	{
		if(!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')){
			return $post_id;
		}

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return $post_id;
		}

		$custom_css = $_POST['custom_css'];
		update_post_meta($post_id, '_custom_css', $custom_css);
	}

	function insert_custom_css()
	{
		if(is_page() || is_single()){
			if(have_posts()):
				while(have_posts()):
					the_post();
					echo '<style type="text/css">' . get_post_meta(get_the_ID(), '_custom_css', true) . '</style>';
				endwhile;

			endif;
			rewind_posts();
		}
	}

	function phillips_html_tag_schema()
	{
		$schema = '//schema.org/';
		if(function_exists('is_woocommerce') && (is_product_category())){
			$type = 'SomeProducts';
		}elseif(is_singular(['product'])){
			$type = 'Thing';
		}elseif(function_exists('is_woocommerce') && (is_shop())){
			$type = 'SomeProducts';
		}elseif(is_singular('post')){
			$type = "";
		}elseif(is_page(2855)){
			$type = 'CreativeWork';
			$type2 = 'WebPage';
		}elseif(is_page(1148)){
			$type = 'CreativeWork" itemscope="itemscope" itemtype="//schema.org/WebPage';
		}elseif(is_author()){
			$type = 'ProfilePage';
		}elseif(is_search()){
			$type = 'SearchResultsPage';
		}else{
			$type = 'WebPage';
		}
		if(is_page(2855)){
			echo 'itemscope="itemscope" itemtype="' . esc_attr($schema) . esc_attr($type) . '" itemscope="itemscope" itemtype="' . esc_attr($schema) . esc_attr($type2) . '"';
		}elseif("" != $type){
			echo 'itemscope="itemscope" itemtype="' . esc_attr($schema) . esc_attr($type) . '"';
		}
		/*  <?php if (function_exists('phillips_html_tag_schema') ){ phillips_html_tag_schema(); } ?>  */
	}

//itemscope itemprop="blogPost" itemtype="//schema.org/BlogPosting
	function phillips_body_tag_schema()
	{
		$schema = '//schema.org/';
		if(is_singular('post')){
			$type = '';
//$type     = 'Blog';
		}elseif(function_exists('is_woocommerce') && (is_product_category())){
			$type = 'Enumeration';
		}elseif(function_exists('is_woocommerce') && (is_shop())){
			$type = 'ItemList';
		}elseif(is_page(1148)){
			$type = 'ContactPage';
		}elseif(is_author()){
			$type = 'Person';
		}elseif(is_singular(['product'])){
			$type = '';
		}elseif(is_search()){
			$type = 'WebPageElement';
		}else{
			$type = '';
		}
		if("" != $type){
			echo 'itemscope="itemscope" itemtype="' . esc_attr($schema) . esc_attr($type) . '"';
		}
	}

	function phillips_content_tag_schema()
	{
	}

	add_action('woocommerce_product_options_pricing', 'wc_rrp_product_field');
	function wc_rrp_product_field()
	{
		woocommerce_wp_text_input(['id' => 'model', 'class' => 'wc_input_model short', 'label' => __('Model:', 'woocommerce') . ' ']);
		woocommerce_wp_text_input(['id' => 'mpn', 'class' => 'wc_input_mpn short', 'label' => __('MPN:', 'woocommerce') . ' ']);
		woocommerce_wp_text_input(['id' => 'rrp_price', 'class' => 'wc_input_price short', 'label' => __('MSRP', 'woocommerce') . ' (' . get_woocommerce_currency_symbol() . ')']);
		woocommerce_wp_text_input(['id' => 'UPC', 'class' => 'wc_input_upc short', 'label' => __('UPC:', 'woocommerce') . ' ']);
	}

	add_action('save_post', 'wc_rrp_save_product');
	function wc_rrp_save_product($product_id)
	{
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return;
		}

		if(isset($_POST['mpn'])){
			if(!empty($_POST['mpn'])){
				update_post_meta($product_id, 'mpn', $_POST['mpn']);
			}
		}else{
			delete_post_meta($product_id, 'mpn');
		}

		if(isset($_POST['model'])){
			if(!empty($_POST['model'])){
				update_post_meta($product_id, 'model', $_POST['model']);
			}
		}else{
			delete_post_meta($product_id, 'model');
		}

		if(isset($_POST['rrp_price'])){
			if(is_numeric($_POST['rrp_price'])){
				update_post_meta($product_id, 'rrp_price', $_POST['rrp_price']);
			}
		}else{
			delete_post_meta($product_id, 'rrp_price');
		}

		if(isset($_POST['UPC'])){
			if(is_numeric($_POST['UPC'])){
				update_post_meta($product_id, 'UPC', $_POST['UPC']);
			}
		}else{
			delete_post_meta($product_id, 'UPC');
		}
	}

	if(function_exists('is_woocommerce') && (is_shop())){
		function wc_rrp_show()
		{
			global $woocommerce, $post, $product, $UPC, $sale, $model, $product_id;
			$product_id = $post->ID;
			$model = get_post_meta($product->id, 'model', true);
			$price = get_post_meta(get_the_ID(), '_regular_price', true);
			$sale = get_post_meta(get_the_ID(), '_sale_price', true);
			$UPC = get_post_meta($product->id, 'UPC', true);
			if(is_singular(['product'])){
				$rrp = get_post_meta($product->id, 'rrp_price', true);
				echo '<br /> <div class="singleline woocommerce_msrp">';
				_e('MSRP: ', 'woocommerce');
				echo '<span class="woocommerce-rrp-price">' . woocommerce_price($rrp) . '</span>';
				echo '</div>';
			}
			if(is_singular(['product'])){
				$UPC = get_post_meta($product->id, 'UPC', true);
				echo '<div class="singleline woocommerce_upc">';
				_e('UPC: ', 'woocommerce');
				echo '<span class="woocommerce-upc-price">' . $UPC . '</span>';
				echo '</div>';
			}
			if(is_singular(['product'])){
				$model = get_post_meta($product->id, 'model', true);
				echo '<div itemscope itemtype="//schema.org/ProductModel" class="singleline woocommerce_model">';
				_e('MODEL: ', 'woocommerce');
				echo '<span itemprop="name" class="woocommerce-model-price"><span itemprop="model">' . $model . '</span></span>';
				echo '</div>';
			}
			if(is_singular(['product'])){
				echo '<div itemprop="brand"  itemscope itemtype="//schema.org/Organization" class="singleline woocommerce_brand">';
				_e('BRAND: ', 'woocommerce');
				echo '<span itemprop="name" class="brand">Grace Quilting</span>';
				echo '</div>';
			}
			if(is_singular(['product'])){
				echo '<div itemprop="manufacturer" itemscope itemtype="//schema.org/Organization" class="singleline woocommerce_manufacturer">';
				_e('Mfg by: ', 'woocommerce');
				echo '<span itemprop="name" class="manufacturer">The Grace Company</span>';
				echo '</div>';
			}
			if(is_singular(['product'])){
				echo '<div class="singleline woocommerce_productid">';
				_e('ProductID: ', 'woocommerce');
				echo '<span itemprop="productID">' . $product_id . '</span>';
				echo '</div><br />';
			}
		}

		if(function_exists('is_woocommerce') && (!is_shop())){
			add_action('woocommerce_product_meta_end', 'wc_rrp_show', 5);
		}
	}
	add_filter('woocommerce_get_catalog_ordering_args', 'am_woocommerce_catalog_orderby');
	function am_woocommerce_catalog_orderby($args)
	{
		$args['orderby'] = 'date';
		$args['order'] = 'asc';
		$args['meta_key'] = '';
		return $args;
	}

	add_filter('manage_posts_columns', 'posts_columns_id', 5);
	add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
	add_filter('manage_pages_columns', 'posts_columns_id', 5);
	add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
	function posts_columns_id($defaults)
	{
		$defaults['wps_post_id'] = __('ID');
		return $defaults;
	}

	function posts_custom_id_columns($column_name, $id)
	{
		if('wps_post_id' === $column_name){
			echo $id;
		}
	}

//	function phillips_children_excerpt($atts, $content = null)
//	{
//		if($atts['length'] > 0){
//		}else{
//			$atts['length'] = 75;
//		}
//		if(isset($atts['id']) && is_numeric($atts['id'])){
//			$parent_id = $atts['id'];
//		}else{
//			$parent_id = get_the_ID();
//		}
//		$output = "";
//		$i = 0;
//		$args = [
//			'post_parent' => $parent_id,
//			'post_status' => 'publish',
//			'post_type' => 'page'
//		];
//		if(isset($atts['order'])){
//			$args['order'] = $atts['order'];
//		}
//
//		if(isset($atts['orderby'])){
//			$args['orderby'] = $atts['orderby'];
//		}
//
//		$output .= "<main class='site-content' role='main' itemscope itemtype='//schema.org/Blog'>";
//		if($children = get_children($args)){
//			foreach($children as $child){
//				$title = $child->post_title;
//				$child_excerpt = apply_filters('the_excerpt', $child->post_content);
//				$words = explode(' ', $child_excerpt);
//				$words = array_slice($words, 0, $atts['length']);
//				$child_excerpt = implode(' ', $words);
//				$link = get_permalink($child->ID);
//				$output .= "<article class='post entry' itemscope itemprop='blogPost' itemtype='//schema.org/BlogPosting'>";
//				$output .= "<div>";
//				$output .= "<header class='comment-header'><a href='" . $link . "'><h1 class='entry-title' itemprop='headline'><i class='fa fa-chevron-circle-down'></i> " . $title . "</h1></a></header>";
//				if(has_post_thumbnail()){
//					$output .= get_the_post_thumbnail($post_id);
//				}
//				$output .= "<div class='entry-content' itemprop='text'><p>" . $child_excerpt . "...</p></div>";
//				$output .= "<footer class='entry-footer'><a href='" . $link . "'>Read More!</a></footer>";
//				$output .= "</div>";
//				$output .= "</article>";
//				$output .= "<hr>";
//			}
//		}
//		$output .= "</main>";
//		echo $output;
//	}

	remove_action('wp_head', 'wp_generator');

	// function wcs_defer_javascripts($url)
	// {
	//     if (false === strpos($url, '.js')) {
	//         return $url;
	//     }
	//     if (strpos($url, 'jquery.js')) {
	//         return $url;
	//     }
	//     return "$url' async='async";
	// }
	// add_filter('clean_url', 'wcs_defer_javascripts', 11, 1);

	function optimize_heartbeat_settings($settings)
	{
		$settings['autostart'] = false;
		$settings['interval'] = 60;
		return $settings;
	}

	add_filter('heartbeat_settings', 'optimize_heartbeat_settings');

	function disable_heartbeat_unless_post_edit_screen()
	{
		global $pagenow;
		if('post.php' != $pagenow && 'post-new.php' != $pagenow){
			wp_deregister_script('heartbeat');
		}
	}

	add_action('init', 'disable_heartbeat_unless_post_edit_screen', 1);

	add_action('wp_dashboard_setup', function(){
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
		// remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		// remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box('dashboard_activity', 'dashboard', 'normal');
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
		remove_meta_box('dashboard_browser_nag', 'dashboard', 'normal');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	});




	function speed_stop_loading_wp_embed()
	{
		if(!is_admin()){
			wp_deregister_script('wp-embed');
		}
	}

	add_action('init', 'speed_stop_loading_wp_embed');


	add_filter('posts_fields', 'wcm_limit_post_fields_cb', 0, 2);
	function wcm_limit_post_fields_cb($fields, $query)
	{
		if(
			!is_admin()
			OR !$query->is_main_query()
			OR (defined('DOING_AJAX') AND DOING_AJAX)
			OR (defined('DOING_CRON') AND DOING_CRON)
		)
			return $fields;

		$p = $GLOBALS['wpdb']->posts;
		return implode(",", array(
			"{$p}.ID",
			"{$p}.post_date",
			"{$p}.post_name",
			"{$p}.post_title",
			"{$p}.ping_status",
			"{$p}.post_author",
			"{$p}.post_password",
			"{$p}.comment_status",
		));
	}


	/**
	 * Disable the emoji's
	 */
	function disable_emojis()
	{
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_filter('the_content_feed', 'wp_staticize_emoji');
		remove_filter('comment_text_rss', 'wp_staticize_emoji');
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
		add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	}

	add_action('init', 'disable_emojis');

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 *
	 * @param    array $plugins
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce($plugins)
	{
		if(is_array($plugins)){
			return array_diff($plugins, ['wpemoji']);
		}else{
			return [];
		}
	}
}
add_action('after_setup_theme', 'phillips_custom_setup', 5000);
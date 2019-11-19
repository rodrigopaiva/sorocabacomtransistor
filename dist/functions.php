<?php

// add feed links to header
if (function_exists('automatic_feed_links')) {
	automatic_feed_links();
} else {
	return;
}


// enable threaded comments
function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}
add_action('get_header', 'enable_threaded_comments');


// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


// custom excerpt length
function custom_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');


// custom excerpt ellipses for 2.9+
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');


// no more jumping for read more link
function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter('excerpt_more', 'no_more_jumping');


// disable all widget areas
function disable_all_widgets($sidebars_widgets) {
	//if (is_home())
		$sidebars_widgets = array(false);
	return $sidebars_widgets;
}
add_filter('sidebars_widgets', 'disable_all_widgets');


// kill the admin nag
if (!current_user_can('edit_users')) {
	add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
	add_filter('pre_option_update_core', create_function('$a', "return null;"));
}


// category id in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes [] = 'cat-' . $category->cat_ID . '-id';
		return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


// get the first category id
function get_first_category_ID() {
	$category = get_the_category();
	return $category[0]->cat_ID;
}


// PAGINACAO
add_filter('next_posts_link_attributes', 'next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'prev_posts_link_attributes');

function next_posts_link_attributes() {
    return 'class="next-page-button right"';
}

function prev_posts_link_attributes() {
    return 'class="prev-page-button left"';
}



	// add a favicon for your admin
		function admin_favicon() {
			echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/favicon.ico?v=2" />';
		}
		add_action('admin_head', 'admin_favicon');


	// custom admin login logo
		function custom_login_logo() {
			echo '
				<style type="text/css">
					body.login #login h1 a {
						background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important;
						background-size: inherit;
						width: 260px;
						height: 62px;
					}
				</style>
			';
		}
		add_action('login_head', 'custom_login_logo');


	//Link na tela de login para a página inicial
		function my_login_logo_url() {
		    return get_bloginfo( 'url' );
		}
		add_filter( 'login_headerurl', 'my_login_logo_url' );

		function my_login_logo_url_title() {
		    return 'Revista Algomais';
		}
		add_filter( 'login_headertitle', 'my_login_logo_url_title' );


	//Custom dashboard logo
		add_action('admin_head', 'my_custom_logo');
		function my_custom_logo() {
			echo '
				<style type="text/css">
					#wp-admin-bar-wp-logo .ab-icon {
						background: url('.get_bloginfo('template_directory').'/favicon.ico) no-repeat center top !important;
					}
				</style>
			';
		}


	// Customizar o Footer do WordPress
		function remove_footer_admin () {
			echo '© <a href="http://rubrostudio.com.br/" target="_blank" title="Desenvolvido por Rubro Studio">Rubro Studio</a> - Estúdio de Design voltado para soluções web';
		}
		add_filter('admin_footer_text', 'remove_footer_admin');

?>
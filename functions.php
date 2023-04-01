<?php
require_once(__DIR__ . '/inc/general/scripts-and-styles.php');
require_once(__DIR__ . '/inc/general/menu.php');
require_once(__DIR__ . '/inc/custom-posts/template.php');
require_once(__DIR__ . '/inc/custom-tax/template.php');
require_once(__DIR__ . '/inc/acf/options.php');
require_once(__DIR__ . '/inc/ajax/get-gallery.php');
require_once(__DIR__ . '/inc/general/img-size.php');
require_once(__DIR__ . '/inc/general/variables-export.php');
require_once(__DIR__  . '/functions-booking/wp-booking-post-type.php');
require_once(__DIR__  . '/functions-booking/ajax-get-bookings.php');
require_once(__DIR__  . '/functions-booking/ajax-post-booking.php');
require_once(__DIR__  . '/functions-booking/wp-booking-admin-columns.php');
require_once(__DIR__  . '/functions-booking/wp-booking-mailing.php');

function reset_query()
{
  wp_reset_query();
}
add_action('admin_init', 'reset_query');

add_theme_support('title-tag');

add_theme_support('post-thumbnails');


/*************** ALLOW SVG ***************/
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function wpdocs_custom_excerpt_length($length)
{
  return 60;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

function pagination_bar($custom_query)
{

  $total_pages = $custom_query->max_num_pages;
  $big = 999999999; // need an unlikely integer

  if ($total_pages > 1) {
    $current_page = max(1, get_query_var('paged'));

    echo paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => $current_page,
      'total' => $total_pages,
      'prev_text' => '<span class="blog-page__articles-nav-prev"></span>',
      'next_text' => '<span class="blog-page__articles-nav-next"></span>'
    ));
  }
}


add_filter('wpseo_breadcrumb_links', function ($breadcrumbs) {

  if (is_singular('houses') === true) {
    $breadcrumbs[3] = $breadcrumbs[1]; // move the title to third position
    $breadcrumbs[1] = ['id' => 6]; // add link to page with id
  }

  return $breadcrumbs;
}, 100);

add_filter(
  'wpseo_breadcrumb_links',
  function ($links) {
    global $post;
    if (is_singular('houses')) {
      $breadcrumb[] = array(
        'url' => site_url('/domki/'),
        'text' => 'domki',
      );
    } elseif (is_singular('attractions')) {
      $breadcrumb[] = array(
        'url' => site_url('/atrakcje/'),
        'text' => 'dostępne atrakcje',
      );
    }
    if ($breadcrumb) {
      array_splice($links, 1, -1, $breadcrumb);
      $breadcrumb = $links[2];
      $links[2] = $links[1];
      $links[1] = $breadcrumb;
    }
    return $links;
  }
);


/////////////////////
// FORCE WP UPDATE //
/////////////////////

// add_filter( 'allow_dev_auto_core_updates', '__return_true' );           // Enable development updates
// add_filter( 'allow_minor_auto_core_updates', '__return_true' );         // Enable minor updates
// add_filter( 'allow_major_auto_core_updates', '__return_true' );         // Enable major updates
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

// add_filter( 'auto_update_translation', '__return_false' );               // Disable translation file updates
// add_filter( 'auto_update_translation', '__return_true' );                // Enable translation file updates
add_filter( 'auto_update_translation', '__return_true' );  

//////////////////////
// SECURE  WP_ADMIN //
//////////////////////

// redirects the user if there are trying to reach either of the secure areas
if (strpos($_SERVER['REQUEST_URI'], 'wp-admin') !== false || strpos($_SERVER['REQUEST_URI'], 'wp-login') !== false) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: /');die();
}

// replace wp-admin url’s with the proper name
add_filter('site_url', 'wpadmin_filter', 10, 3);
function wpadmin_filter($url, $path, $orig_scheme)
{
    $old = array("/(wp-admin)/");
    $admin_dir = WP_ADMIN_DIR;
    $new = array($admin_dir);
    return preg_replace($old, $new, $url, 1);
}

// make sure the login page redirects to the proper page
add_action('login_form', 'redirect_wp_admin');
function redirect_wp_admin()
{
    $redirect_to = $_SERVER['REQUEST_URI'];
    if (count($_REQUEST) > 0 && array_key_exists('redirect_to', $_REQUEST)) {
        $redirect_to = $_REQUEST['redirect_to'];
    }
}

// function to handle the same issues the wpadmin_filter does with naming
add_filter('site_url', 'wplogin_filter', 10, 3);
function wplogin_filter($url, $path, $orig_scheme)
{
    $old = array("/(wp-login\.php)/");
    $new = array("panelbridge");
    return preg_replace($old, $new, $url, 1);
}
    
/**
 * Remove or hide admin WP items
 */
function remove_admin_elements() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    //$wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
    //$wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    //$wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_elements' );

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0 );
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_head', 'wp_resource_hints', 2 );
remove_action('wp_head', 'wp_generator');

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
    return $urls;
}

function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

function my_deregister_scripts(){
    wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

add_filter('jpeg_quality', function($arg){return 92;});

if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 5);

add_filter( 'show_admin_bar', '__return_false' );
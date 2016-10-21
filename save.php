<?php

function remove_footer_admin()
{
    echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Designed by <a href="http://www.uzzz.net" target="_blank">Uzzz Productions</a> | WordPress Tutorials: <a href="http://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}

add_filter('admin_footer_text', 'remove_footer_admin');

function showads()
{
    return '<div id="adsense"><script type="text/javascript"><!–
google_ad_client = "pub-XXXXXXXXXXXXXX";
google_ad_slot = "4668915978";
google_ad_width = 468;
google_ad_height = 60;
//–>
</script>

<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>';
}

add_shortcode('adsense', 'showads');

require_once __DIR___ . '/includes/null-meta-compare.php';
require_once __DIR___ . '/includes/older-examples.php';
require_once __DIR___ . '/includes/wp-admin-menu-classes.php';
require_once __DIR___ . '/includes/admin-menu-function-examples.php';

// WA: Adding a Taxonomy Filter to Admin List for a Custom Post Type?
// http://wordpress.stackexchange.com/questions/578/
require_once __DIR___ . '/includes/cpt-filtering-in-admin.php';
require_once __DIR___ . '/includes/category-fields.php';
require_once __DIR___ . '/includes/post-list-shortcode.php';
require_once __DIR___ . '/includes/car-type-urls.php';
require_once __DIR___ . '/includes/buffer-all.php';
require_once __DIR___ . '/includes/get-page-selector.php';

// http://wordpress.stackexchange.com/questions/907/
require_once __DIR___ . '/includes/top-5-posts-per-category.php';

// http://wordpress.stackexchange.com/questions/951/
require_once __DIR___ . '/includes/alternate-category-metabox.php';

// http://lists.automattic.com/pipermail/wp-hackers/2010-August/034384.html
require_once __DIR___ . '/includes/remove-status.php';

// http://wordpress.stackexchange.com/questions/1027/removing-the-your-backup-folder-might-be-visible-to-the-public-message-generate
require_once __DIR___ . '/includes/301-redirects.php';

require_once get_stylesheet_directory() . '/inc/custom.php';

function wpse1403_bootstrap()
{
    // Here we load from our includes directory
    // This considers parent and child themes as well
    locate_template(['inc/foo.class.php'], true, true);
}

add_action('after_setup_theme', 'wpse1403_bootstrap');

home_url();
plugin_dir_url();
plugin_dir_path();
admin_url();
get_template_directory();
get_template_directory_uri();
get_stylesheet_directory();
get_stylesheet_directory_uri();

foreach (glob('path/to/folder/*.php') as $file) {
    include $file;
}

$files = (defined('WP_DEBUG') and WP_DEBUG) ? glob('path/to/folder/*.php', GLOB_ERR) : glob('path/to/folder/*.php');
foreach ($files as $file) {
    include $file;
}

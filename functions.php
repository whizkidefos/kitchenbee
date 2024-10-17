<?php
// Define constant for version number
define('UIKIT_VERSION', '3.21.11');
define('SWIPER_VERSION', '11.1.12');
define('FONTAWESOME_VERSION', '6.6.0');
define('JQUERY_VERSION', '3.7.1');

// Register Menus
function kitchenbeeMenus() {
    register_nav_menus(
        array (
            'main-menu'  => 'Main Menu',
            'mobile-menu'  => 'Mobile Menu',
        )
     );
}
add_action( 'init', 'kitchenbeeMenus' );

// Load stylesheets and javascript files
function kitchenbeeScripts() {
    // UIKit CSS
    wp_enqueue_style( 'uikit-css', get_template_directory_uri(). '/css/uikit.min.css', array(), UIKIT_VERSION );

    // Google Fonts
    wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=SUSE:wght@100..800&display=swap' );

    // Swiper CSS
    wp_enqueue_style( 'swiper-css', get_template_directory_uri(). '/css/swiper.min.css', array(), SWIPER_VERSION );

    // Font Awesome CSS
    wp_enqueue_style( 'Font_Awesome', get_template_directory_uri(). '/css/fontawesome.min.css', array(), FONTAWESOME_VERSION );

    // Main CSS
    wp_enqueue_style( 'main-css', get_template_directory_uri(). '/css/kitchenbee.css', array('uikit-css', 'googlefonts'), '1.0.0' );

    // JavaScripts
    if ( !is_admin() ) wp_deregister_script('jquery');

    wp_enqueue_script( 'jquery', get_template_directory_uri(). '/js/jquery.min.js', array(), JQUERY_VERSION, 'true' );

    wp_enqueue_script( 'swiper-js', get_template_directory_uri(). '/js/swiper.min.js', array(), SWIPER_VERSION, 'true' );

    wp_enqueue_script( 'uikit-js', get_template_directory_uri(). '/js/uikit.min.js', array(), UIKIT_VERSION, 'true' );
    wp_enqueue_script( 'uikit-js-icons', get_template_directory_uri(). '/js/uikit-icons.min.js', array(), UIKIT_VERSION, 'true' );

    wp_enqueue_script( 'fontawesome-js', get_template_directory_uri(). '/js/fontawesome.min.js', array(), FONTAWESOME_VERSION, 'true' );

    wp_enqueue_script( 'main-js', get_template_directory_uri(). '/js/kitchenbee.js', array('jquery'), '1.0.0', 'true' );

}

add_action( 'wp_enqueue_scripts', 'kitchenbeeScripts' );

// Theme support
include get_theme_file_path( '/inc/theme-support.php' );
// include get_theme_file_path( '/inc/custom-post-types.php' );
include get_theme_file_path( '/inc/custom-login.php' );

// Add Featured Post Meta Box
function add_featured_meta_box() {
    add_meta_box('featured_post', 'Featured Post', 'featured_meta_box_callback', 'post', 'side', 'high');
}
add_action('add_meta_boxes', 'add_featured_meta_box');

// Meta box callback function
function featured_meta_box_callback($post) {
    $value = get_post_meta($post->ID, '_featured_post', true);
    ?>
    <label for="featured_post_checkbox">
        <input type="checkbox" id="featured_post_checkbox" name="featured_post_checkbox" value="1" <?php checked($value, '1'); ?> />
        Mark as a Featured Post/Dish
    </label>
    <?php
}

// Save the featured post meta data
function save_featured_post_meta($post_id) {
    if (array_key_exists('featured_post_checkbox', $_POST)) {
        update_post_meta($post_id, '_featured_post', $_POST['featured_post_checkbox']);
    } else {
        delete_post_meta($post_id, '_featured_post');
    }
}
add_action('save_post', 'save_featured_post_meta');

// Add Featured and Thumbnail Columns to the Posts Admin Table
function add_featured_and_thumbnail_columns($columns) {
    $columns['featured'] = 'Featured';
    $columns['thumbnail'] = 'Thumbnail'; // Add thumbnail column
    return $columns;
}
add_filter('manage_posts_columns', 'add_featured_and_thumbnail_columns');

// Display Featured and Thumbnail Column Content
function display_featured_and_thumbnail_columns($column, $post_id) {
    if ($column === 'featured') {
        $is_featured = get_post_meta($post_id, '_featured_post', true);
        $featured_status = $is_featured ? 'checked' : ''; // Check if the post is featured

        // Output the checkbox (with inline JS for toggling the featured status)
        echo '<input type="checkbox" class="featured-checkbox" data-post-id="' . $post_id . '" ' . $featured_status . '>';
    }

    if ($column === 'thumbnail') {
        // Output the post thumbnail if available
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, 'thumbnail', array('style' => 'max-width: 60px; height: auto;'));
        } else {
            echo '—'; // If no thumbnail, display a dash
        }
    }
}
add_action('manage_posts_custom_column', 'display_featured_and_thumbnail_columns', 10, 2);


// Enqueue admin JS for the featured toggle functionality
function enqueue_admin_featured_toggle_script() {
    wp_enqueue_script('admin-featured-toggle', get_template_directory_uri() . '/js/admin-featured-toggle.js', array('jquery'), null, true);

    // Pass AJAX URL to the script
    wp_localize_script('admin-featured-toggle', 'adminAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('admin_enqueue_scripts', 'enqueue_admin_featured_toggle_script');

// Handle AJAX request to update the featured status
function toggle_featured_post() {
    $post_id = intval($_POST['post_id']);
    $is_featured = get_post_meta($post_id, '_featured_post', true);

    if ($is_featured) {
        delete_post_meta($post_id, '_featured_post'); // Unmark as featured
        echo 'unfeatured';
    } else {
        update_post_meta($post_id, '_featured_post', '1'); // Mark as featured
        echo 'featured';
    }

    wp_die(); // This is required to terminate immediately and return a response
}
add_action('wp_ajax_toggle_featured_post', 'toggle_featured_post');

// Truncate text
function truncate_text($text, $limit = 20) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $positions = array_keys($words);
        $text = substr($text, 0, $positions[$limit]) . '...';
    }
    return $text;
}
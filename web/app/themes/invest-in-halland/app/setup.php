<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Hide admin menu pages
 */
add_action('admin_menu', function() {
    // Hide Posts
    remove_menu_page('edit.php');
});

/**
 * ACF: Auto import/export fields
 */
add_action('init', function() {
    if (class_exists('AcfExportManager\AcfExportManager')) {
        $acfExportManager = new \AcfExportManager\AcfExportManager();
        $acfExportManager->setTextdomain('investinhalland');
        $acfExportManager->setExportFolder(__DIR__ . '/acf');
        $acfExportManager->autoExport(array(
            'questions' => 'group_5cfe66f4e3ea8',
        ));
        $acfExportManager->import();
    }
});

/**
 * ACF: Add options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Innehåll',
        'menu_title'    => 'Innehåll',
        'menu_slug'     => 'theme-general',
        'position'      => 20,
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Utvalda frågor',
        'menu_title'    => 'Utvalda frågor',
        'parent_slug'   => 'theme-general',
    )); 
}

/**
 * Custom Post Type: Article
 */
add_action('init', function() {
    $labels = array(
        'name'                  => _x( 'Artiklar', 'Post Type General Name', 'investinhalland' ),
        'singular_name'         => _x( 'Artikel', 'Post Type Singular Name', 'investinhalland' ),
        'menu_name'             => __( 'Artiklar', 'investinhalland' ),
        'name_admin_bar'        => __( 'Artiklar', 'investinhalland' ),
        'parent_item_colon'     => __( 'Parent Item:', 'investinhalland' ),
        'search_items'          => __( 'Search Item', 'investinhalland' ),
        'items_list'            => __( 'Items list', 'investinhalland' ),
        'items_list_navigation' => __( 'Items list navigation', 'investinhalland' ),
        'filter_items_list'     => __( 'Filter items list', 'investinhalland' ),
    );

    $rewrite = array(
        'slug'                  => 'artiklar',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    
    $args = array(
        'label'                 => __( 'Article', 'investinhalland' ),
        'description'           => __( 'Articles', 'investinhalland' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'author' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-format-quote',
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => $rewrite,
    );
    
    register_post_type( 'article', $args );
}, 0);

/**
 * Custom Post Type: Frågor
 */
add_action('init', function() {
    $labels = array(
        'name'                  => _x( 'Frågor', 'Post Type General Name', 'investinhalland' ),
        'singular_name'         => _x( 'Fråga', 'Post Type Singular Name', 'investinhalland' ),
        'menu_name'             => __( 'Frågor', 'investinhalland' ),
        'name_admin_bar'        => __( 'Frågor', 'investinhalland' ),
        'parent_item_colon'     => __( 'Parent Item:', 'investinhalland' ),
        'search_items'          => __( 'Search Item', 'investinhalland' ),
        'items_list'            => __( 'Items list', 'investinhalland' ),
        'items_list_navigation' => __( 'Items list navigation', 'investinhalland' ),
        'filter_items_list'     => __( 'Filter items list', 'investinhalland' ),
    );

    $rewrite = array(
        'slug'                  => 'fragor',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    
    $args = array(
        'label'                 => __( 'Question', 'investinhalland' ),
        'description'           => __( 'Questions', 'investinhalland' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'author' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-chart-bar',
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => $rewrite,
    );
    
    register_post_type( 'question', $args );
}, 0);

/**
 * Custom Post Type: Nyheter
 */
add_action('init', function() {
    $labels = array(
        'name'                  => _x( 'Nyheter', 'Post Type General Name', 'investinhalland' ),
        'singular_name'         => _x( 'Nyhet', 'Post Type Singular Name', 'investinhalland' ),
        'menu_name'             => __( 'Nyheter', 'investinhalland' ),
        'name_admin_bar'        => __( 'Nyheter', 'investinhalland' ),
        'parent_item_colon'     => __( 'Parent Item:', 'investinhalland' ),
        'search_items'          => __( 'Search Item', 'investinhalland' ),
        'items_list'            => __( 'Items list', 'investinhalland' ),
        'items_list_navigation' => __( 'Items list navigation', 'investinhalland' ),
        'filter_items_list'     => __( 'Filter items list', 'investinhalland' ),
    );
    $rewrite = array(
        'slug'                  => 'nyheter',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    
    $args = array(
        'label'                 => __( 'News', 'investinhalland' ),
        'description'           => __( 'News', 'investinhalland' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'author'),
        'taxonomies'            => array( 'area' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-rss',
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'show_in_nav_rest'      => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => $rewrite
    );
    
    register_post_type( 'news', $args );
}, 0);

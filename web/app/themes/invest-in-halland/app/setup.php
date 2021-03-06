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
    remove_menu_page( 'edit.php' ); // Hide Posts
    remove_menu_page( 'edit.php?post_type=page' ); // Hide Pages
    remove_menu_page( 'edit-comments.php' ); // Hide Comments
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
            'footer' => 'group_5d0774abdb08a',
            'startpage' => 'group_5d526d10f381b',
            'responsible_contact' => 'group_5d517bb2d658f',
            'contact_person' => 'group_5d5262b5eac61',
            'fact' => 'group_5d1ca39e510b8',
            'related_content' => 'group_5d5a90b0d7e12',
            'opportunities' => 'group_5d5ba16b6dfdd',
            'company_stories' => 'group_5d5ba7b55a803',
            'introduction' => 'group_5d5e8cad5c856',
            'contact_page' => 'group_5d651ddd98651',
            'summary' => 'group_5d67dca6c2999',
            'cookie_notice' => 'group_5d77857dbeaf1',
            'fomo' => 'group_5dd3c3707d37a',
            'title_highlight' => 'group_5df0c72d0cfa3',
            'fact_chart' => 'group_5e1d8a76d2eb9',
            'contact_block' => 'group_5e54e5c8e45e8'
        ));
        $acfExportManager->import();
    }
});

/**
 * Custom Post Type: company_story
 */
add_action('init', function() {
    $labels = array(
        'name'                  => _x( 'Företagare berättar', 'Post Type General Name', 'investinhalland' ),
        'singular_name'         => _x( 'Företagare berättar', 'Post Type Singular Name', 'investinhalland' ),
        'menu_name'             => __( 'Företagare berättar', 'investinhalland' ),
        'name_admin_bar'        => __( 'Företagare berättar', 'investinhalland' )
    );

    $rewrite = array(
        'slug'                  => 'foretagare-berattar',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    
    $args = array(
        'label'                 => __( 'Företagare berättar', 'investinhalland' ),
        'description'           => __( 'Företagare berättar', 'investinhalland' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'author' ),
        'taxonomies'            => array( 'area' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-format-quote',
        'menu_position'         => 10,
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
    
    register_post_type( 'company_story', $args );
}, 0);

/**
    * Custom Post Type: Opportunity
*/
add_action('init', function() {
    $labels = array(
        'name'                  => _x( 'Möjligheter', 'Post Type General Name', 'investinhalland' ),
        'singular_name'         => _x( 'Möjlighet', 'Post Type Singular Name', 'investinhalland' ),
        'menu_name'             => __( 'Möjligheter', 'investinhalland' ),
        'name_admin_bar'        => __( 'Möjligheter', 'investinhalland' ),
    );

    $rewrite = array(
        'slug'                  => 'mojligheter-i-halland',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    
    $args = array(
        'label'                 => __( 'Möjligheter', 'investinhalland' ),
        'description'           => __( 'Möjligheter', 'investinhalland' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'author' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-lightbulb',
        'menu_position'         => 11,
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
    
    register_post_type( 'opportunity', $args );
}, 0);

/**
    * Custom Post Type: Fact
*/
add_action('init', function() {
    $labels = array(
        'name'                  => _x( 'Fakta', 'Post Type General Name', 'investinhalland' ),
        'singular_name'         => _x( 'Fakta', 'Post Type Singular Name', 'investinhalland' ),
        'menu_name'             => __( 'Fakta', 'investinhalland' ),
        'name_admin_bar'        => __( 'Fakta', 'investinhalland' ),
    );

    $rewrite = array(
        'slug'                  => 'fakta',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    
    $args = array(
        'label'                 => __( 'Fakta', 'investinhalland' ),
        'description'           => __( 'Fakta', 'investinhalland' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'author' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-chart-bar',
        'menu_position'         => 12,
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
    
    register_post_type( 'fact', $args );
}, 0);

/**
    * Custom Post Type: Contact
*/
add_action('init', function() {
    $labels = array(
        'name'                  => _x( 'Kontaktpersoner', 'Post Type General Name', 'investinhalland' ),
        'singular_name'         => _x( 'Kontaktperson', 'Post Type Singular Name', 'investinhalland' ),
        'menu_name'             => __( 'Kontaktpersoner', 'investinhalland' ),
        'name_admin_bar'        => __( 'Kontaktpersoner', 'investinhalland' ),
    );

    $rewrite = array(
        'slug'                  => 'contact',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    
    $args = array(
        'label'                 => __( 'Kontaktperson', 'investinhalland' ),
        'description'           => __( 'Kontaktperson', 'investinhalland' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'author' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-id',
        'menu_position'         => 12,
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
    
    register_post_type( 'contact', $args );
}, 0);


/**
    * Custom Taxonomy: Area
*/
add_action('init', function () {
	$labels = array(
		'name'                       => _x( 'Områden', 'Taxonomy General Name', 'investinhalland' ),
		'singular_name'              => _x( 'Område', 'Taxonomy Singular Name', 'investinhalland' ),
		'menu_name'                  => __( 'Områden', 'investinhalland' ),
    );
    $rewrite = array(
		'slug'                       => 'omraden',
		'with_front'                 => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'              => true,
        'rewrite'                    => $rewrite,
	);
	register_taxonomy('area', array( 'company_story', 'opportunity', 'fact', 'contact' ), $args );

}, 0 );

/**
    * Custom Taxonomy: Municipality
*/
add_action('init', function () {

	$labels = array(
		'name'                       => _x( 'Kommuner', 'Taxonomy General Name', 'investinhalland' ),
		'singular_name'              => _x( 'Kommun', 'Taxonomy Singular Name', 'investinhalland' ),
		'menu_name'                  => __( 'Kommuner', 'investinhalland' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'              => true,
	);
	register_taxonomy('municipality', array( 'company_story', 'opportunity', 'fact', 'contact' ), $args );

}, 0 );

/**
    * Custom Taxonomy: Actor
*/
add_action('init', function () {
	$labels = array(
		'name'                       => _x( 'Aktörer', 'Taxonomy General Name', 'investinhalland' ),
		'singular_name'              => _x( 'Aktör', 'Taxonomy Singular Name', 'investinhalland' ),
		'menu_name'                  => __( 'Aktörer', 'investinhalland' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'              => true,
	);
	register_taxonomy('actor', array( 'company_story', 'opportunity', 'fact', 'contact' ), $args );

}, 0 );

add_action('acf/init', function() {
	// check function exists
	if( function_exists('acf_register_block') ) {		
		// register a fact block
		acf_register_block(array(
			'name'				=> 'fact',
			'title'				=> __('Fakta'),
			'description'		=> __('Fakta om Halland'),
			'render_template'   => 'template-parts/block/content-fact.php',
			'category'			=> 'formatting',
			'icon'				=> 'info',
			'keywords'			=> array( 'fact' ),
        ));
        
        acf_register_block(array(
            'name'              => 'introduction',
            'title'             => __('Ingress'),
            'description'       => __('Ingress för artikeln'),
            'render_template'   => 'template-parts/block/content-introduction.php',
            'category'          => 'formatting',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'introduction' ),
        ));

        acf_register_block(array(
            'name'              => 'summary',
            'title'             => __('Summering'),
            'description'       => __('Summering i punktform'),
            'render_template'   => 'template-parts/block/content-summary.php',
            'category'          => 'formatting',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'summary' ),
        ));

         acf_register_block(array(
            'name'              => 'contact',
            'title'             => __('Kontakt'),
            'description'       => __('Kontaktperson'),
            'render_template'   => 'template-parts/block/content-inline-contact.php',
            'category'          => 'formatting',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'contact' ),
        ));
	}
});

add_action(
	'rest_api_init',
	function () {
		if ( ! function_exists( 'use_block_editor_for_post_type' ) ) {
			require ABSPATH . 'wp-admin/includes/post.php';
        }
        
        // Add url for use with gatsby
        register_rest_field( array('fact'), 'gatsby_url',
        array(
            'get_callback' => function($post) {
                return str_replace(home_url(), '', get_permalink($post['id']));
            },
        )
        );

		// Surface all Gutenberg blocks in the WordPress REST API
		$post_types = get_post_types_by_support( [ 'editor' ] );

		foreach ( $post_types as $post_type ) {
			if ( use_block_editor_for_post_type( $post_type ) ) {
				register_rest_field(
					$post_type,
					'blocks',
					[
						'get_callback' => function ( array $post ) {
							return parse_blocks( $post['content']['raw'] );
						},
					]
				);
			}
		}
	}
);
// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );

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
        'page_title'    => 'Startsida',
        'menu_title'    => 'Startsida',
        'parent_slug'   => 'theme-general',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Sidfot',
        'menu_title'    => 'Sidfot',
        'parent_slug'   => 'theme-general',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Möjligheter i Halland',
        'menu_title'    => 'Möjligheter i Halland',
        'parent_slug'   => 'theme-general',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Företagare berättar',
        'menu_title'    => 'Företagare berättar',
        'parent_slug'   => 'theme-general',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Kontakta oss',
        'menu_title'    => 'Kontakta oss',
        'parent_slug'   => 'theme-general',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Cookies',
        'menu_title'    => 'Cookies',
        'parent_slug'   => 'theme-general',
    ));


    acf_add_options_sub_page(array(
        'page_title'    => 'Notiser',
        'menu_title'    => 'Notiser',
        'parent_slug'   => 'theme-general',
    ));
}

add_filter('acf/format_value', function ($value, $post_id, $field) {
    if (!function_exists('acf_nullify_empty')) {
        if (empty($value)) {
            return null;
        }

        return $value;
        }
}, 100, 3);

add_filter('acf/format_value/type=post_object', function ( $value, $post_id, $field ) {
	if (!$value) {
        // no value, bail early
        return $value;
    }
    $post = get_post($post_id);
    $area_name = '';
    if(isset($post->post_type)){
        if($post->post_type === 'company_story' || $post->post_type === 'opportunity') {
            $areas = get_the_terms($value->ID, 'area');
            $area_name = $areas && count($areas) ? $areas[0]->name : '';
        }
    }

    if($value->post_type === 'contact') $value->acf = get_fields($value->ID);

    $value->contact = get_field('contact', $value->ID) ? get_field('contact', $value->ID) : null;
    if($value->contact) {
        $value->contact->acf = get_fields($value->contact->ID);
        if($value->contact->acf["image"]) {
            $value->contact->acf["featured_media"] = $value->contact->acf["image"]["ID"];
        }
    }

    $value->area_name = $area_name;
    $value->url = str_replace(home_url(), '', get_permalink($value->ID));
    $value->featured_media = get_post_thumbnail_id($value->ID) ? (int)get_post_thumbnail_id($value->ID) : null;

	return $value;
},  103, 3);

add_filter('acf/format_value/type=relationship', function ( $value, $post_id, $field ) {
	if (!$value) {
        // no value, bail early
        return $value;
    }

    foreach ($value as $key => $post) {
        $area_name = '';
        $areas = get_the_terms($post->ID, 'area');
        $area_name = $areas && count($areas) ? $areas[0]->name : '';

        $post->area = $areas && count($areas) ? $areas : null;
        $post->area_name = $area_name;
        $post->path = str_replace(home_url(), '', get_permalink($post->ID));
        $post->featured_media = get_post_thumbnail_id($post->ID) ? (int)get_post_thumbnail_id($post->ID) : null;
        
        $post->title = $post->post_title;

        $post->contact = get_field('contact', $post->ID) ? get_field('contact', $post->ID) : null;
        $post->highlight = get_field('highlight', $post->ID) ? get_field('highlight', $post->ID) : null;
        $post->fact_chart = get_field('fact_chart', $post->ID) ? get_field('fact_chart', $post->ID) : null;
    }

	return $value;
},  103, 3);

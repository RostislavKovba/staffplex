<?php
/**
 * Staffplex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Staffplex
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'staffplex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function staffplex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Staffplex, use a find and replace
		 * to change 'staffplex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'staffplex', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-left'  => esc_html__( 'Primary left', 'staffplex' ),
				'primary-right' => esc_html__( 'Primary right', 'staffplex' ),
				'menu-footer'   => esc_html__( 'Footer menu', 'staffplex' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'staffplex_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'staffplex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function staffplex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'staffplex_content_width', 640 );
}
add_action( 'after_setup_theme', 'staffplex_content_width', 0 );


/**
 * Delete widgets.
 */
function remove_default_widget() {
	unregister_widget('WP_Widget_Archives'); // Архивы
	unregister_widget('WP_Widget_Calendar'); // Календарь
	unregister_widget('WP_Widget_Categories'); // Рубрики
	unregister_widget('WP_Widget_Meta'); // Мета
	unregister_widget('WP_Widget_Pages'); // Страницы
	unregister_widget('WP_Widget_Recent_Comments'); // Свежие комментарии
	unregister_widget('WP_Widget_Recent_Posts'); // Свежие записи
	unregister_widget('WP_Widget_RSS'); // RSS
	unregister_widget('WP_Widget_Search'); // Поиск
	unregister_widget('WP_Widget_Tag_Cloud'); // Облако меток
	//unregister_widget('WP_Widget_Text'); // Текст 
	unregister_widget('WP_Widget_Media_Audio'); 
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Media_Gallery'); 
	unregister_widget('WP_Widget_Media_Image'); 
    
}
 
add_action( 'widgets_init', 'remove_default_widget', 20 );


/**
 * Unegister admin menu items
 */
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
	remove_menu_page( 'edit-comments.php' );          // Комментарии
}


/**
 * Register widget area.
 */
function staffplex_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Contact form', 'staffplex' ),
			'id'            => 'sidebar-form',
			'description'   => esc_html__( 'Add widgets here.', 'staffplex' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'staffplex' ),
			'id'            => 'sidebar-footer-info',
			'description'   => esc_html__( 'Add widgets here.', 'staffplex' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'staffplex_widgets_init' );


/**
 * Register taxonomies
 */
function add_new_taxonomies() {

/* Filters */
    register_taxonomy('position',
        array('vacancy'),
        array(
            'hierarchical' => false,
            'labels' => array(
                'name'                          => 'Должность',
                'singular_name'                 => 'Должность',
                'search_items'                  => 'Найти Должности',
                'popular_items'                 => 'Популярные Должности',
                'all_items'                     => 'Все Должности',
                'parent_item'                   => null,
                'parent_item_colon'             => null,
                'edit_item'                     => 'Редактировать Должность',
                'update_item'                   => 'Обновить Должность',
                'add_new_item'                  => 'Добавить новую Должность',
                'new_item_name'                 => 'Название новой Должности',
                'separate_items_with_commas'    => 'Розделяйте Должности',
                'add_or_remove_items'           => 'Добавить или удалить Должность',
                'choose_from_most_used'         => 'Выбрать с найболее часто используемых Должностей',
                'menu_name'                     => 'Должность'
            ),

            'show_in_nav_menus'     => true,
            'show_ui'               => true,
            'show_tagcloud'         => true,
            /* нужно ли разрешить облако тегов для этой таксономии */
            'update_count_callback' => '_update_post_term_count',
            /* callback-функция для обновления счетчика $object_type */
            'query_var'             => true,
            'rewrite'               => array(
                /* настройки URL пермалинков */
                'slug'              => 'position', // ярлык
                'hierarchical'      => false // разрешить вложенность

            ),
        )
    );
    
    register_taxonomy('location',
        array('vacancy'),
            array(
                'hierarchical' => true,
                'labels' => array(
                    'name'                          => 'Локация',
                    'singular_name'                 => 'Локация',
                    'search_items'                  => 'Найти локацию',
                    'popular_items'                 => 'Популярные локации',
                    'all_items'                     => 'Все локации',
                    'parent_item'                   => null,
                    'parent_item_colon'             => null,
                    'edit_item'                     => 'Редактировать локацию',
                    'update_item'                   => 'Обновить локацию',
                    'add_new_item'                  => 'Добавить новую локацию',
                    'new_item_name'                 => 'Название новой локации',
                    'separate_items_with_commas'    => 'Розделяйте локации',
                    'add_or_remove_items'           => 'Добавить или удалить локацию',
                    'choose_from_most_used'         => 'Выбрать с найболее часто используемых локаций',
                    'menu_name'                     => 'Локация'
                ),

                'show_in_nav_menus'     => true,
                'show_ui'               => true,
                'show_tagcloud'         => true,
                /* нужно ли разрешить облако тегов для этой таксономии */
                'update_count_callback' => '_update_post_term_count',
                /* callback-функция для обновления счетчика $object_type */
                'query_var'             => true,
                'rewrite'               => array(
                    /* настройки URL пермалинков */
                    'slug'              => 'location', // ярлык
                    'hierarchical'      => true // разрешить вложенность

                ),
            )
        );
}
add_action('init', 'add_new_taxonomies', 0);


/**
 * Register post types.
 */ 
function register_post_vacancy() {
	$labels = array(
		'name' => 'Вакансия',
		'singular_name' => 'Вакансия', 
		'add_new' => 'Добавить вакансию',
		'add_new_item' => 'Добавить новую вакансию',
		'edit_item' => 'Редактировать вакансию',
		'new_item' => 'Новая вакансия',
		'all_items' => 'Все вакансии',
		'view_item' => 'Просмотр вакансий на сайте',
		'search_items' => 'Искать Вакансии',
		'not_found' =>  'Вакансий не найдено.',
		'not_found_in_trash' => 'В корзине нет вакансий.',
		'menu_name' => 'Вакансии' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, 
		'has_archive' => true,
        'hierarchical' => true,
		//'menu_icon' => 'dashicons-hammer', // іконка в меню
		'menu_icon' => 'dashicons-businessman', // іконка в меню
		'menu_position' => 20.1, // порядок в меню
		'supports' => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats'),
        'taxonomies' => array('position', 'location')
	);
	register_post_type('vacancy', $args);
}
add_action( 'init', 'register_post_vacancy' );


function register_post_service() {
	$labels = array(
		'name' => 'Услуга',
		'singular_name' => 'Услуга', 
		'add_new' => 'Добавить услугу',
		'add_new_item' => 'Добавить новую услугу',
		'edit_item' => 'Редактировать услугу',
		'new_item' => 'Новая услуга',
		'all_items' => 'Все услуги',
		'view_item' => 'Просмотр услуг на сайте',
		'search_items' => 'Искать услуг',
		'not_found' =>  'Услуг не найдено.',
		'not_found_in_trash' => 'В корзине нет услуг.',
		'menu_name' => 'Услуги' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, 
		'has_archive' => true,
        'hierarchical' => true,
		'menu_icon' => 'dashicons-lightbulb', // іконка в меню
		'menu_position' => 20.2, // порядок в меню
		'supports' => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats')
	);
	register_post_type('service', $args);
}
add_action( 'init', 'register_post_service' );


function register_post_portfolio() {
	$labels = array(
		'name'            => 'Портфолио',
		'singular_name'   => 'Портфолио', 
		'add_new'         => 'Добавить в портфолио',
		'add_new_item'    => 'Добавить в портфолио',
		'edit_item'       => 'Редактировать портфолио',
		'new_item'        => 'Новая работа',
		'all_items'       => 'Все портфолио',
		'view_item'       => 'Просмотр портфолио на сайте',
		'search_items'    => 'Искать в портфолио',
		'not_found'       => 'Портфолио не найдено.',
		'not_found_in_trash' => 'В корзине нет портфолио.',
		'menu_name'       => 'Портфолио' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, 
		'has_archive' => true,
        'hierarchical' => true,
		'menu_icon' => 'dashicons-building', // іконка в меню
		'menu_position' => 20.3, // порядок в меню
		'supports' => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'text-editor', 'post-formats')
	);
	register_post_type('portfolio', $args);
}
add_action( 'init', 'register_post_portfolio' );


function register_post_team() {
	$labels = array(
		'name' => 'Сотрудник',
		'singular_name' => 'Сотрудник', 
		'add_new' => 'Добавить сотрудника',
		'add_new_item' => 'Добавить новой сотрудника',
		'edit_item' => 'Редактировать сотрудника',
		'new_item' => 'Новый сотрудник',
		'all_items' => 'Все сотрудники',
		'view_item' => 'Просмотр сотрудников на сайте',
		'search_items' => 'Искать сотрудников',
		'not_found' =>  'Сотрудников не найдено.',
		'not_found_in_trash' => 'В корзине нет сотрудников.',
		'menu_name' => 'Команда' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-groups', // іконка в меню
		'menu_position' => 20.4, // порядок в меню
		'supports' => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats')
	);
	register_post_type('team', $args);
}
add_action( 'init', 'register_post_team' );


function register_post_testimonial() {
	$labels = array(
		'name' => 'Отзыв',
		'singular_name' => 'Отзыв', 
		'add_new' => 'Добавить отзыв',
		'add_new_item' => 'Добавить новой отзыв',
		'edit_item' => 'Редактировать отзыв',
		'new_item' => 'Новый отзыв',
		'all_items' => 'Все отзывы',
		'view_item' => 'Просмотр отзывов на сайте',
		'search_items' => 'Искать отзывы',
		'not_found' =>  'Отзывов не найдено.',
		'not_found_in_trash' => 'В корзине нет отзывов.',
		'menu_name' => 'Отзывы' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-editor-quote', // іконка в меню
		'menu_position' => 20.5, // порядок в меню
		'supports' => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', 'revisions')
	);
	register_post_type('testimonial', $args);
}
add_action( 'init', 'register_post_testimonial' );


/**
 * Add options page
 */
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Контактная информация',
		'menu_title'	=> 'Контактная информация',
		'capability'	=> 'edit_posts',
        'post_id'       => 'contacts',
		'icon_url'		=> 'dashicons-phone',
        'position'      => 30,
	));	
}


/**
 * Create columns for post type Portfolio.
 */
add_filter( 'manage_'.'vacancy'.'_posts_columns', 'add_vacancy_column', 4 );
function add_vacancy_column( $columns ){
	$num = 2; // после какой по счету колонки вставлять новые

	$new_columns = array(		
        'position' => 'Должность',
        'location' => 'Локация'
	);

	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}

/* Ad data to column in admin. */
add_action('manage_'.'vacancy'.'_posts_custom_column', 'fill_vacancy_column', 5, 2 );
function fill_vacancy_column( $colname, $post_id ){

    if( $colname === 'position' ){
		$taxonomies = get_the_terms( $post_id, 'position' ); 
        if( is_array( $taxonomies ) ){
            foreach( $taxonomies as $taxonomy ) {
                echo $taxonomy->name.'<br>';
            }
        }
	}
    
    if( $colname === 'location' ){
		$taxonomies = get_the_terms( $post_id, 'location' ); 
        if( is_array( $taxonomies ) ){
            foreach( $taxonomies as $taxonomy ) {
                echo $taxonomy->name.'<br>';
            }
        }
	}
}

/* Make column sortablee */
add_filter( 'manage_'.'edit-vacancy'.'_sortable_columns', 'add_vacancy_sortable_column' );
function add_vacancy_sortable_column( $sortable_columns ){
	$sortable_columns['position'] = [ 'position', false ]; 
	$sortable_columns['location'] = [ 'location', false ]; 
											   // false = asc (по умолчанию)
											   // true  = desc
	return $sortable_columns;
}




/**
 * Enqueue scripts and styles.
 */
function staffplex_scripts() {
	wp_enqueue_style( 'staffplex-style', get_stylesheet_uri(), array(), null );
	wp_style_add_data( 'staffplex-style', 'rtl', 'replace' );
    
    wp_enqueue_style( 'staffplex-range', 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css', array(), null );
    
    
    wp_enqueue_script( 'staffplex-libs', get_template_directory_uri() . '/js/libs.js', array(), null, true );
    wp_enqueue_script( 'staffplex-filter', get_template_directory_uri() . '/js/filter.js', array(), null, true );

    wp_enqueue_script( 'staffplex-rangeslider', 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js', array(), null, true );
    
    wp_enqueue_script( 'staffplex-fontawesome', 'https://kit.fontawesome.com/4176d9cf10.js', array(), null, true );
    
    if( !wp_is_mobile() ) {
        wp_enqueue_script( 'staffplex-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array(), null, true );
        wp_enqueue_script( 'staffplex-tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', array(), null, true );
        wp_enqueue_script( 'staffplex-scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js', array(), null, true );
        wp_enqueue_script( 'staffplex-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js', array(), null, true );
    }
    
    
    wp_enqueue_script( 'staffplex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true );
	
	wp_enqueue_script( 'staffplex-script', get_template_directory_uri() . '/js/script.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'staffplex_scripts' );

/*
 * Include widgets
 */
get_template_part('widgets/contact-form', 'widget');

get_template_part('widgets/footer-info', 'widget');


/**
 * Delete category prefix
 */
add_filter( 'get_the_archive_title_prefix', 'delete_category_prefix' );
function delete_category_prefix( $prefix ){
	$prefix = '';
	return $prefix;
}

/**
 * Change excerpt length
 */
add_filter( 'excerpt_length', function(){
	return 20;
});

/**
 * Change excerpt more
 */
add_filter('excerpt_more', function($more) {
	return '...';
});

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

/*
 * Change max size of upload files
 */
//function PBP_increase_upload( $bytes ) {
//    return 136314880; // 1 megabyte
//}
//add_filter( 'upload_size_limit', 'PBP_increase_upload' );


/*
 * Register strings for translate
 */
pll_register_string('Читать больше', 'read-more');

pll_register_string('Смотреть видеоотзыв', 'watch-video');
pll_register_string('Просмотреть', 'watch');

pll_register_string('Опыт', 'experience');
pll_register_string('Заработная плата', 'wage');
pll_register_string('Очистить', 'clear');

pll_register_string('Должность', 'position');
pll_register_string('Локация', 'location');

pll_register_string('горячая', 'hot');
pll_register_string('топ', 'top');
pll_register_string('за м2', 'square');
pll_register_string('в час', 'hour');

pll_register_string('Связаться с работодателем', 'contact-employer');
pll_register_string('Условия работы', 'conditions');
pll_register_string('График работы', 'schedule');
pll_register_string('Требования', 'requirements');
pll_register_string('Проживание', 'residence');
pll_register_string('Оформление', 'registration');

pll_register_string('Навигация', 'navigation');
pll_register_string('Контакты', 'contacts');
pll_register_string('Наш офис', 'our-office');

pll_register_string('Права', 'rights');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

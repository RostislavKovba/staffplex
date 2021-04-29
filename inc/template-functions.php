<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Staffplex
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function staffplex_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'staffplex_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function staffplex_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'staffplex_pingback_header' );

/**
 * Add a breadcrumb
 */
function the_breadcrumb(){
 
	// получаем номер текущей страницы
	$pageNum = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
 
	$separator = ''; //  »
 
	// если главная страница сайта
	if( is_front_page() ){
 
		if( $pageNum > 1 ) {
			echo '<a href="' . site_url() . '">Головна</a>' . $separator . $pageNum . '-я страница';
		}
 
	} else { // не главная
 
		echo '<a href="' .site_url(). '">' . bloginfo('name') . '</a>' . $separator; 
 
		if( is_single() ){ // записи
 
			the_category(', '); echo $separator; the_title();
 
		} elseif ( is_home() ){ // страницы WordPress 
             
            wp_title('');
 
		} elseif ( is_page() ){ // страницы WordPress 
 
			global $post;
            
            // если у текущей страницы существует родительская
            if ( $post->post_parent ) {

                $parent_id  = $post->post_parent; // присвоим в переменную
                $breadcrumbs = array(); 

                while ( $parent_id ) {
                    $page = get_page( $parent_id );
                    $breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
                    $parent_id = $page->post_parent;
                }

                echo join( $separator, array_reverse( $breadcrumbs ) ) . $separator;

            }
            
            the_title();
 
		} elseif ( is_category() ) {
            
            $current_cat = get_queried_object();
            // если родительская рубрика существует
            if( $current_cat->parent ) {
                echo get_category_parents( $current_cat->parent, true, $separator ) . $separator;
            }
 
			single_cat_title();
 
		} elseif( is_tag() ) {
 
			single_tag_title();
 
		} elseif ( is_day() ) { // архивы (по дням)
 
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $separator;
			echo get_the_time('d');
 
		} elseif ( is_month() ) { // архивы (по месяцам)
 
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
			echo get_the_time('F');
 
		} elseif ( is_year() ) { // архивы (по годам)
 
			echo get_the_time('Y');
 
		} elseif ( is_author() ) { // архивы по авторам
 
			global $author;
			$userdata = get_userdata($author);
			echo 'Опублікував(ла) ' . $userdata->display_name;
 
		} elseif ( is_404() ) { // если страницы не существует
 
			echo 'Помилка 404';
 
		}
 
		if ( $pageNum > 1 ) { // номер текущей страницы
			echo ' (' . $pageNum . '-я страница)';
		}
 
	}
}


/**
 * Filtering reaction
 */
function the_filter_function() {
	$args = array(
        'post_type'   => 'vacancy',
		'orderby'     => 'date',
		//'order'	  => $_POST['date'] // ASC или DESC
	);
 
    $args['tax_query'] = array('relation' => 'AND');
    
    
//    // location
//    if( $location = get_terms( 'location' ) ) :
//        $filter_data = array();
//    
//        foreach ($location as $term) {    
//            if( isset( $_POST[ $term->slug ] ) && $_POST[ $term->slug ] == 'on' ) {
//                $filter_data[] = $term->term_id; 
//            };
//        };
//
//        if( $filter_data ) {
//            $args['tax_query'][] = array(
//                'taxonomy'  => 'location',
//                'field'     => 'id',
//                'terms'     => $filter_data            
//            );
//        };
//
//    endif;
    

    $filters = get_taxonomies( array(), 'objects' );
    foreach( $filters as $fil ) {

        if( $filter = get_terms( $fil->name ) ) {
            $filter_data = array();
        
            foreach ($filter as $term) {
                if( isset( $_POST[ $term->slug ] ) && $_POST[ $term->slug ] == 'on' ) {
                    $filter_data[] = $term->term_id;
                };
            };
            
            if( $filter_data ) {
                $args['tax_query'][] = array(
                    'taxonomy'  => $fil->name,
                    'field'     => 'id',
                    'terms'     => $filter_data
                );
            };
            
        };        
    };
    
    $payment     = explode(";", $_POST['payment']);
    $experience  = explode(";", $_POST['experience']);
    
    $pay_min     = $payment[0];
    $pay_max     = $payment[1];
    $exp_min     = $experience[0];
    $exp_max     = $experience[1];
    

	if( isset( $_POST['payment'] ) )
		$args['meta_query'] = array( 'relation'=>'AND' ); // AND значит все условия meta_query должны выполняться
 

    // Experience filter
//	if( isset( $_POST['experience'] ) )
//		$args['meta_query'][] = array(
//			'key'     => 'vacancy-experience',
//			'value'   => $exp_min,
//			'type'    => 'numeric',
//			'compare' => '>='
//		);
// 
//	if( isset( $_POST['experience'] ) )
//		$args['meta_query'][] = array(
//			'key'     => 'vacancy-experience',
//			'value'   => $exp_max,
//			'type'    => 'numeric',
//			'compare' => '<='
//		);
    

    
        
    // Payment filter
    if( isset( $_POST['payment'] ) )
		$args['meta_query'][] = array(
			'key'     => 'vacancy-payment',
			'value'   => $pay_min,
			'type'    => 'numeric',
			'compare' => '>='
		);
 
	if( isset( $_POST['payment'] ) )
		$args['meta_query'][] = array(
			'key'     => 'vacancy-payment',
			'value'   => $pay_max,
			'type'    => 'numeric',
			'compare' => '<='
		);

    
    //print_r($_POST['experience']);
    
    //print_r($args);
    
 
    $vacancy = new WP_Query($args);

    if ( $vacancy->have_posts() ) : 
        while ( $vacancy->have_posts() ) {
            $vacancy->the_post();
            get_template_part( 'template-parts/content', 'vacancy' );
        };
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    
	die();
    
};

add_action('wp_ajax_myfilter', 'the_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'the_filter_function');


/**
 * Add filter-data to product page
 */
function the_product_filter_info($term = '') {
    $args = array();
    $filters = get_taxonomies( $args, 'objects' ); 
    //echo '<ul>';

    foreach( $filters as $filter ) {
        
        $filter_name    = $filter->labels->name; 
        $filter_value   = get_the_terms( get_the_ID(), $filter->name );
        $data_filter    = '';
        

        if( is_array( $filter_value ) ) {
            foreach( $filter_value as $val ) {
                if ( $data_filter ) {
                    $data_filter  = $data_filter . ', ' . $val->name;
                } else {
                    $data_filter  = $val->name;
                }
            };
            if ( $filter->name == $term ) {
                echo $data_filter;
            }
            
        };
        
    }
    //echo '</ul>';
}

function viber_link() { 
    if( wp_is_mobile() && !preg_match('/iPhone|iPad|iPod/i', $_SERVER ['HTTP_USER_AGENT']) ) {
        $viber_prefix = "";
    } else {
        $viber_prefix = "%2B";
    }
    echo 'viber://chat?number=' . $viber_prefix . preg_replace('~\D+~','', get_sub_field('phone-main'));
}
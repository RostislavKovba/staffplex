<?php
/**
 * Template part for displaying head of content
 */
//$term = get_queried_object();
$headerbg = get_header_image(); 

if ( ( is_single() || is_page() ) && has_post_thumbnail() ) {
    $headerbg = get_the_post_thumbnail_url();
//} elseif ( is_category() && get_field('category-img', $term) ) {
//    $headerbg = get_field('category-img', $term);
}

if ( is_front_page() ) {
    $header_title = get_field('header-title');
    $header_btn   = get_field('header-button');
} elseif ( is_category() ) {
    $header_title = get_the_archive_title( '<h1>', '</h1>' );
} else {
    $header_title = get_the_title();
    $header_btn   = pll__('contact-employer');
}

//if( wp_is_mobile() && !preg_match('/iPhone|iPad|iPod/i', $_SERVER ['HTTP_USER_AGENT']) ) {
//    $viber_prefix = "";
//} else {
//    $viber_prefix = "%2B";
//}

?>

<section class="section pt-0" >
    <div class="container">
        <div class="hero__inner" style="background-image: url('<?php echo $headerbg; ?>'); ">
            <div class="hero__content">
               
               <?php if( !is_front_page() ) : ?> 
                    <div class="breadcrumps">                    
                        <?php the_breadcrumb(); ?>                    
                    </div>
                <?php endif; ?>
                
                <h1><?php echo $header_title; ?></h1>
                
                <p><?php the_field('header-subtitle'); ?></p>
                
                <?php if( get_post_type() == 'vacancy' ) : ?>
                    <ul class="hero-vacancy__desc">
                        <?php get_template_part( 'template-parts/vacancy', 'info' ); ?>
                    </ul>
                <?php endif; ?>
                
                <?php if( is_front_page() || get_post_type() == 'vacancy' ) : ?>
                    <a class="a-btn e--red" href="#footer-form"><?php echo $header_btn; ?></a>
                <?php endif; ?>
                
                <a class="scroll-down" href="#footer-form">
                    <img src="<?php bloginfo('template_url'); ?>/img/base/scroll-down.svg" alt="scroll-down">
                </a>
                
            </div>
        </div>
    </div>
</section>
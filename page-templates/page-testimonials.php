<?php
/* 
 * Template Name: Отзывы 
 */

get_header(); 

$args = array(
    'post_type'   => 'testimonial',
    'orederby'    => 'order',
    'order'       => 'ASC',
);

$testimonials = new WP_Query($args);

if ( $testimonials->have_posts() ) : ?>

<section class="section js-scroll-to">
    <div class="container">       
      
        <?php 
            while( $testimonials->have_posts() ) {
                $testimonials->the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            }; 
        ?>     
                
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
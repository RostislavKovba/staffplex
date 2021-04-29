<?php
/* 
 * Template Name: Вакансии 
 */ 

get_header(); 

$args = array(
    'post_type'   => 'vacancy',
    'orederby'    => 'order',
    'order'       => 'ASC',
);

$vacancy = new WP_Query($args);
if ( $vacancy->have_posts() ) : ?>

<section class="section">
    <div class="container">
        <div class="vacancies">
        
            <aside class="vacancies__aside">
                <?php get_template_part( 'template-parts/filter' ); ?>
            </aside>            
            
            <div class="vacancies__main">     
                <div class="preloader" id="js-preloader"><div></div><div></div></div>
                
                <div id="js-filter-data" class="content vacancies__container">         
                    <?php                     
                        while ( $vacancy->have_posts() ) {
                            $vacancy->the_post();        
                            get_template_part( 'template-parts/content', get_post_type() );
                        };
                    ?>                
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php 
endif;

wp_reset_postdata();

get_footer(); ?>
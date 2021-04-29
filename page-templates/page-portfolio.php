<?php
/* 
 * Template Name: Портфолио 
 */ 

get_header(); 

$args = array(
    'post_type'   => 'portfolio',
    'orederby'    => 'order',
    'order'       => 'ASC',
);

$portfolio = new WP_Query($args);

if ( $portfolio->have_posts() ) : ?>

<section class="section portfolio ">
    <div class="container">
        <div class="portfolio__container">
      
            <?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>

                <div class="portfolio__item">
                    <div class="portfolio-item">
                        <a href="<?php the_permalink(); ?>" class="portfolio-item__desc">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_field('portfolio-subtitle'); ?></p>
                        </a>
                        
                        <div class="portfolio-item__img">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </div>
                    </div>
                </div> 

            <?php endwhile; ?>
                
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
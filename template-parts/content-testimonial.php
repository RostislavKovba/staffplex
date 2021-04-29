<?php 
/**
 * Template part for displaying testiminail item
 */

if( is_front_page() ) : ?>
   
    <div class="testimonials__item">
        <div class="testimonial">
            <div class="testimonial__header">
                <div class="testimonial__img">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="testimonial__title">
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_field('testimonial-position'); ?></p>
                </div>
            </div>
            <div class="testimonial__body">
                <p><?php the_field('testimonial-content'); ?></p>
            </div>

            <a data-fslightbox="gallery" href="<?php the_field('testimonial-video'); ?>">
                <div class="play-link__icon"></div>
                <span><?php pll_e('watch-video'); ?></span>
            </a>
        </div>
    </div>
    
<?php else : ?>

    <div class="testimonials-wrapper">
        <div class="testimonials-item">

            <div class="testimonials-item__body">
                <div class="testimonials-item__top">
                    <div class="testimonials-item__title">
                        <h3><?php the_title(); ?></h3>
                        <span><?php the_field('testimonial-position'); ?></span>
                    </div>
                
                    <a data-fslightbox="gallery" href="<?php the_field('testimonial-video'); ?>">
                        <div class="play-link__icon"></div>
                        <span><?php pll_e('watch-video'); ?></span>
                    </a>
                </div>

                <div class="testimonials-item__desc">
                    <p><?php the_field('testimonial-content'); ?></p>

<!--                     <span class="date"><?php the_date('d-m-Y'); ?></span> -->
                </div>
            </div>

            <div class="testimonials-item__img">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </div>

        </div>
    </div>

<?php endif; ?>
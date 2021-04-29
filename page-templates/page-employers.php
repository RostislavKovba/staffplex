<?php
/* 
 * Template Name: Для работодателей
 */ 
get_header(); ?>

<section class="section e--bg-type-1 benefits-section benefits">
    <div class="container">
        <div class="section-title">
            <h2><?php the_field('employers-why-title'); ?></h2>
            <p><?php the_field('employers-why-subtitle'); ?></p>
        </div>

        <div class="benefits__container">           
           
            <?php if( have_rows('employers-features') ): ?>
            <?php while( have_rows('employers-features') ) : the_row(); ?>

                <div class="benefits__item">
                    <div class="benefit">
                        <div class="benefit__icon">
                            <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('text'); ?>">
                        </div>
                        <p><?php the_sub_field('text'); ?></p>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php endif; ?>            
            
        </div>
    </div>
</section>

<section class="section video-section">
    <div class="container">
        <h2><?php the_field('employers-video-title'); ?></h2>
        <p><?php the_field('employers-video-subtitle'); ?></p>
        
<!--         <div class="video-container">
            <a data-fslightbox="gallery" href='<?php the_field('employers-video'); ?>'>
                <video src="<?php the_field('employers-video'); ?>" alt="video" 
                poster="<?php the_field('employers-preview'); ?>"
                ></video>
            </a>
        </div> -->
    
    </div>
</section>

<section class="section employer-testimonials">
    <div class="container">
        <div class="section-title">
            <h2><?php the_field('employers-testimonial-title'); ?></h2>
        </div>
        <div class="employer-testimonials__container js-employers-testiomonials">
           <?php if( have_rows('employers-testimonials') ): ?>
            <?php while( have_rows('employers-testimonials') ) : the_row(); ?>
			<div class="employer-testimonials__item">
                    <div class="employer-testimonial">
                        <div class="employer-testimonial__video">
                            <?php the_sub_field('video'); ?>
                        </div>
                        <div class="employer-testimonial__title">
                            <h3 class="employer-testimonial__name" ><?php the_sub_field('name'); ?></h3>
                            <p class="employer-testimonial__pos" ><?php the_sub_field('position'); ?></p>
                        </div>
                    </div>
                </div>
           
	
            
        		<?php endwhile; ?>
            <?php endif; ?>   
        </div>
    </div>
</section>

<section class="section video-section">
	<container>
		
	</container>
</section>


<?php get_footer(); ?>
<?php
/* 
 * Template Name: Главная страница 
 */ 
get_header(); ?>

<section class="section e--bg-type-1 js-scroll-to">
    <div class="container e--sm">
        <div class="section-title">
            <h2><?php the_field('about-title'); ?></h2>
        </div>

        <div class="about-us">
            <div class="about-us__left">
                <div class="about-us__slider">
                   
                    <?php if( have_rows('about-slider') ): ?>
                    <?php while( have_rows('about-slider') ) : the_row(); ?>

                        <div class="about-us__img">
                            <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>">
                            <span class="about-us__img-description"><?php the_sub_field('name'); ?></span>
                        </div>
                        
                    <?php endwhile; ?>
                    <?php endif; ?>  
                    
                </div>
            </div>
            
            <div class="about-us__right">
                <div class="about-us__text">
                    <?php the_field('about-text'); ?> 
                    
                    <?php if( have_rows('about-button') ): ?>
                    <?php while( have_rows('about-button') ) : the_row(); ?>

                        <a href="<?php the_sub_field('button-link'); ?>" class="a-btn"><?php the_sub_field('button-text'); ?></a>
                        
                    <?php endwhile; ?>
                    <?php endif; ?>  
    
                    <p class="quote">
<!--                         “<?php the_field('about-quote'); ?>” -->
                        <span><?php the_field('about-sign'); ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="pluses-container">            

            <?php if( have_rows('features-list') ): ?>
            <?php while( have_rows('features-list') ) : the_row(); ?>

                <div class="plus">
                    <div class="plus__icon">
                        <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('title'); ?>">
                    </div>
                    <h2><?php the_sub_field('title'); ?></h2>
                    <p><?php the_sub_field('text'); ?></p>
                </div>

            <?php endwhile; ?>
            <?php endif; ?> 
            
        </div>
    </div>
</section>

<section class="section corparate">
    <div class="container">
        <div class="corparate__inner">
           
            <div class="section-title">
                <h2><?php the_field('staff-title'); ?></h2>
            </div>

            <div class="corparate__img">
                <img src="<?php the_field('staff-video-preview'); ?>" alt="<?php the_field('staff-video-sign'); ?>">
            </div>
            
            <div class="corparate__video-wrapper">
                <div class="corparate__video">
                    <div class="corparate__video-title">
                        <p><?php the_field('staff-video-sign'); ?></p>
                    </div>
                    
                    <div class="corparate__video-body">                       
                        <a data-fslightbox="gallery" href='<?php the_field('staff-video'); ?>'>
                            <div class="corparate__video-icon">
                                <img src="<?php bloginfo('template_url'); ?>/img/svg/play.svg" alt="play">
                            </div>
                        </a>                        
                        <span><?php pll_e('watch'); ?></span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
       
        <div class="get-message">
            <div class="get-message__left">
                <div class="get-message__image">
                    <img src="<?php the_field('subscribe-image'); ?>" alt="new-vacancy">
                </div>
                <div class="get-message__vacancy-wrapper">
                    <div class="get-message__vacancy-icon">
                        <img src="<?php bloginfo('template_url'); ?>/img/svg/message-icon.svg" alt="message">
                    </div>
                    <div class="get-message__vacancy">
                        
                        <div class="get-message__vacancy-title">
                            <p><?php the_field('subscribe-massage-title'); ?></p>
                            <span><?php the_field('subscribe-massage-time'); ?></span>
                        </div>
                        <div class="get-message__vacancy-body">
                            <div class="get-message__vacancy-drop">
                                <img src="<?php bloginfo('template_url'); ?>/img/svg/dropdrop-logo.svg" alt="dropdrop">
                            </div>
                            <p><?php the_field('subscribe-massage-text'); ?></p>
                        </div>
    
                    </div>
                </div>
            </div>

            <div class="get-message__right">
                <div class="get-message__title">
                    <p><?php the_field('subscribe-subtitle'); ?></p>
                    <h2><?php the_field('subscribe-title'); ?></h2>
                </div>

                <p><?php the_field('subscribe-text'); ?></p>
                                
                <?php echo do_shortcode( get_field('subscribe-form') ); ?>                
            </div>
        </div>
        
    </div>
</section>

<section class="section testimonials-section e--sm">
    <div class="container">
        <div class="section-title text-center">
            <h2><?php the_field('testiminials-title'); ?></h2>
            <p><?php the_field('testiminials-subtitle'); ?></p>
        </div>
       
        <div class="testimonials__container">
            <?php
            $review = new WP_Query(['post_type'=>'testimonial', 'posts_per_page'=>'3']);
            if ( $review->have_posts() ) {
                while ( $review->have_posts() ) {
                    $review->the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                };
            };
            wp_reset_postdata();
            ?>            
        </div>
          
        <?php if( have_rows('testiminials-button') ): ?>
        <?php while( have_rows('testiminials-button') ) : the_row(); ?>
            
            <p class="text-center see-more-line">
                <a href="<?php the_sub_field('button-link'); ?>" class="a-btn e--sm"><?php the_sub_field('button-text'); ?></a>
            </p>

        <?php endwhile; ?>
        <?php endif; ?>  
           
    </div>
</section>

<!-- <section class="section rewards">
    <div class="container">
        <div class="rewards__top">
            <div class="section-title">
                <h2><?php the_field('awards-title'); ?></h2>
                <p><?php the_field('awards-subtitle'); ?></p>
            </div>

            <div class="arrows">
                <button class="arrow arrow-left rewards-left">
                    <img src="<?php bloginfo('template_url'); ?>/img/svg/arrow-angle-right.svg" alt="arrow-right">
                </button>
                <button class="arrow arrow-right rewards-right">
                    <img src="<?php bloginfo('template_url'); ?>/img/svg/arrow-angle-right.svg" alt="arrow-right">
                </button>
            </div>
        </div>

        <div class="rewards-slider">           
            <?php
            $images = get_field('awards-slider');
            $size   = 'large'; // (thumbnail, medium, large, full или произвольный размер)

            if( $images ): 
                foreach( $images as $image ): ?>

                    <div class="rewards-slider__item">
                        <img src="<?php echo $image['sizes'][$size]; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>

                <?php endforeach; ?>                        
            <?php endif; ?>            
        </div>
    </div>
</section> -->

<section class="section news-section">
    <div class="container">
        <div class="section-title text-center">
            <h2><?php the_field('news-title'); ?></h2>
            <p><?php the_field('news-subtitle'); ?></p>
        </div>

        <div class="news-section__news">
            <?php
            $news = new WP_Query(['post_type'=>'post', 'posts_per_page'=>'4']);
            if ( $news->have_posts() ) {
                while ( $news->have_posts() ) {
                    $news->the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                };
            };
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>


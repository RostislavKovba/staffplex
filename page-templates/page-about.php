<?php
/* 
 * Template Name: О нас 
 */ 
get_header(); ?>

<section class="section e--bg-type-1 about-text">
    <div class="container">
        <div class="half-sections e--60-40">
            <div class="half-section e--left">
                <?php the_field('company-text'); ?>
            </div>
            
            <div class="half-section e--right e--bg-type-1">
                <div class="image-wrapper">
                    <img src="<?php the_field('company-img'); ?>" alt="">
                </div>
            </div>
        </div>

        <div class="list-section">
            <h3><?php the_field('company-list-title'); ?></h3>
            
            <ul class="check-list e--red">               
                <?php if( have_rows('company-list') ): ?>
                <?php while( have_rows('company-list') ) : the_row(); ?>

                    <li><?php the_sub_field('text'); ?></li>

                <?php endwhile; ?>
                <?php endif; ?>                
            </ul>
        </div>
    </div>   
</section>

<section class="section our-qualities">
    <div class="container">
        <div class="our-qualities__inner" style="background-image: url('<?php the_field('company-statistics-bg'); ?>')">
            <div class="section-title">
                <h2><?php the_field('company-statistics-title'); ?></h2>
                <p><?php the_field('company-statistics-subtitle'); ?></p>
            </div>

            <div class="our-qualities__container">
               
                <?php if( have_rows('company-statistics-list') ): ?>
                <?php while( have_rows('company-statistics-list') ) : the_row(); ?>

                    <div class="our-qualities__item">
                        <div class="quality">
                            <div class="quality__num">
                                <span><?php the_sub_field('number'); ?></span>+
                            </div>
                            <p class="quality__desc">
                                <?php the_sub_field('text'); ?>
                            </p>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php endif; ?>  
                
            </div>
        </div>
    </div>
</section>

<section class="section corparate">
    <div class="container">
        <div class="corparate__inner">
           
            <div class="section-title">
                <h2><?php the_field('company-video-title'); ?></h2>
                <p><?php the_field('company-video-subtitle'); ?></p>
            </div>

            <div class="corparate__img">
                <img src="<?php the_field('company-video-preview'); ?>" alt="<?php the_field('company-video-sign'); ?>">
            </div>
            
            <div class="corparate__video-wrapper">
                <div class="corparate__video">
                    <div class="corparate__video-title">
                        <p><?php the_field('company-video-sign'); ?></p>
                    </div>
                    
                    <div class="corparate__video-body">                       
                        <a data-fslightbox="gallery" href='<?php the_field('company-video'); ?>'>
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

<section class="section team">
    <div class="container">
        <div class="section-title">
            <h2><?php the_field('company-team-title'); ?></h2>
            <p><?php the_field('company-team-subtitle'); ?></p>
        </div>

        <div class="team__container">  
          
            <?php 
            $args = array(
                'post_type'   => 'team',
                'orederby'    => 'order',
                'order'       => 'ASC',
            );

            $team = new WP_Query($args);

            if ( $team->have_posts() ) : 
            while ( $team->have_posts() ) : $team->the_post(); ?>

                <div class="team__item">
                    <div class="item-round">
                        <div class="item-round__img">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field('team-position'); ?></p>
                    </div>
                </div>

            <?php
            endwhile;
            endif; ?>
            
        </div>
    </div>
</section>

<?php get_footer(); ?>
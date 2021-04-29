<?php
/* 
 * Template Name: Контакты
 */ 
get_header(); ?>

<section class="section contact-section pt-0">
    <div class="container">
        
        <div class="half-sections e--40-60">
            <div class="half-section e--left">
                <div class="section-title">
                    <h2><?php the_field('contacts-title'); ?></h2>
                    <p><?php the_field('contacts-subtitle'); ?></p>
                </div>
                
                <div class="contact-form">                                
                    <p><?php echo do_shortcode( get_field('contacts-form') ); ?></p>
                </div>
            </div>
            
            <div class="half-section e--right">
                <div class="contact-section__map">
                    <?php the_field('contact-map', 'contacts'); ?>   
                </div>
                
                <div class="contact-section__contact-items">
                    <div class="contact-item">
                        <div class="contact-item__img">
                            <img src="<?php bloginfo('template_url'); ?>/img/svg/email-icon.svg" alt="email">
                        </div>
                        <div class="contact-item__desc">
                            <a href="mailto:<?php the_field('contact-mail', 'contacts'); ?>"><?php the_field('contact-mail', 'contacts'); ?></a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-item__img">
                            <img src="<?php bloginfo('template_url'); ?>/img/svg/call-icon.svg" alt="call">
                        </div>
                        <div class="contact-item__desc">
                            <?php if( have_rows('contact-phones', 'contacts') ): ?>
                            <?php while( have_rows('contact-phones', 'contacts') ) : the_row(); ?>

                                <a href="tel:<?php the_sub_field('phone-main'); ?>"><?php the_sub_field('phone-main'); ?></a>
                                <a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a>

                            <?php endwhile; ?>
                            <?php endif; ?>                            
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-item__img">
                            <img src="<?php bloginfo('template_url'); ?>/img/svg/home-icon.svg" alt="home">
                        </div>
                        <div class="contact-item__desc">
                            <span>
                                <?php the_field('contact-adress', 'contacts'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<?php get_footer(); ?>
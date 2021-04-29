<?php
/**
 * Template part for displaying socials
 */
?>

<?php if( have_rows('contact-socials', 'contacts') ): ?>
<?php while( have_rows('contact-socials', 'contacts') ) : the_row(); ?>

    <?php if( get_sub_field('youtube') ) : ?>
        <a href="<?php the_sub_field('youtube'); ?>">
            <img src="<?php bloginfo('template_url'); ?>/img/socials/youtube.svg" alt="youtube">
        </a>        
    <?php endif; ?>
    
    <?php if( get_sub_field('facebook') ) : ?>
        <a href="<?php the_sub_field('facebook'); ?>">
            <img src="<?php bloginfo('template_url'); ?>/img/socials/facebook.svg" alt="facebook">
        </a>        
    <?php endif; ?>
    
    <?php if( get_sub_field('instagram') ) : ?>
        <a href="<?php the_sub_field('instagram'); ?>">
            <img src="<?php bloginfo('template_url'); ?>/img/socials/instagram.svg" alt="instagram">
        </a>
    <?php endif; ?>
    
<?php endwhile; ?>
<?php endif; ?> 
<?php
/**
 * The template for displaying the footer
 */

if ( !is_page_template('page-templates/page-contacts.php') ) {
    dynamic_sidebar( 'sidebar-form' );
};

?>
   
    </main>
    
  
    
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5H7Q2X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
	<footer class="footer">
        <div class="container">
            <div class="footer-cols">
                <div class="footer-col">
                   
                    <?php
                        if ( is_active_sidebar( 'sidebar-footer-info' ) ) {    
                            dynamic_sidebar('sidebar-footer-info'); 
                        }
                    ?>
                    
                    <div class="footer__socials">
                        <?php get_template_part( 'template-parts/socials' ); ?>
                    </div>
                </div>

                <div class="footer-col">
                    <h4><?php pll_e('navigation'); ?></h4>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'menu-footer',
                            'menu_id'         => 'menu-footer',
                            'container'       => ''
                        )
                    );
                    ?>
                </div>

                <div class="footer-col">
                    <h4><?php pll_e('contacts'); ?></h4>
                    <ul>
                        <?php if( have_rows('contact-phones', 'contacts') ): ?>
                        <?php while( have_rows('contact-phones', 'contacts') ) : the_row(); ?>

                            <a href="tel:<?php the_sub_field('phone-main'); ?>"><?php the_sub_field('phone-main'); ?></a>
                            <a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a>

                        <?php endwhile; ?>
                        <?php endif; ?>  
                    </ul>
                </div>

                <div class="footer-col">
                    <h4><?php pll_e('our-office'); ?></h4>
                    <div class="address">
                        <img src="<?php bloginfo('template_url'); ?>/img/svg/marker.svg" alt="marker">
                        <p><?php the_field('contact-adress', 'contacts'); ?></p>
                    </div>
                    
                    <div class="footer__map">
                        <?php the_field('contact-map', 'contacts'); ?>
                    </div>
                </div>
            </div>
            <div class="footer__copyright copyright-footer">

                <div class="footer__copyright__inner">
                    <p><?php echo date("Y"); ?>
 © “<?php bloginfo('name'); ?>”. <?php pll_e('rights') ?></p>
                    <div class="copyright-footer__info"><span> </span> 
                </div>

            </div>	
        </div>
    </footer>

<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16941588/crm/site_button/loader_4_cijd5d.js');
</script>
		
<?php wp_footer(); ?>
		
<script src="//assets.pcrl.co/js/jstracker.min.js"></script>
		
</body>
</html>

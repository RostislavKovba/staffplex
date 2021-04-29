<?php
/**
 * The header for our theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-185771786-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-185771786-1');
</script>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W5H7Q2X');</script>
<!-- End Google Tag Manager -->

	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	


</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	 <header class="header">
       
        <div class="header-top">
            <div class="container">
                <div class="header-top__inner">
                   
                    <div class="header-top__phones">
                        <?php if ( have_rows('contact-phones', 'contacts') ) : ?>
                        <?php while ( have_rows('contact-phones', 'contacts') ) : the_row(); ?>
                        
                            <div class="header-top__icons">
                               
                                <a href="tel:+<?php the_sub_field('phone-main'); ?>" class="header-top__contact">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="https://wa.me/<?php preg_replace('~\D+~','', get_sub_field('phone-main')); ?>" class="header-top__contact">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="<?php viber_link(); ?>" class="header-top__contact">
                                    <i class="fab fa-viber"></i>
                                </a>
                        
                            </div>

                            <div class="header-top__phones-list">
                                
                                <a href="tel:+<?php the_sub_field('phone-main'); ?>" class="header-top__contact">
                                    <span>+<?php the_sub_field('phone-main'); ?></span>
                                </a>
                                
                                <?php if( get_sub_field('phone') ) : ?>
                                    <a href="tel:+<?php the_sub_field('phone'); ?>" class="header-top__contact">
                                        <span>+<?php the_sub_field('phone'); ?></span>
                                    </a>
                                <?php endif; ?>
         
                            </div>
                            
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="header-top__action">
                        <div class="header-top__action-socials">
                            <?php get_template_part( 'template-parts/socials' ); ?>
                        </div>
                        
                        <div class="lang header-top__action-lang" >
                            <div class="lang-title js-lang"><?php echo pll_current_language( 'slug' ); ?></div>
                            <ul class="lang-list">
                               <?php 
                                    $languages = pll_the_languages(array('raw'=>true)); 
                                    foreach( $languages as $lang ) {
                                        if ( !$lang['current_lang'] ) {
                                ?>

                                        <li><a href="<?php echo $lang['url']; ?>" lang="<?php echo $lang['slug']; ?>" hreflang="<?php echo $lang['slug']; ?>"><?php echo $lang['slug']; ?></a></li>

                                <?php } } ?>  
                            </ul>                                    
                        </div>                        
                    </div>
                    
                </div>
            </div>
        </div>
    
        <div class="header-main">
            <div class="container">
                <div class="header-main__inner header__inner">
                    
                    <div class="logo e--mobile">
                        <a href="<?php echo pll_home_url(); ?>" class="custom-logo-link" rel="home">
                            <img src="<?php bloginfo('template_url'); ?>/img/base/logo_color_<?php echo pll_current_language(); ?>.svg" class="custom-logo" alt="Staffplex-<?php echo pll_current_language(); ?>">
                        </a>
                    </div>
                    
                    <div class="header__burger">
                        <i class="fas fa-bars"></i>
                        <i class="fas fa-times"></i>
                    </div>
                    
                    <div class="header__content">                        
                        <div class="header__nav">
                            <nav>                               
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'primary-left',
                                        'menu_id'         => 'primary-left',
                                        'container'       => ''
                                    )
                                );
                                ?>
                                
                                <div class="logo">
                                    <a href="<?php echo pll_home_url(); ?>" class="custom-logo-link" rel="home">
                                        <img src="<?php bloginfo('template_url'); ?>/img/base/logo_color_<?php echo pll_current_language(); ?>.svg" class="custom-logo" alt="Staffplex-<?php echo pll_current_language(); ?>">
                                    </a>
                                </div>
                                
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'primary-right',
                                        'menu_id'         => 'primary-right',
                                        'container'       => ''
                                    )
                                );
                                ?>                                
                            </nav>
                        </div>                        
                    </div>
                    
                </div>
            </div>    
        </div>
        
    </header>
    
    <main>

    <?php get_template_part( 'template-parts/content', 'header' ); ?>
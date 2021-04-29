<?php
/**
 * Template part for displaying posts
 */

if( is_front_page() || is_home() ) : ?>

    <div class="news-section__news-item" id="post-<?php the_ID(); ?>">
        <div class="news-item">

            <div class="news-item__top">
                <div class="news-item__image">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </div>

                <div class="news-item__info">
                    <span class="theme">
                        <?php the_tags( '<span>', '</span><span>', '</span>' ); ?>
                    </span>
                    <div class="date"> 
                        <div class="date-inner">
                            <?php the_date('d F'); ?>
                        </div>
                    </div>   
                </div>
            </div>

            <div class="news-item__desc">
                <a href="<?php the_permalink(); ?>">
                    <h2 class="news-item__title"><?php the_title(); ?></h2>
                </a>
                <p class="news-item__text"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="link">
                    <?php pll_e('read-more'); ?> <img src="<?php bloginfo('template_url'); ?>/img/svg/Arrow-red-left.svg" alt="arrow-left">
                </a>
            </div>

        </div>
    </div><!-- .news-section__news-item -->

<?php else : ?>
  
    <section class="section work-text">
        <div class="container">        
            <div class="work-text__text">
                <?php the_content(); ?>
            </div>
        </div>
    </section><!-- page-content -->
    
<?php endif; ?>
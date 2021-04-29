<?php
/* 
 * Template part for displaying vacancy
 */

if ( is_single() ) : ?>

    <section class="section pt-0">
        <div class="container">
            <div class="vacancy-desc__container">
              
                <?php if( have_rows('vacancy-parameters') ): ?>
                <?php while( have_rows('vacancy-parameters') ) : the_row(); ?>
                   
                    <div class="vacancy-desc__item">
                        <div class="vacancy-desc">
                            <h2 class="vacancy-desc__title">
                                <?php pll_e( get_sub_field('title') ); ?>:
                            </h2>
                            <p><?php the_sub_field('text'); ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php endif; ?>     

            </div>
        </div>
    </section>

<?php else : ?>  
  
    <?php 
        $vacancy_class = '';
        if( get_field('vacancy-top')=='on' ) {
            $vacancy_class = 'top';
        }; 
    ?>
   
    <div class="vacancies__item <?php echo $vacancy_class; ?>">
        <article class="vacancy">
            <a href="<?php the_permalink(); ?>" class="vacancy__top">
                <div class="vacancy__img">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </div> 

                <div class="vacancy__info">
                    <div class="vacancy__info-spans">
                        <?php if(get_field('vacancy-hot')=='on'): ?><span class="hot"><?php pll_e('hot'); ?></span><?php endif; ?>
                        <?php if(get_field('vacancy-top')=='on'): ?><span class="top"><?php pll_e('top'); ?></span><?php endif; ?>
                    </div>
                </div>
            </a>

            <div class="vacancy__bottom">
                <h2 class="vacancy__title"><?php the_title(); ?></h2>

                <ul class="vacancy__desc">
                    <?php get_template_part( 'template-parts/vacancy', 'info' ); ?>
                </ul>

                <p class="vacancy__duties">
                    <?php the_field('vacancy-duties'); ?>
                </p>

                <a href="<?php the_permalink(); ?>" class="vacancy__link">
                    <?php pll_e('read-more'); ?> <img src="<?php bloginfo('template_url'); ?>/img/svg/arrow-blue.svg" alt="arrow">
                </a>
            </div>
        </article>
    </div>
    
<?php endif; ?>
<?php
/**
 * The template for displaying service posts
 */

if( have_rows('service-content') ):
while ( have_rows('service-content') ) : the_row();

    if( get_row_layout() == 'text-section' ): ?>

        <section class="section e--bg-type-1 text-section">
            <div class="container">
                <p><?php the_sub_field('text'); ?></p>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'num-list-section' ): ?>

        <section class="section visa-conditions"> 
            <div class="container">
                <h2><?php the_sub_field('title'); ?></h2>                
                
                <div class="visa-conditions__container">
                   
                    <?php if( have_rows('num-list') ): ?>
                    <?php while( have_rows('num-list') ) : the_row(); ?>

                        <div class="visa-conditions__item">
                            <div class="number-item">
                                <p><?php the_sub_field('text'); ?></p>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <?php endif; ?>                    
                                        
                </div>
            </div>
        </section>
        
    <?php elseif( get_row_layout() == 'list-section' ): ?>
    
        <section class="section list-conditions">
            <div class="container">
                <h2><?php the_sub_field('title'); ?></h2>
                
                <ul class="check-list">
                   
                    <?php if( have_rows('num-list') ): ?>
                    <?php while( have_rows('num-list') ) : the_row(); ?>

                        <li><?php the_sub_field('text'); ?></li>

                    <?php endwhile; ?>
                    <?php endif; ?>                     
                    
                </ul>
            </div>
        </section>

    <?php endif;

endwhile;
endif; 
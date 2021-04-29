<?php
/**
 * The template for displaying archive pages
 */
get_header(); ?>

<section class="section news-section news-page pt-0">
    <div class="container">
        <div class="news-section__news">

		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

        </div>
    </div>
</section>

<?php
get_footer();
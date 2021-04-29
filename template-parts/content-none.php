<?php
/**
 * Template part for displaying a message that posts cannot be found
 */
?>

<section class=" section work-textno-results not-found">
	<div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'staffplex' ); ?></h1>
        </header><!-- .page-header -->
        
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'staffplex' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'staffplex' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'staffplex' ); ?></p>
			<?php
            if( !is_page_template('page-templates/page-vacancies.php') || get_post_type() !== 'vacancy' ) {
            //if( get_post_type() !== 'vacancy' ) {
                get_search_form();
            };

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
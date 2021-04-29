<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Staffplex
 */

if ( ! is_active_sidebar( 'sidebar-form' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-form' ); ?>
</aside><!-- #secondary -->

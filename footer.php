<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gunnar
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer front-page__footer">
		
		<section class="footer-control-panel">
			
		<div class="custom-logo">
			<?php
			$customLogo = get_field('gunnar_logotype', 'option');
			echo file_get_contents( $customLogo );
			?>
		</div>
		
		<nav id="projects-navigation" class="projects-navigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gunnar' ); ?></button> -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		
		</section>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

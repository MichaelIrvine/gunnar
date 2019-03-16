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

	<footer id="colophon" class="site-footer">
		
		<section class="footer-control-panel">
		
		<div class="custom-logo__footer">
			<a href="http://localhost:8888/gunnar/">
			<?php
			$customLogoFooter = get_field('gunnar_logotype', 'option');
			echo file_get_contents( $customLogoFooter );
			?>
			</a>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gunnar' ); ?></button> -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		
		</section>

		<section class="footer-nav-about_container">
		

		<div class="footer-about">
			<?php the_field('footer_about_section', 'option'); ?>
		</div>
		</section>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

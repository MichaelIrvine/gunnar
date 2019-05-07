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
			
		<div class="custom-logo footer-el">
			<?php
			$customLogo = get_field('gunnar_logotype', 'option');?>
			<a href="https://gunnarfloral.com">
				<?php echo file_get_contents( $customLogo ); ?>
			</a>
			
			
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

		<section class="contact">
			<!-- Contact Headin SVG -->
			<div class="contact-title footer-el">
				<?php
				$contactTitle = get_field('contact_title', 'option');
				echo file_get_contents( $contactTitle );
				?>
			</div>
			<div class="contact-info">
				<?php if( have_rows('contact_info', 'option') ): ?>

					<ul class="contact-info-list">

					<?php while( have_rows('contact_info', 'option') ): the_row(); 

						// vars
						$link = get_sub_field('contact_info_link', 'option');
						$linkText = get_sub_field('contact_info_link_text', 'option');

						?>

						<li class="contact-info-item">

							<?php if( $link ): ?>
								<a href="<?php echo $link; ?>" target="_blank">
							<?php endif; ?>

								<p><?php echo $linkText; ?></p>

							<?php if( $link ): ?>
								</a>
							<?php endif; ?>

							<?php echo $content; ?>

						</li>

					<?php endwhile; ?>

					</ul>

				<?php endif; ?>

			</div>
			<div class="contact-flower footer-el">
				
				<?php 

				$contactFlower = get_field('contact_flower', 'option');

				if( !empty($contactFlower) ): ?>

					<img src="<?php echo $contactFlower['url']; ?>" alt="<?php echo $contactFlower['alt']; ?>" />

				<?php endif; ?>
			</div>
			
		</section>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

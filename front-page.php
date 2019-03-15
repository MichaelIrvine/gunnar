<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gunnar
 */

get_header();
?>
	
	<div id="primary__front-page" class="content-area__front-page">
		<main id="main__front-page" class="site-main__front-page">
			
			<div class="custom-logo">
				<?php
				$customLogo = get_field('gunnar_logotype', 'option');
				echo file_get_contents( $customLogo );
				?>
			</div>
		<!-- FRONT PAGE VIDEO LOOP -->
		<!-- RANDOM VIDEO BACKGROUND -->

		<?php
		$rows = get_field('front_page_video');
		$rand_row = $rows[ array_rand( $rows ) ];
		$rand_row_video = $rand_row['background_video'];
		?>

		<video autoplay muted loop class="fp-video-cover">
			<source src="<?php echo $rand_row_video; ?>" type="video/mp4">
		</video>
		<section class="fp-section-2">
		

		</section>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php

get_footer();

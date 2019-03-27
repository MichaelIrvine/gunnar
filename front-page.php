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
		<div class="cover-loader"></div>

	<div id="primary__front-page" class="content-area__front-page">
		<main id="main__front-page" class="site-main__front-page">

		<!-- FRONT PAGE VIDEO LOOP -->
		<!-- RANDOM VIDEO BACKGROUND -->

		<?php
		$rows = get_field('page_video_background', 'option');
		$rand_row = $rows[ array_rand( $rows ) ];
		$rand_row_video = $rand_row['background_video'];
		?>

		<video autoplay muted loop class="fp-video-cover">
			<source src="<?php echo $rand_row_video; ?>" type="video/mp4">
		</video>
		
		</main><!-- #main -->
	</div><!-- #primary -->


<?php

get_footer();

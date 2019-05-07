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

//  ORIGINAL FRONT PAGE -- SWITCH BACK TO THIS ONCE COMING SOON FP IS NO LONGER NEEDED





get_header();
?>


	<div id="primary__front-page" class="content-area__front-page">
		<main id="main__front-page" class="site-main__front-page">

		<!-- <?php 

		$mobileBackground = get_field('mobile_background', 'option'); 

		?> -->
		
		

		<!-- FRONT PAGE VIDEO LOOP -->
		<!-- RANDOM VIDEO BACKGROUND -->

		<?php
		$rows = get_field('page_video_background', 'option');
		$rand_row = $rows[ array_rand( $rows ) ];
		$rand_row_video = $rand_row['background_video'];
		
		?>
		
		<a href="#colophon" class="fp-colophon-link is-active">
		<!-- MOBILE BACKGROUND IMAGE -->
		<!-- <div class="fp-mobile-background" style="background-image: url('<?php echo $mobileBackground; ?>')"></div> -->
		<!-- DESKTOP BACKGROUND VIDEO -->
		<video autoplay playsinline muted loop class="fp-video-cover video-cover">
			<source src="<?php echo $rand_row_video; ?>" type="video/mp4">
		</video>
		</a>
		
		</main><!-- #main -->
	</div><!-- #primary -->


<?php

get_footer();

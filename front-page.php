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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<!-- TEMPORARY COMING SOON ACF LOOP -->

		
		<section class="coming-soon grid-wrapper">
		<?php
			
			$text  = get_field('coming_soon_text');
			$email = get_field('coming_soon_email');
			$cover = get_field('coming_soon_cover');
			$image = get_field('coming_soon_image');

			?>
			<!-- Column 1 - GUNNAR - Email Info-->
			<div class="col-1">
				<p class="cs-email" ><a href="mailto:info@gunnarfloral.com"><?php echo $email;?></a></p> 			
			</div>

		
		<!-- Column 2 GUNNAR - Image & Logotype -->
		<div class="col-cover col-3">

			<div class="cs-image-container">
			<!-- GUNNAR TEXT -->
				<div class="col-2">
					<p class="coming-soon-text">g</p>
					<p class="coming-soon-text">u</p>
					<p class="coming-soon-text">n</p>
					<p class="coming-soon-text">n</p>
					<p class="coming-soon-text">a</p>
					<p class="coming-soon-text">r</p>
				</div>
			<!-- IMAGE & COVER SVG -->
				<div class="image-cover"><?php echo file_get_contents( $cover ); ?></div>
				<img class="image-behind" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			<!-- FLORAL TEXT -->
				<!-- <div class="col-4">
					<p class="coming-soon-text">f</p>
					<p class="coming-soon-text">l</p>
					<p class="coming-soon-text">o</p>
					<p class="coming-soon-text">r</p>
					<p class="coming-soon-text">a</p>
					<p class="coming-soon-text">l</p>
				</div>				 -->
			</div>

		</div>
			<!-- Coming Soon -->
			<div class="col-5">
				<p class="coming-soon" >Coming Soon</p> 			
			</div>
		 </section>

		<!-- END OF COMING SOON SECTION -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

// get_footer();

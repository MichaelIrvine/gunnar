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
			
			$text = get_field('coming_soon_text');
			$image = get_field('coming_soon_image');
			?>
			<p class="coming-soon-text"><?php echo $text;?></p> 
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

		 </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

// get_footer();

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

	<div id="cs-primary" class="content-area">
		<main id="cs-main" class="site-main cs-main">
		
		<?php 

		$mobileBackground = get_field('mobile_background', 'option'); 

		?>
		
		<!-- <div class="cs-mobile-background" style="background-image: url('<?php echo $mobileBackground; ?>')"></div> -->

		<div class="cs-page-video-background">
		<?php
		$rows = get_field('page_video_background', 'option');
		$rand_row = $rows[ array_rand( $rows ) ];
		$rand_row_video = $rand_row['background_video'];
		?>

		<video autoplay muted loop class="cs-pages-video-cover">
			<source src="<?php echo $rand_row_video; ?>" type="video/mp4">
		</video>
		</div>

		<div class="cs-title-container">
			<div class="cs-title" aria-hidden="true">
				<?php
				$csTitle = get_field('coming_soon_title');
				echo file_get_contents( $csTitle );
				?>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

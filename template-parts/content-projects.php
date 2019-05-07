<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gunnar
 */

?>

		<?php 

		$mobileBackground = get_field('mobile_background', 'option'); 

		?>
		
		<!-- <div class="mobile-background" style="background-image: url('<?php echo $mobileBackground; ?>')"></div> -->

<!-- RANDOM VIDEO BACKGROUND -->
	<div class="project-page-video-background">
		<?php
		$rows = get_field('page_video_background', 'option');
		$rand_row = $rows[ array_rand( $rows ) ];
		$rand_row_video = $rand_row['background_video'];
		?>

		<video autoplay muted loop class="project-pages-video-cover">
			<source src="<?php echo $rand_row_video; ?>" type="video/mp4">
		</video>
	</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<div class="project-page-title">
			<?php
			$projectTitle = get_field('project_page_title');
			echo file_get_contents( $projectTitle );
			?>
		</div>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title visually-hidden">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title visually-hidden"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gunnar' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
			
		) );

		
		?>

		<!-- <div class="project-outer-container"> -->
		<?php
		echo '<ul class="project-list slick-gallery__projects">';
		// check if the flexible content field has rows of data
		if( have_rows('projects_gallery') ):

			// loop through the rows of data
			while ( have_rows('projects_gallery') ) : the_row();
				
				if( get_row_layout() == 'project' ):
					
					echo '<li class="project-item">';
					$image = get_sub_field('project_image');
					$projectTitle = get_sub_field('project_title');

					echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
					echo '<h2 class="project-title">' . $projectTitle . '</h2>';
				endif;
				echo '</li>';
				
			endwhile;
			
		else :

			// no layouts found

		endif;
		echo '</ul>';
		?>
		</div> <!-- .project-outer-container -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php gunnar_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

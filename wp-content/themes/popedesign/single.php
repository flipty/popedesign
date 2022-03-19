<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

		/* Start the Loop */
		while ( have_posts() ) : the_post();
		?>

			<h1>SINGLE.PHP <?php the_title();?></h1>
			<?php the_content();?>

		<?php
		endwhile; // End the loop.

get_footer();

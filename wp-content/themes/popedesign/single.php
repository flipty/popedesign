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
	<main>

		<section class="subpage-head-small"><!--logic for color-->
		    <div class="container">
		      <div class="inner">
		          <h1>
		            Headline
		          </h1>
		      </div>
		    </div>
		</section>

		<div class="container">
			<?php the_content();?>
		</div>

	</main>



		<?php
		endwhile; // End the loop.

get_footer();

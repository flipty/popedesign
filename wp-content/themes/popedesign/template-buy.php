<?php
/**
 * Template Name: Buy
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-artists
 */

get_header();
?>

    <?php

    /* Start the Loop */
    while ( have_posts() ) : the_post(); //this is to get the post object
    echo 'wtf';
  	endwhile; // End the loop.
    ?>

<?php
 get_footer();

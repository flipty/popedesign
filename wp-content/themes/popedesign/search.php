<?php
/**
 * Template Name: Search
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * search
 */

get_header();
?>
<main>

<div class="container">
  <h1 class="page-title contained">
    <?php if (empty($_GET['s'])) { ?>
      Search Our Episodes & Posts
    <?php } ?>
    <?php if (!empty($_GET['s'])) { ?>
      <?php _e( 'Search results for: ', 'popedesign' ); ?><em><?php echo get_search_query(); ?></em>
    <?php } ?>
  </h1>
  <?php //echo get_search_form();

  if (!empty($_GET['s'])) {
    if ( have_posts() ) : ?>
    <div class="search-results">
    <?php
    // Start the Loop.
    while ( have_posts() ) :
      the_post();
      $post_type = get_post_type();
      ?>
      <div class="search-result <?php echo $post_type;?> <?php echo 'post-' . get_the_ID();?>">
        <a href="<?php echo get_the_permalink();?>">
        <h2><?php the_title();?></h2>
        <?php the_excerpt();?>
        </a>
      </div>
      <?php
    // End the loop.
    endwhile;

  else :
    get_template_part( 'template-parts/content/content', 'none' );
  endif;
  ?>
</div>
<?php
} //empty query check
?>

</div>

</main>



<?php
get_footer();

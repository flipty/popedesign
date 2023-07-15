<?php
/**
 * Template Name: Projects
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-projects
 */

get_header();
?>

<?php $header = get_field('page_header');?>
<section class="subpage-head">
    <div class="container">
      <div class="inner">
        <div class="content">
          <h1>
            <?php echo $header['headline'];?>
          </h1>
          <span class="h2"><?php echo $header['subhead'];?></span>
        </div>
        <div class="image">
          <?php echo wp_get_attachment_image($header['image'], 'full');?>
        </div>
      </div>
    </div>
</section>

<?php $introCTA = get_field('intro_cta');?>
<section class="small-cta">
  <div class="container">
    <div class="inner">
      <h3><?php echo $introCTA['content'];?></h3>
      <a href="<?php echo $introCTA['link_page'];?>"><span><?php echo $introCTA['link_text'];?></span></a>
    </div>
  </div>
</section>

<section class="isotope-grid projects">
  <div class="container">
    <ul class="inner">
      <?php
        $taxonomy = 'project-type';
        $terms = get_terms( $taxonomy );
        if ( !empty( $terms ) ) :
        foreach ( $terms as $term ) :
      ?>
          <li>
            <a href="<?php echo get_term_link( $term, $taxonomy ); ?>">
              <?php echo wp_get_attachment_image( get_field( 'featured_image', $term ), 'isotope'); ?>
              <div class="content">
                <h4><?php echo $term->name; ?></h4>
              </div>
            </a>
          </li>

        <?php endforeach; ?>
      <?php endif; ?>

    </ul>
  </div>
</section>

<?php $bottom = get_field('bottom_content');?>
<section class="cta-blurb">
  <div class="container">
    <div class="inner">
      <div class="content">
        <p>
          <?php echo $bottom['content'];?>
        </p>
      </div>
      <div class="cta">
        <a href="<?php echo $bottom['link_page'];?>"><span><?php echo $bottom['link_text'];?></span></a>
      </div>
    </div>
  </div>
</section>


<?php
get_footer();

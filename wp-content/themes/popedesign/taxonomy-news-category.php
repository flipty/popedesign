<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<section class="subpage-head-small no-margin"><!--logic for color-->
    <div class="container">
      <div class="inner">
          <h1>News</h1>
      </div>
    </div>
</section>

<div class="row">

    <div class="container nopadding isoGrid" id="news-ctabanners">
      <div class="col-xs-12">
          <?php get_template_part('partials/page', 'breadcrumb'); ?>

        <div class="row">
            <?php if (have_posts()) : ?>

              <?php while (have_posts()) : the_post(); ?>
                <?php

                  $image = wp_get_attachment_image( get_field( 'news_image' ), 'isotope');
                  if( !$image ){
                    $isotope_class = 'no-image';
                  }

                  $image_type = get_field('image_type');

                  if( $image_type == 'full' ){
                    $isotope_class = 'full-image';
                  }

                  if( $image_type == 'sidebar' ){
                    $isotope_class = 'sidebar-image';
                  }

                ?>
                <div class="isotope <?php echo $isotope_class; ?>">
                  <a href="<?php the_permalink(); ?>">
                    <?php echo $image; ?>
                    <h2>
                      <em><?php the_time('l, F jS, Y'); ?></em>
                      <?php the_title( ); ?>
                    </h2>
                  </a>
                </div>

              <?php endwhile; ?>

            <?php endif; ?>
        </div>

      </div><!--/col-->
    </div><!--/isoGrid-->
  </div>

</div><!--/container content-area-->
<?php
  if (have_posts()) :
     // pope_page_nav( false );
      wp_pagenavi();
  endif;
?>

<?php get_footer(); ?>

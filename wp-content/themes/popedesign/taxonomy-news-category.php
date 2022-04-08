<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<div class="row">

    <div class="container nopadding isoGrid" id="news-ctabanners">
      <div class="col-xs-12">

        <div class="row">
        	<?php if( $paged === 0 && have_rows( 'marketing_message' ) ): ?>

              <div class="isotope marketing">
                <a href="<?php the_field('marketing_link'); ?>">
                  <h2>
                    <?php while( have_rows( 'marketing_message' ) ): the_row(); ?>
                      <?php the_sub_field('message'); ?>.<br />
                    <?php endwhile; ?>
                  </h2>
                </a>
              </div>

          	<?php endif; ?>


            <?php if (have_posts()) : ?>

              <?php while (have_posts()) : the_post(); ?>
                <?php
                  $image = wp_get_attachment_image( get_field( 'news_image' ), 'isotope');
                  if( !$image ){
                    $isotope_class = 'no-image';
                  }
                ?>
                <div class="isotope col-md-4 <?php echo $isotope_class; ?>">
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
     pope_page_nav( false );
  endif;
?>

<?php get_footer(); ?>

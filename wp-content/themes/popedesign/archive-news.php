<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<?php
$year     = get_query_var('year');
$monthnum = get_query_var('monthnum');
$day      = get_query_var('day');
// is_year()
// is_month()
// is_day()
// is_date()
?>

  <section class="subpage-head-small no-margin"><!--logic for color-->
      <div class="container">
        <div class="inner">
            <h1>News Archive <?php if(is_year()){ echo ' - ' . $year;}?></h1>
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
                $isotope_class = '';
                $image = wp_get_attachment_image( get_field( 'news_image' ), 'isotope');
                if( !$image ){
                  $isotope_class = 'no-image';
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
     pope_page_nav( false );
  endif;
?>
<?php get_footer(); ?>

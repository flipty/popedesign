<?php
/*
Template Name: Home Template
*/
?>
<?php get_header(); ?>

<?php if( have_rows( 'carousel' ) ): ?>

  <div id="home-carousel" class="owl-carousel owl-theme">

  <?php while( have_rows( 'carousel' ) ): the_row(); ?>

    <div class="item">
      <div class="itemContent">
        <?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'carousel'); ?>
        <div class="itemContentFooter">
          <div class="container">
          <h1><?php echo get_sub_field('headline'); ?><a href="<?php echo get_sub_field('link'); ?>" class="cta">read more</a></h1>
          </div>
        </div><!--/itemContentFooter-->
      </div><!--/itemContent-->
    </div><!--/item-->

  <?php endwhile; ?>

  </div>

<?php endif; ?>

<div id="home-intro">
  <div class="container">
    <p><?php echo the_field('introductory_copy'); ?></p>
  </div>
</div>


<div class="container">

  <div class="row">
    
    <?php if( have_rows( 'isotopes' ) ): ?>

      <div class="container nopadding" id="home-ctabanners">

      <?php while( have_rows( 'isotopes' ) ): the_row(); ?>

        <div id="recent" class="isotope">
          <a href="<?php echo get_sub_field('link'); ?>">
            <?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'isotope'); ?>
            <h2><?php echo get_sub_field('title'); ?></h2>
          </a>
        </div>

      <?php endwhile; ?>

      </div>

    <?php endif; ?>

  </div>
</div>
<!--
<div class="container">
  <div class="row">
    <div id="home-quote">

      <?php if( have_rows( 'quotes' ) ): ?>

        <div id="quote-carousel" class="owl-carousel owl-theme">

        <?php while( have_rows( 'quotes' ) ): the_row(); ?>

           <div class="item">
            <p>
              <?php the_sub_field('quote'); ?>
              
              <span class="signature">
                <?php the_sub_field('name'); ?>
                <span class="secondary"><?php the_sub_field('title'); ?></span>
              </span>
              
              <em class="startquote">&ldquo;</em>
              <em class="endquote">&rdquo;</em>

            </p>
          </div>

        <?php endwhile; ?>

        </div>

      <?php endif; ?>

      </div>
    </div>

</div>
-->

<?php get_footer(); ?>
<?php
/**
 * Template Name: Markets Landing
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-markets
 */

get_header();
?>
      <?php //full page hero variables
      $subpage_h1 = false;//true if there's a H1 in the subpage header bar
      $hero = get_field('full_image_hero');
      $hero_image = $hero['hero_image'];
      $hero_stripe = $hero['stripe_color'];
      $hero_headline = $hero['headline'];
      $hero_headline_color = $hero['headline_color'];
      $hero_headline_align = $hero['headline_align'];
      $hero_subheadline = $hero['sub_headline'];
      $hero_subheadline_color = $hero['subheadline_color'];
      $hero_subheadline_align = $hero['subheadline_align'];
      if ($hero_image){
      ?>
      <section class="full-image-hero career-hero" style="background-image: url('<?php echo wp_get_attachment_image_url($hero_image, 'full');?>');">
        <div class="inner">
          <div class="stripe" style="background-color: <?php echo $hero_stripe;?>">
            <div class="container">
            <?php 
            if ($subpage_h1){ ?><span class="image-hero-headline" style="
              <?php if ($hero_headline_color){ echo 'color: '. $hero_headline_color . ';';}?>
              <?php if ($hero_headline_align){ echo 'text-align: '. $hero_headline_align . ';';}?>
            "><?php } ?><?php if (!$subpage_h1){ ?><h1 style="<?php if ($hero_headline_color){ echo 'color: '. $hero_headline_color . ';';}?>"><?php } 
            echo $hero_headline;
            if ($subpage_h1){ ?></span><?php } ?><?php if (!$subpage_h1){ ?></h1><?php } ?>
            </div>
              
          </div>
          <div class="container">
          <span class="subheadline" style="
          <?php if ($hero_subheadline_color){ echo 'color: '. $hero_subheadline_color . ';';}?>
          <?php if ($hero_subheadline_align){ echo 'text-align: '. $hero_subheadline_align . ';';}?>
          "><?php echo $hero_subheadline;?></span>            
          </div>
        </div>

      </section>
      <?php } //hero image logic ?>

  <div class="container">

      <?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>

          <h1><?php echo get_the_title();?></h1>
          <?php the_content(); ?>

          <?php $marketHead = get_field('market_head'); ?>

          <?php foreach ($marketHead as $head){ ?>
            <?php 
            echo get_the_title($head);
            } //foreach ?>

      	<?php endwhile; ?>

      	<?php else : ?>

      <?php endif; ?>

  </div>

<?php
get_footer();

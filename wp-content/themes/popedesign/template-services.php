<?php
/**
 * Template Name: Services
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-services
 */

get_header();
?>
<main>
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

<?php $intro = get_field('intro');?>      
<section class="intro">
  <div class="container">
    <div class="row">
      <div class="col-md-6 intro-content"><?php echo $intro['intro_content'];?></div>
      <div class="col-md-6 intro-links">
        <div class="links">
          <div class="approach">
            <a href="<?php echo $intro['block_1_link'];?>">
            <?php echo wp_get_attachment_image($intro['block_1_image'], 'full');?>
            <p><?php echo $intro['block_1_text'];?></p>
            </a>
          </div>
          <div class="expertise">
            <a href="<?php echo $intro['block_2_link'];?>">
            <?php echo wp_get_attachment_image($intro['block_2_image'], 'full');?>
            <p><?php echo $intro['block_2_text'];?></p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $block1 = get_field('block_1');?>
<section class="photo-block photo-left color-secondary" id="photo-block-1">
  <div class="container">
    <div class="inner">
      <div class="photo">
        <?php echo wp_get_attachment_image($block1['image'], 'full');?>
      </div>
      <div class="content">
        <?php echo $block1['content'];?>
        <a href="<?php echo $block1['link_page'];?>"><?php echo $block1['link_text'];?></a>
      </div>
    </div>
  </div>
</section>

<section class="specialty">
  <div class="container">
    <div class="inner">
      <?php echo get_field('specialty_related');?>
    </div>
  </div>
</section>

<?php $block2 = get_field('block_2');?>
<section class="photo-block photo-right color-primary" id="photo-block-2">
  <div class="container">
    <div class="inner">
      <div class="photo">
        <?php echo wp_get_attachment_image($block2['image'], 'full');?>
      </div>
      <div class="content">
        <?php echo $block2['content'];?>
        <a href="<?php echo $block2['link_page'];?>"><?php echo $block2['link_text'];?></a>
      </div>
    </div>
  </div>
</section>

<?php $block3 = get_field('block_3');?>
<section class="photo-block photo-left color-secondary" id="photo-block-3">
  <div class="container">
    <div class="inner">
      <div class="photo">
        <?php echo wp_get_attachment_image($block3['image'], 'full');?>
      </div>
      <div class="content">
        <?php echo $block3['content'];?>
        <a href="<?php echo $block3['link_page'];?>"><?php echo $block3['link_text'];?></a>
      </div>
    </div>
  </div>
</section>


  <?php $cta = get_field('cta_area');?>
  <section class="cta-blurb">
    <div class="container">
      <div class="inner">
        <div class="content">
          <p>
            <?php echo $cta['cta_content'];?>
          </p>
        </div>
        <div class="cta">
          <a href="<?php echo $cta['link_page'];?>"><span><?php echo $cta['link_text'];?></span></a>
        </div>
      </div>
    </div>
  </section>


</main>

<?php
get_footer();

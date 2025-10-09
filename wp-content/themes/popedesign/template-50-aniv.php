<?php
/**
 * Template Name: 50th Anniversary
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-50-aniv
 */

get_header();
?>
    <?php while ( have_posts() ) : the_post(); ?>
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

      <?php $intro = get_field('sub_hero'); ?>

      <h2 class="underlined"><div class="container"><?php echo $intro['subheadline'];?></div></h2>
      <div class="container">
        <div class="intro-content">
          <?php echo $intro['content'];?>
        </div>
      </div>
      
      <?php 
      $openings0 = get_field('intro_area_0');
      $openings1 = get_field('intro_area_1');
      $openings2 = get_field('intro_area_2');
      ?>
      <!--
      <section class="anniversary-highlights">
        <div class="container">
          <div class="row">
            <div class="col-md-12 highlight-areas">
              <div class="row">
                <div class="col-md-4 intro">
                  <?php echo wp_get_attachment_image($openings0['intro_0_image'], 'full'); ?>
                  <h3><?php echo $openings0['intro_0_headline'];?></h3>
                </div>
                <div class="col-md-4 highlight">
                  <div class="heading"><?php echo wp_get_attachment_image($openings1['intro_1_image'], 'full'); ?><h3><?php echo $openings1['intro_1_headline'];?></h3></div>
                  <div class="content"><?php echo $openings1['intro_1_content'];?></div>
                </div>
                <div class="col-md-4 highlight">
                  <div class="heading"><?php echo wp_get_attachment_image($openings2['intro_2_image'], 'full'); ?><h3><?php echo $openings2['intro_2_headline'];?></h3></div>
                  <div class="content"><?php echo $openings2['intro_2_content'];?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      -->
      <?php $block1 = get_field('block_1'); $caption1 = $block1['caption']; ?>
      <section class="photo-block photo-left color-primary <?php if ($caption1){ echo 'has-caption';}?>">
        <div class="container">
          <div class="inner">
            <div class="photo">
              <?php echo wp_get_attachment_image($block1['image'], 'full');?>
            </div>
            <div class="content">
              <?php echo $block1['content'];?>
            </div>
          </div>
        </div>
        <div class="caption">
          <div class="container">
            <div class="caption-inner"><?php echo $caption1;?></div>
          </div>
        </div>

      </section>


      <?php $block2 = get_field('block_2'); $caption2 = $block2['caption']; ?>
      <section class="photo-block photo-right color-secondary <?php if ($caption2){ echo 'has-caption';}?>" id="block2">
        <div class="container">
          <div class="inner">
            <div class="photo">
              <?php echo wp_get_attachment_image($block2['image'], 'full');?>
            </div>
            <div class="content">
              <?php echo $block2['content'];?>
            </div>
          </div>
        </div>
        <div class="caption">
          <div class="container">
            <div class="caption-inner"><?php echo $caption2;?></div>
          </div>
        </div>
      </section>

      <section class="anniversary-carousel-1">
        <div class="container">
          <h2>Office History</h2>
        </div>

        <div class="carousel">
          <div class="owl-carousel owl-theme careers-carousel" id="ac1">
            <?php $images1 = get_field('carousel_80s');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            foreach( $images1 as $image_id ): ?>
              <div class="item">
                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>  
      </section>

      <?php $block3 = get_field('block_3'); $caption3 = $block3['caption']; ?>
      <section class="photo-block photo-left color-primary <?php if ($caption3){ echo 'has-caption';}?>">
        <div class="container">
          <div class="inner">
            <div class="photo">
              <?php echo wp_get_attachment_image($block3['image'], 'full');?>
            </div>
            <div class="content">
              <?php echo $block3['content'];?>
            </div>
          </div>
        </div>
        <div class="caption">
          <div class="container">
            <div class="caption-inner"><?php echo $caption3;?></div>
          </div>
        </div>
      </section>


      <?php $block4 = get_field('block_4'); $caption4 = $block4['caption']; ?>
      <section class="photo-block photo-right color-secondary block-last <?php if ($caption4){ echo 'has-caption';}?>">
        <div class="container">
          <div class="inner">
            <div class="photo">
              <?php echo wp_get_attachment_image($block4['image'], 'full');?>
            </div>
            <div class="content">
              <?php echo $block4['content'];?>
            </div>
          </div>
        </div>
        <div class="caption">
          <div class="container">
            <div class="caption-inner"><?php echo $caption4;?></div>
          </div>
        </div>
      </section>

      <section class="anniversary-carousel-2">
        <div class="container">
          <h2>Notable Projects</h2>
        </div>

        <div class="carousel">
          <div class="owl-carousel owl-theme careers-carousel" id="ac2">
            <?php $images2 = get_field('carousel_current');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            foreach( $images2 as $image_id ): ?>
              <div class="item">
                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>  
      </section>

      <?php $ctablurb = get_field('bottom_content');?>
      <section class="cta-blurb">
        <div class="container">
          <div class="inner">
            <div class="content">
              <p>
                <?php echo $ctablurb['content'];?>
              </p>
            </div>
            <div class="cta">
              <a href="<?php echo $ctablurb['link_page'];?>"><span><?php echo $ctablurb['link_text'];?></span></a>  
            </div>
          </div>
        </div>
      </section>


    </main>

    <?php endwhile; ?>

<?php
 get_footer();

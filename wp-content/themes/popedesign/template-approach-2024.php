<?php
/**
 * Template Name: Approach 2024
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-approach-2024
 */

get_header();
?>

<?php $header = get_field('page_header');?>
<section class="subpage-head color-plum">
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

<?php $subhero = get_field('sub_hero');?>
<section class="sub-hero rings-left rings-invisible">
  <div class="rings">
    <div class="ring1"></div>
    <div class="ring2"></div>
  </div>
  <div class="container">
    <div class="inner">
      <div class="headline">
        <h2>
          <?php echo $subhero['subheadline'];?>
        </h2>
      </div>
      <div class="content">
        <p>
          <?php echo $subhero['content'];?>
        </p>
      </div>
    </div>

  </div>
</section>

<a name="equity"></a>
<?php $block1 = get_field('block_1'); $caption1 = $block1['caption']; ?>
<section class="photo-block photo-left color-secondary <?php if ($caption1){ echo 'has-caption';}?>">
  <div class="container">
    <div class="inner">
      <div class="photo">
        <?php echo wp_get_attachment_image($block1['image'], 'full');?>
        <?php if ($caption1){ ?>
        <div class="caption" style="background-color: <?php echo $block1['caption_stripe_color'];?>">
          <p><?php echo $caption1;?></p>
        </div><?php } ?>
      </div>
      <div class="content">
        <?php echo $block1['content'];?>
        <a href="<?php echo $block1['link_page'];?>"><?php echo $block1['link_text'];?></a>
      </div>
    </div>
  </div>
</section>

<a name="community"></a>
<?php $block2 = get_field('block_2'); $caption2 = $block2['caption']; ?>
<section class="photo-block photo-right color-primary <?php if ($caption2){ echo 'has-caption';}?>">
  <div class="container">
    <div class="inner">
      <div class="photo">
        <?php echo wp_get_attachment_image($block2['image'], 'full');?>
        <?php if ($caption2){ ?>
        <div class="caption" style="background-color: <?php echo $block2['caption_stripe_color'];?>">
          <p><?php echo $caption2;?></p>
        </div><?php } ?>

      </div>
      <div class="content">
        <?php echo $block2['content'];?>
        <a href="<?php echo $block2['link_page'];?>"><?php echo $block2['link_text'];?></a>
      </div>
    </div>
  </div>
</section>

<a name="sustainability"></a>
<?php $block3 = get_field('block_3'); $caption3 = $block3['caption']; ?>
<section class="photo-block photo-left color-secondary block-last <?php if ($caption3){ echo 'has-caption';}?>">
  <div class="container">
    <div class="inner">
      <div class="photo">
        <?php echo wp_get_attachment_image($block3['image'], 'full');?>
        <?php if ($caption3){ ?>
        <div class="caption" style="background-color: <?php echo $block3['caption_stripe_color'];?>">
          <p><?php echo $caption3;?></p>
        </div><?php } ?>

      </div>
      <div class="content">
        <?php echo $block3['content'];?>
        <a href="<?php echo $block3['link_page'];?>"><?php echo $block3['link_text'];?></a>
      </div>
    </div>
  </div>
</section>

<h2 class="underlined"><div class="container">Our Services</div></h2>

<?php if (get_field('services')){?>
<section class="services">
    <div class="container">
      <div class="inner">
        <div class="intro">
          <?php echo get_field('services_intro');?>
        </div>
        <ul class="service-list">
          <?php while (have_rows('services')): the_row(); ?>
          <?php $service = get_sub_field('service');?>
          <li>
            <div class="image">
              <?php echo wp_get_attachment_image($service['image'], 'full');?>
            </div>
            <div class="content">
              <div class="pad">
                <p><?php echo $service['content'];?></p>
              </div>
            </div>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <div class="rings">
      <div class="ring1"></div>
      <div class="ring2"></div>
    </div>

</section>
<?php } ?>

<section class="sub-hero rings-right rings-invisible testimonial">
  <div class="rings">
    <div class="ring1"></div>
    <div class="ring2"></div>
  </div>
  <div class="container">
    <div class="inner">
      <div class="content">
          <?php echo get_field('testimonial');?>
      </div>
    </div>

  </div>
</section>

<?php $single_hero = get_field('single_hero');?>
<section class="hero">
  <div class="carousel">
    <div class="owl-carousel owl-theme about-carousel">
      <div class="item">
        <?php echo wp_get_attachment_image($single_hero['image'], 'full');?>
      </div>
    </div>
  </div>
  <div class="content-block">
    <div class="inner">
      <p><?php echo $single_hero['content'];?></p>
      <a href="<?php echo $single_hero['link_page'];?>"><?php echo $single_hero['link_text'];?></a>
    </div>
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

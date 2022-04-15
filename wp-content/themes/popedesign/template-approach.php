<?php
/**
 * Template Name: Approach
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-approach
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

<?php $subhero = get_field('sub_hero');?>
<section class="sub-hero rings-left">
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

<?php $fwblock = get_field('full_width_block');?>
<section class="content-chunk color-wrap color-teal">
  <div class="container">
    <div class="inner">
      <h2><?php echo $fwblock['headline'];?></h2>
      <div class="content">
        <p>
          <?php echo $fwblock['content'];?>
        </p>
      </div>
    </div>
  </div>
</section>

<?php if (get_field('services')){?>
<section class="services">
    <div class="container">
      <div class="inner">
        <ul class="service-list">
          <?php while (have_rows('services')): the_row(); ?>
          <?php $service = get_sub_field('service');?>
          <li>
            <div class="image">
              <?php echo wp_get_attachment_image($service['image'], 'full');?>
            </div>
            <div class="content">
              <div class="pad">
                <?php echo $service['content'];?>
              </div>
            </div>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
</section>
<?php } ?>

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

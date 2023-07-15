<?php
/**
 * Template Name: History
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-history
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

<section class="plain-intro">
  <div class="container">
    <p><?php echo get_field('intro_content');?></p>
  </div>
</section>

<?php $block1 = get_field('block_1');?>
<section class="photo-block photo-left color-primary">
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

<?php $block2 = get_field('block_2');?>
<section class="photo-block photo-right color-secondary">
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

<?php $bottom = get_field('cta_area');?>
<section class="cta-blurb">
  <div class="container">
    <div class="inner">
      <div class="content">
        <p>
          <?php echo $bottom['cta_content'];?>
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

<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-about
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
        <h2><?php echo $subhero['headline'];?></h2>
        <h3><?php echo $subhero['subheadline'];?></h3>
      </div>
      <div class="content">
        <p>
          <?php echo $subhero['content'];?>
        </p>
        <a href="<?php echo $subhero['link_page'];?>"><?php echo $subhero['link_text'];?></a>
      </div>
    </div>

  </div>
</section>

<section class="full-photo">
  <?php echo wp_get_attachment_image(get_field('full_width_photo'), 'full');?>
</section>
<a name="leadership"></a>
<section class="people">
  <div class="container">
    <h2><?php echo get_field('people_headline');?></h2>
    <p><?php echo get_field('people_content');?></p>
    <ul class="inner">
      <?php while (have_rows('people')): the_row();
      $person = get_sub_field('person');
      $photo = get_field('photo', $person)
      ?>
      <li>
        <a href="<?php echo get_the_permalink($person);?>">
          <?php echo wp_get_attachment_image($photo, 'full');?>
          <h3><?php echo get_the_title($person);?><?php if (get_field('accreditation', $person)) {?>, <?php echo get_field('accreditation', $person);?><?php } ?></h3>
          <h4><?php echo get_field('title', $person);?></h4>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
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

<?php
get_footer();

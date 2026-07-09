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
  
  <?php $header = get_field('page_header');?>
  <section class="subpage-head color-grey">
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
  <section class="sub-hero" id="sub-hero-1">
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

  <section class="market-select" style="background-image: url('<?php echo wp_get_attachment_image_url(get_field('market_list_background'), 'full');?>');">
    <div class="container">
      <div class="market-items">
      <?php while(have_rows('market_pages')){ ?>
      <?php the_row(); 
        $marketID = get_sub_field('market_page');
        $altText = get_sub_field('alternate_name');
      ?>
        <div class="item">
          <a href="<?php echo get_the_permalink($marketID);?>">
            <?php 
            if ($altText){ echo get_sub_field('alternate_name'); }
            if (!$altText){ echo get_the_title($marketID); }
            ?>
          </a>
        </div>
      <?php }?>
      </div>
    </div>
  </section>

<?php $block1 = get_field('block_1');?>
<section class="photo-block photo-right color-primary" id="photo-block-1">
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

  <div class="container">


  </div>

<?php
get_footer();

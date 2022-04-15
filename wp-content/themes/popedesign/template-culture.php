<?php
/**
 * Template Name: Culture
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-culture
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

<section class="hero">
  <div class="carousel">
    <div class="owl-carousel owl-theme home-carousel">
      <?php $images = get_field('carousel');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      foreach( $images as $image_id ): ?>
        <div class="item">
          <?php echo wp_get_attachment_image( $image_id, $size ); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- <div class="content-block">
    <div class="inner">
      <?php $hero = get_field('hero_content');?>
      <p><?php echo $hero['intro_headline'];?></p>
      <a href="<?php echo $hero['intro_link'];?>"><?php echo $hero['intro_link_text'];?></a>
    </div>
  </div> -->
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

<section class="news">
  <div class="container">
    <div class="intro">
      <h2>Culture News</h2>
    </div>
    <div class="news-items">
    <?php
    $newsargs = array(
      'posts_per_page'  => 3,
      'post_type'       => 'news',
      'orderby'         => 'date',
      'order'						=> 'DESC',
      'tax_query' => array(
        array(
            'taxonomy' => 'news-category',
            'field' => 'slug',
            'terms' => 'culture'
        )
     )
    );
    $news_query = new WP_Query( $newsargs );
    ?>
    <?php if ($news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post();?>
      <?php $image = get_field('news_image');?>
        <div class="news-item">
          <div class="image">
            <?php echo wp_get_attachment_image($image, 'full');?>
          </div>
          <h3><?php echo get_the_title();?></h3>
          <a href="<?php echo get_the_permalink();?>">READ THE FULL ARTICLE</a>
        </div>
    <?php endwhile; else: ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    </div>
  </div>
</section>



<?php
get_footer();

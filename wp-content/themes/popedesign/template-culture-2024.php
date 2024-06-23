<?php
/**
 * Template Name: Culture 2024
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-culture-2024
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

<?php $values = get_field('core_values');?>
<h2 class="underlined"><div class="container"><?php echo $values['headline'];?></div></h2>
<section class="core-values">
  <div class="container">
    <div class="values-intro">
      <p>
        <?php echo $values['intro'];?>
      </p>
    </div>
  </div>
  <div class="values">
    <div class="container value-container">
      <ul>
      <?php while (have_rows('value')): the_row();
      $label = get_sub_field('label');
      $icon = get_sub_field('icon');
      $align = get_sub_field('align');
      ?>
      <li class="<?php echo $align;?>">
          <?php echo wp_get_attachment_image($icon, 'full');?>
          <span><?php echo $label;?></span>
      </li>
      <?php endwhile; ?>
      </ul>
    </div>
  </div>

  <div class="values-more">
    <?php $moreBlock1 = get_field('values_block_1');?>
    <?php $moreBlock2 = get_field('values_block_2');?>
    <?php $moreBlock3 = get_field('values_block_3');?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 item">
          <div class="image">
            <?php echo wp_get_attachment_image($moreBlock1['image'], 'full');?>
            <h4><?php echo $moreBlock1['headline'];?></h4>
          </div>
          <div class="content">
            <?php echo $moreBlock1['content'];?>
          </div>
          <div class="link">
            <a href="<?php echo $moreBlock1['link'];?>">LEARN MORE HERE</a>
          </div>
        </div>
        <div class="col-md-4 item white">
          <div class="image">
            <?php echo wp_get_attachment_image($moreBlock2['image'], 'full');?>
            <h4><?php echo $moreBlock2['headline'];?></h4>
          </div>
          <div class="content">
            <?php echo $moreBlock2['content'];?>
          </div>
          <div class="link">
            <a href="<?php echo $moreBlock2['link'];?>">LEARN MORE HERE</a>
          </div>
        </div>
        <div class="col-md-4 item">
          <div class="image">
            <?php echo wp_get_attachment_image($moreBlock3['image'], 'full');?>
            <h4><?php echo $moreBlock3['headline'];?></h4>
          </div>
          <div class="content">
            <?php echo $moreBlock3['content'];?>
          </div>
          <div class="link">
            <a href="<?php echo $moreBlock3['link'];?>">LEARN MORE HERE</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php $block1 = get_field('block_1');?>
<section class="photo-block photo-right block-first color-white">
  <div class="container">
    <div class="inner">
      <div class="photo <?php if ($block1['video_link']) { echo 'has-video'; }?>">
        <?php if (!$block1['video_link']) {
          echo wp_get_attachment_image($block1['image'], 'full');
        } 
        if ($block1['video_link']) {
          echo $block1['video_link'];
        } ?>
      </div>
      <div class="content">
        <?php echo $block1['content'];?>
        <a href="<?php echo $block1['link_page'];?>"><?php echo $block1['link_text'];?></a>
      </div>
    </div>
  </div>
</section>

<?php $block2 = get_field('block_2');?>
<section class="photo-block photo-left block-last color-secondary">
  <div class="container">
    <div class="inner">
      <div class="photo <?php if ($block2['video_link']) { echo 'has-video'; }?>">
        <?php echo wp_get_attachment_image($block2['image'], 'full');?>
      </div>
      <div class="content">
        <?php echo $block2['content'];?>
        <a href="<?php echo $block2['link_page'];?>"><?php echo $block2['link_text'];?></a>
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
      'order'           => 'DESC',
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


<section class="culture">
  <div class="container">
    <h2><?php echo get_field('carousel_headline');?></h2>
  </div>

  <div class="carousel">
    <div class="owl-carousel owl-theme careers-carousel">
      <?php $images = get_field('carousel');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      foreach( $images as $image_id ): ?>
        <div class="item">
          <?php echo wp_get_attachment_image( $image_id, $size ); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>  

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="culture-content">
        <?php echo get_field('bottom_content');?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="culture-link">
          <a href="<?php echo get_field('bottom_link_text');?>"><?php echo get_field('bottom_link_text');?></a>  
        </div>
      </div>
    </div>
    
  </div>
</section>




<?php
get_footer();

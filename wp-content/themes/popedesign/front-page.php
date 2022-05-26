<?php
get_header();
?>

<section class="hero home-hero">
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
  <div class="content-block">
    <div class="inner">
      <?php $hero = get_field('hero_content');?>
      <p><?php echo $hero['intro_headline'];?></p>
      <a href="<?php echo $hero['intro_link'];?>"><?php echo $hero['intro_link_text'];?></a>
    </div>
  </div>
</section>

<section class="sub-hero rings-right">
  <div class="rings">
    <div class="ring1"></div>
    <div class="ring2"></div>
  </div>
  <div class="container">
    <div class="inner">
      <div class="headline">
        <h1><?php echo get_field('intro_headline');?></h1>
      </div>
      <div class="content">
        <?php echo get_field('intro_content');?>
      </div>
    </div>
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

<section class="news">
  <div class="container">
    <div class="intro">
      <h2>News</h2>
      <a href="/news">VIEW ALL ARTICLES</a>
    </div>
    <div class="news-items">
    <?php
    $newsargs = array(
      'posts_per_page'  => 3,
      'post_type'       => 'news',
      'orderby'         => 'date',
      'order'						=> 'DESC',
      //do not show those excluded from the listing via ACF check option
      'meta_query' => array(
        'relation' => 'OR',
        array(
          'key'     => 'home_page_exempt',
          'value'   => true,
          'compare' => '!='
        ),
        array(
          'key'     => 'home_page_exempt',
          'value' 	=> 'null',
          'compare' => 'NOT EXISTS'
        )
      )
    );
    $news_query = new WP_Query( $newsargs );
    ?>
    <?php if ($news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post();?>
      <?php $image = get_field('news_image');
      $image_type = get_field('image_type');
      if( $image_type == 'full' ){
        $isotope_class = 'full-image';
      }
      if( $image_type == 'sidebar' ){
        $isotope_class = 'sidebar-image';
      }
      ?>
        <div class="news-item">
          <div class="image <?php echo $isotope_class;?>">
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
?>

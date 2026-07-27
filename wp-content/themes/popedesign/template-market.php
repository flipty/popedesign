<?php
/**
 * Template Name: Market
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-market
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
      $big_title = false;
      $title = $hero_headline; 
      $title_length = strlen($title);
      if ($title_length >= 15) { $big_title = true; }
      ?>
      <section class="full-image-hero career-hero" style="background-image: url('<?php echo wp_get_attachment_image_url($hero_image, 'full');?>');">
        <div class="inner <?php if ($big_title){ echo ' big-title';}?>">
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
  
      <?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>

        <div class="container">
        
        <!--main content-->
        <div class="row content-area">
          <div class="col-md-8 main-content">
            <?php the_content(); ?>
                    <!--featured market projects-->
        <?php $featured = get_field('projects'); ?>
        <?php if($featured) : ?>
        <div class="row featured-projects">
          <div class="col-md-12">
            <h3 class="featured-title">Featured Projects</h3>
            <div class="featured-projects">
            <?php foreach ($featured as $fproject){ ?>
              <div class="featured-project">
                <a href="<?php echo get_the_permalink($fproject);?>">
                  <?php if( have_rows( 'photos', $fproject ) ): $i = 0; ?>
                    <?php while( have_rows( 'photos', $fproject ) ): the_row(); $i++; ?>
                    <?php if ($i == 1){ ?>
                    <div class="featured-project-image">
                    <?php echo wp_get_attachment_image( get_sub_field( 'photo' ), 'carousel'); ?>
                    </div>
                    <?php } ?>
                    <?php endwhile; ?>
                  <?php endif; ?>
                  <h4><?php echo get_the_title($fproject);?></h4>          
                </a>
              </div>              
            <?php }; ?>
            </div>

          
          </div>
        </div>
        <?php endif; ?>

          </div>    
          <div class="col-md-4 secondary-content">
            <?php echo get_field('market_related');?>
          </div>
        </div>
        
        <!--market contact/testimonial-->
        <div class="row market-extras">
          <div class="col-md-6 testimonial">
            <?php echo get_field('testimonial_content');?>
          </div>
          <div class="col-md-6 market-head">
          <?php 
            $marketHead = get_field('market_head'); 
            foreach ($marketHead as $head){ 
              $headshot = get_field('photo', $head);
              ?>
              <div class="market-head-content">
                <div class="head-photo">
                  <?php echo wp_get_attachment_image($headshot);?>
                </div>
                <div class="head-content">
                  <h3>Main Contact</h3>
                  <h4><?php echo get_the_title($head);?> <?php //echo get_field('accreditation', $head);?></h4>
                  <a href="mailto:<?php echo get_field('email', $head);?>"><?php echo get_field('email', $head);?></a>
                  <!--
                  <p><?php 
                    if (get_field('phone', $head)){
                      echo get_field('phone', $head);
                    }
                    if (!get_field('phone', $head)){
                      echo '651.642.9200'; //default phone
                    } ?>
                  </p>
                  -->
                </div>
              </div>
            <?php } //foreach ?>
          
          </div>
        </div>

        </div><!--container-->
        
        <!--related news-->
<?php
    $currentTaxonomy = get_field('news_taxonomy_market');
    $currentTaxonomyID = $currentTaxonomy[0];
    $currentTermName = get_term( $currentTaxonomyID )->name;
?>   
        <section class="news">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2><?php echo $currentTermName; ?> News</h2>
              </div>
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
            'taxonomy' => 'market-news',   // taxonomy name
            //'field' => 'term_id',           // term_id, slug or name
            'terms' => $currentTaxonomyID,                  // term id, term slug or term name
        )
      ),
      //'taxonomy'        => $currentTaxonomy[0],
      //do not show those excluded from the listing via ACF check option
      
      'meta_query' => array(
        'relation' => 'OR',
        array(
          'key'     => 'market_page_exempt',
          'value'   => true,
          'compare' => '!='
        ),
        array(
          'key'     => 'market_page_exempt',
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


      	<?php endwhile; ?>

      	<?php else : ?>


      <?php endif; ?>
</main>
<?php
get_footer();

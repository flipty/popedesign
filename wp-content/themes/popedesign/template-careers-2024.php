<?php
/**
 * Template Name: Careers 2024
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-careers-2024
 */

get_header();
?>
    <?php while ( have_posts() ) : the_post(); ?>
    <main>
<!--       <section class="subpage-head-small">
          <div class="container">
            <div class="inner">
                <h1>Careers</h1>
            </div>
          </div>
      </section>
 -->

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

      <h2 class="underlined"><div class="container">Current Openings</div></h2>

      <?php 
      $openings1 = get_field('intro_area_1');
      $openings2 = get_field('intro_area_2');
      ?>
      <section class="current-openings">
        <div class="container">
          <div class="row">
            <div class="col-md-8 job-types">
              <div class="row">
                <div class="col-md-6 job-type">
                  <div class="heading"><?php echo wp_get_attachment_image($openings1['intro_1_image'], 'full'); ?><h3><?php echo $openings1['intro_1_headline'];?></h3></div>
                  <div class="content"><?php echo $openings1['intro_1_content'];?></div>
                </div>
                <div class="col-md-6 job-type">
                  <div class="heading"><?php echo wp_get_attachment_image($openings2['intro_2_image'], 'full'); ?><h3><?php echo $openings2['intro_2_headline'];?></h3></div>
                  <div class="content"><?php echo $openings2['intro_2_content'];?></div>
                </div>
                
              </div>
            </div>
            <div class="col-md-4 job-listings">
              <div class="inner">
              <?php the_content();?>
              <ul>
                <?php
                $jobsargs = array(
                  'post_type'       => 'jobs',
                  'orderby'         => 'date',
                  'order'           => 'DESC'
                );
                $jobs_query = new WP_Query( $jobsargs );
                ?>
                <?php if ($jobs_query->have_posts() ) : while ( $jobs_query->have_posts() ) : $jobs_query->the_post();?>
                  <li>
                    <a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a>
                  </li>
                <?php endwhile; else: ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </ul>
              </div>  
            </div>
          </div>
        </div>
      </section>

      <?php 
      $highlights = get_field('highlights_area');
      ?>
      <section class="highlights">
        <div class="container">
          <div class="row">
            <div class="col-md-6 content">
              <?php echo $highlights['highlights_content'];?>
            </div>
            <div class="col-md-6 image <?php if ($highlights['video_link']) { echo 'has-video'; }?>">
            <?php if (!$highlights['video_link']) {
                echo wp_get_attachment_image($highlights['highlights_image'], 'full');
              } 
              if ($highlights['video_link']) {
                echo $highlights['video_link'];
              } ?>
            </div>
          </div>
        </div>
      </section>

      <section class="benefits">
        <div class="container">
          <div class="benefits-list">
            <?php while(have_rows('benefit_grid')): the_row();?>
              <div class="benefit">
                <h4><?php echo get_sub_field('headline');?></h4>
                <?php echo get_sub_field('bullet_list');?>
              </div>
            <?php endwhile;?>
          </div>
        </div>
      </section>

      <?php 
      $contact = get_field('contact_area');
      ?>
      <section class="contact">
        <div class="container">
          <div class="row">
            <div class="col-md-6 hr-info">
              <h2><?php echo $contact['headline'];?></h2>              
              <p><?php echo $contact['intro'];?></p>
              <div class="testimonial">
                <div class="image">
                  <?php echo wp_get_attachment_image($contact['hr_image'], 'full'); ?>
                </div>
                <div class="content">
                  <?php echo $contact['hr_content'];?>
                </div>
              </div>
              <div class="events">
                <?php echo $contact['hr_events'];?>
              </div>
            </div>
            <div class="col-md-6 contact-form">
              <h3>CAREER CONNECT FORM</h3>
              <div class="wpcf7">
              <?php echo do_shortcode('[contact-form-7 id="9677" title="Application Form"]');?>
              </div>
              <div class="disclaimer">
              <?php echo $contact['hr_disclaimer'];?>
              </div>
            </div>
          </div>
        </div>
      </section>
              
      <section class="culture">
        <div class="container">
          <h2><?php echo get_field('culture_headline');?></h2>
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
      </section>

      <section class="cta-blurb">
        <div class="container">
          <div class="inner">
            <div class="content">
              <p>
                <?php echo get_field('culture_content');?>
              </p>
            </div>
            <div class="cta">
              <a href="<?php echo get_field('culture_link_text');?>"><span><?php echo get_field('culture_link_text');?></span></a>  
            </div>
          </div>
        </div>
      </section>


    </main>

    <?php endwhile; ?>

<?php
 get_footer();

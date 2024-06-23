<?php get_header(); ?>

      <?php 
      $job_opening_content = get_field('job_opening_content', 'options');
      $shared_salary = $job_opening_content['salary_&_benefits'];
      $shared_hr_intro = $job_opening_content['hr_intro'];
      $shared_hr_quote = $job_opening_content['hr_manager_quote'];
      $shared_hr_image = $job_opening_content['hr_manager_image'];
      $shared_hr_disclaimer = $job_opening_content['hiring_disclaimer'];
      $shared_hr_marketing = $job_opening_content['marketing_area'];
      $shared_hr_marketing_image = $job_opening_content['marketing_area_image'];
      ?>

      <?php //full page hero variables
      $subpage_h1 = true;//true if there's a H1 in the subpage header bar
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


<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <div class="container"><?php get_template_part('partials/page', 'breadcrumb'); ?></div>
    

    <section class="job-details">
    <div class="container">

      <div class="row">
        <div class="col-md-8 job-details-core">
          <h1>
            <?php the_title(); ?>
          </h1>
          <?php echo get_field('short_description');?>

          <?php if (get_field('responsibilities')){ ?>
          <h2>Responsibilities</h2>
          <?php echo get_field('responsibilities');?>
          <?php } ?>

          <?php if (get_field('responsibilities')){ ?>
          <h2>Client Interface</h2>
          <?php echo get_field('client_interface');?>
          <?php } ?>

          <?php if (get_field('responsibilities')){ ?>
          <h2>Skills, Experience & Competencies</h2>
          <?php echo get_field('skills');?>
          <?php } ?>

        </div>

        <div class="col-md-4 job-common">
          <div class="benefits">
            <?php if (get_field('salary_benefits')){ ?>
            <?php echo get_field('salary_benefits');?>
            <?php } ?>
            <?php if (!get_field('salary_benefits')){ ?>
            <?php echo $shared_salary;?>
            <?php } ?>
          </div>
          <div class="current">
            <h3>Current Openings</h3>
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

        <?php if (get_field('hiring_manager')) { 
          $manager = get_field('hiring_manager'); 
          $managerImage = get_field('photo', $manager);
        ?>
        <div class="manager">
          <div class="manager-header">
            <div class="image">
              <a href="<?php echo get_the_permalink($manager);?>">
                <?php echo wp_get_attachment_image($managerImage); ?>
              </a>
            </div>
            <div class="info">
              <h3>MEET YOUR<br>TEAM MANAGER</h3>
              <h4><a href="<?php echo get_the_permalink($manager);?>"><?php echo get_the_title($manager);?></a></h4>              
            </div>            
          </div>
          <div class="manager-content">
            <div class="manager-intro">
              <p>
                <?php echo get_field('intro_copy', $manager);?>
              </p>
            </div>
            <?php if (get_field('quote_hr', $manager)){?>
            <div class="manager-quote">
              <p>
                <?php echo get_field('quote_hr', $manager);?>  
              </p>
            </div>            
            <?php } ?>
          </div>

        </div>
        <?php } ?>


        </div>

    </div><!--/row-->
  </div>
  </section>

  <section class="job-contact">
      <?php 
      $contact = get_field('contact_area_jobs');
      ?>
      <section class="contact">
        <div class="container">
          <div class="row">
            <div class="col-md-6 hr-info">
              <?php if ($contact['headline'] || $contact['intro']) { ?>
              <h2><?php echo $contact['headline'];?></h2>              
              <p><?php echo $contact['intro'];?></p>
              <?php }?>
              <?php if (!$contact['headline'] && !$contact['headline']) { ?>
              <?php echo $shared_hr_intro;?>
              <?php }?>

              <div class="testimonial">
                <div class="image">
                  <?php if ($contact['hr_image']){ ?>
                  <?php echo wp_get_attachment_image($contact['hr_image'], 'full'); ?>
                  <?php } ?>
                  <?php if (!$contact['hr_image']){ ?>
                  <?php echo wp_get_attachment_image($shared_hr_image, 'full'); ?>
                  <?php } ?>
                </div>
                <div class="content">
                  <?php if ($contact['hr_content']){ ?>
                  <?php echo $contact['hr_content'];?>
                  <?php } ?>
                  <?php if (!$contact['hr_content']){ ?>
                  <p><?php echo $shared_hr_quote;?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-6 contact-form">
              <h3>CAREER CONNECT FORM</h3>
              <div class="wpcf7">
              <?php echo do_shortcode('[contact-form-7 id="9677" title="Application Form"]');?>
              </div>
            </div>
          </div>
        </div>
      </section>

  </section>

<?php $marketing = get_field('marketing_area');?>
<section class="photo-block photo-right color-white last marketing">
  <div class="container">
    <div class="inner">
      <div class="photo">
        <?php if($marketing['image']){?>
        <?php echo wp_get_attachment_image($marketing['image'], 'full');?>
        <?php } ?>
        <?php if(!$marketing['image']){?>
        <?php echo wp_get_attachment_image($shared_hr_marketing_image, 'full');?>
        <?php } ?>
      </div>
      <div class="content">
        <?php if($marketing['content']){?>
        <?php echo $marketing['content'];?>
        <a href="<?php echo $marketing['link_page'];?>"><?php echo $marketing['link_text'];?></a>
        <?php } ?>
        <?php if(!$marketing['content']){?>
        <?php echo $shared_hr_marketing;?>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

  <section class="outro">
    <div class="container">
      <div class="disclaimer">
        <?php 
        if ($contact['hr_disclaimer']){
          echo $contact['hr_disclaimer'];          
        }
        if (!$contact['hr_disclaimer']){
          echo $shared_hr_disclaimer;          
        }        
        ?>
      </div>      
    </div>
  </section>

  <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>

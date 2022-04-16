<?php
/**
 * Template Name: Careers
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-careers
 */

get_header();
?>
    <?php while ( have_posts() ) : the_post(); ?>
    <main>

      <section class="subpage-head-small"><!--logic for color-->
          <div class="container">
            <div class="inner">
                <h1>Careers</h1>
            </div>
          </div>
      </section>

      <div class="container">

        <div class="row">
          <div class="col-md-6 content">
            <?php the_content();?>

            <div class="employment-form">
              <h3>Application Form</h3>
            <?php echo do_shortcode('[contact-form-7 id="9677" title="Application Form"]');?>
            </div>

          </div>
          <div class="col-md-6 listings">
            <?php if(have_rows('jobs')){?>
              <h2>Current Job Listings</h2>
            <?php while(have_rows('jobs')): the_row();?>
            <div class="job">
              <h4><?php echo get_sub_field('title');?></h4>
              <?php echo get_sub_field('description');?>
              <?php if (get_sub_field('job_link')){ ?>
              <div class="button">
                <a href="<?php echo get_sub_field('job_link');?>">See Full Job Description</a>
              </div>
              <?php } ?>
            </div>
            <?php endwhile; ?>
          <?php } //if jobs ?>
          <div class="return">
            <a href="/about/careers/">Return to Careers</a>
          </div>
          </div>
        </div>


      </div>



    </main>

    <?php endwhile; ?>

<?php
 get_footer();

<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-contact
 */

get_header();
?>
<main>

<?php while ( have_posts() ) : the_post(); ?>

      <?php $header = get_field('page_header');?>
      <section class="subpage-head color-darkteal">
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

      <section class="intro">
        <div class="container">
          <div class="content-area">
            <div class="spacer">

            </div>
            <div class="content">
                <?php the_content();?>
            </div>
          </div>
        </div>
      </section>

      <section class="locations">
        <div class="container">
            
            <div class="location-list">
                <?php while (have_rows('locations', 'options')): the_row(); ?>
                <?php $person = get_sub_field('main_contact');?>
                <div class="location">
                  <h4><?php echo get_sub_field('location_name'); ?></h4>
                  <strong><?php echo get_sub_field('special_note');?></strong><br>
                  <?php echo get_sub_field('address_1'); ?><br>
                  <?php echo get_sub_field('city_state_zip'); ?><br>
                  Phone: <a href="tel:<?php echo get_sub_field('phone_dial'); ?>"><?php echo get_sub_field('phone_display'); ?></a><br><br>
                  <strong>Main Contact</strong><br>
                  <a href="<?php echo get_the_permalink($person);?>" class="contact"><?php echo get_the_title($person);?><br>
                  <?php echo get_field('title', $person);?>
                  </a>
                </div>  
                <?php endwhile; ?>              
            </div>
            
            
        </div>
      </section>

      <section class="secondary-content">
        <div class="container">
          <div class="row content-row">
            <div class="col-md-6 image">
               <?php echo wp_get_attachment_image(get_field('secondary_image'), 'full');?>
            </div>
            <div class="col-md-6 content-area">
              <?php echo get_field('secondary_content');?>
            </div>
          </div>
        </div>
      </section>

    <?php endwhile; ?>
    </main>

<?php
 get_footer();

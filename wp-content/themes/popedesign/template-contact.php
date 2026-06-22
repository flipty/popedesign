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
    <?php while ( have_posts() ) : the_post(); ?>
    <main>

      <section class="subpage-head-small"><!--logic for color-->
          <div class="container">
            <div class="inner">
                <h1>Connect</h1>
            </div>
          </div>
      </section>

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php the_content();?>
            <h3>Pope Design Group</h3>
            <div class="row locations">
                <?php while (have_rows('locations', 'options')): the_row(); ?>
              <div class="col-md-5"> 
                <h4><?php echo get_sub_field('location_name'); ?></h4>
                <?php echo get_sub_field('address_1'); ?><br>
                <?php if (get_sub_field('address_2')){ echo get_sub_field('address_2') . '<br>';} ?>
                <?php echo get_sub_field('city_state_zip'); ?><br>
                <a href="tel:<?php echo get_sub_field('phone_dial'); ?>"><?php echo get_sub_field('phone_display'); ?></a><br>
              </div>
              <?php endwhile; ?>              
            </div>            
            <hr />
            <?php //echo do_shortcode('[contact-form-7 id="b3e149a" title="Contact form 1"]');?>
          </div>

          <div class="col-md-6">
            <?php //echo get_field('google_maps_embed_code', 'options');?>
          </div>

        </div>
      </div>

    </main>

    <?php endwhile; ?>

<?php
 get_footer();

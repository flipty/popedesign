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
              <div class="col-md-6">
                <h4>Headquarters</h4>
                <?php echo get_field('street_address', 'options');?><br>
                <?php echo get_field('city_state_zip', 'options');?><br>
                <a href="tel:<?php echo get_field('phone_number', 'options');?>"><?php echo get_field('phone_number_display', 'options');?></a><br>
              </div>
              <div class="col-md-5">
                <h4>North Dakota</h4>
                <?php echo get_field('street_address_2', 'options');?><br>
                <?php echo get_field('city_state_zip_2', 'options');?><br>
                <a href="tel:+17015060846">701.506.0846</a><br>
              </div>
            </div>
            marketing@popedesign.com
            <hr />
            <?php echo do_shortcode('[contact-form-7 id="517" title="Contact Us"]');?>
          </div>

          <div class="col-md-6">
            <?php echo get_field('google_maps_embed_code', 'options');?>
          </div>

        </div>
      </div>

    </main>

    <?php endwhile; ?>

<?php
 get_footer();

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
            <?php echo get_field('street_address', 'options');?><br>
            <?php echo get_field('city_state_zip', 'options');?><br>
            <a href="tel:<?php echo get_field('phone_number', 'options');?>"><?php echo get_field('phone_number_display', 'options');?></a>

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

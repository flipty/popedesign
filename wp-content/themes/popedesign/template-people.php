<?php
/**
 * Template Name: People
 *
 * @package WordPress
 * @subpackage popedesign
 * @since Twenty Sixteen 1.0
 * template-people
 */

get_header();
?>



<section class="subpage-head">
    <div class="container">
      <div class="inner">
        <div class="content">
          <h1>
            People
          </h1>
          <span class="h2">Business<br>Minded<br>Designers</span>
        </div>
        <div class="image">
          <img src="https://loremflickr.com/900/420/nyc" alt="">
        </div>
      </div>
    </div>
</section>

<!-- <section class="full-photo">
  <img src="https://loremflickr.com/1280/440/paris" alt="">
</section> -->

<section class="people">
  <div class="container">
    <h2>Leadership Team</h2>
    <p>Pope Design Group is led by a diverse group of individuals representing our various practice areas. Each of them is dedicated to making sure team members are empowered, motivated, capable, and equipped to work effectively. We encourage everyone in the firm to have project ownership, take initiative, contribute creatively, and make a difference in the community.</p>
    <ul class="inner">
      <?php while (have_rows('people')): the_row();
      $person = get_sub_field('person');
      $photo = get_field('photo', $person)
      ?>
      <li>
        <a href="<?php echo get_the_permalink($person);?>">
          <?php echo wp_get_attachment_image($photo, 'full');?>
          <h3><?php echo get_the_title($person);?><?php if (get_field('accreditation', $person)) {?>, <?php echo get_field('accreditation', $person);?><?php } ?></h3>
          <h4><?php echo get_field('title', $person);?></h4>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
</section>

<section class="cta-blurb">
  <div class="container">
    <div class="inner">
      <div class="content">
        <p>
          We’ve built a reputation for listening to client needs and responding with thoughtful, practical design solutions.
        </p>
      </div>
      <div class="cta">
        <a href="#"><span>TELL US ABOUT YOUR VISION</span></a>
      </div>
    </div>
  </div>
</section>


<?php
get_footer();

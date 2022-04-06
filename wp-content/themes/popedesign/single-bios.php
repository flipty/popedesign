<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="row">

      <div class="col-sm-4 aside">
        <?php echo wp_get_attachment_image( get_field( 'photo' ), 'bio');  ?>
      </div>

      <div class="col-sm-8">
        <h1>
          <?php the_title(); ?>
          <?php if( get_field( 'accreditation' ) ) : ?>
            <em><?php the_field( 'accreditation' ); ?></em>
          <?php endif; ?>
        </h1>
        <h2><?php the_field('title'); ?></h2>
        
        <div class="post-content">
          <?php the_content(); ?>
        </div>

        <?php $quote = get_field('quote'); ?>
        <?php if( $quote ) : ?>
          <p class="quote">
            <?php echo $quote; ?>
            <em class="startquote">&ldquo;</em>
            <em class="endquote">&rdquo;</em>
          </p>
        <?php endif; ?>


      </div>

    </div><!--/row-->

  <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
<?php
/*
Template Name: People Template
*/
?>
<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<div class="row">
          
    <div class="container nopadding isoGrid" id="news-ctabanners">
      <div class="col-xs-12">

        <div class="row">
          
          <?php if( have_rows( 'marketing_message' ) ): ?>

              <div class="isotope marketing">
                  <h2>
                    <?php while( have_rows( 'marketing_message' ) ): the_row(); ?>
                      <?php the_sub_field('message'); ?><br />
                    <?php endwhile; ?>
                  </h2>
              </div>

          <?php endif; ?>

          <?php if( have_rows( 'people' ) ): ?>

            <?php while( have_rows( 'people' ) ): the_row(); ?>

              <?php $person = get_sub_field('person'); ?>

              <?php if( $person ) : ?>

                <?php $post = $person; setup_postdata( $post ); ?>
                  <div class="isotope personIso">
                    <a href="<?php the_permalink(); ?>">
                      <?php echo wp_get_attachment_image( get_field( 'photo' ), 'bio'); ?>
                      <h2>
                        <?php the_title( ); ?>
                      </h2>
                    </a>  
                  </div>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>

            <?php endwhile; ?>

          <?php endif; ?>
  
        </div>

      </div><!--/col-->
    </div><!--/isoGrid-->
  </div>

</div><!--/container content-area-->

<?php get_footer(); ?>
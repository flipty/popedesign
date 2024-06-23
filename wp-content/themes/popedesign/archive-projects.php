<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

  <div class="row">
          
    <div class="container nopadding isoGrid" id="news-ctabanners">
      <div class="col-xs-12">

        <div class="row">
          <?php if( $paged === 0 && have_rows( 'marketing_message' ) ): ?>

              <div class="isotope marketing">
                <a href="<?php echo get_field('marketing_link'); ?>">
                  <h2>
                    <?php while( have_rows( 'marketing_message' ) ): the_row(); ?>
                      <?php the_sub_field('message'); ?>.<br />
                    <?php endwhile; ?>
                  </h2>
                </a>
              </div>

          <?php endif; ?>

          <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
              <?php
                $isotope_class = '';
                $image = wp_get_attachment_image( get_field( 'project_image' ), 'isotope');
                if( !$image ){
                    if( have_rows( 'photos' ) ):
                      while( have_rows( 'photos' ) ): the_row();
                        $image = wp_get_attachment_image( get_sub_field( 'photo' ), 'isotope');
                      break;
                      endwhile;
                    endif;
                  }
                if( !$image ){
                  $isotope_class = ' no-image';
                } 
              ?>
              <div class="isotope<?php echo $isotope_class; echo get_field( 'remove_link' ) ? ' no-link': ''; ?>">
                <?php if( !get_field( 'remove_link' ) ) { ?>
                  <a href="<?php the_permalink(); ?>">
                <?php } ?>
                  <?php echo $image; ?>
                  <h2>
                    <em><?php the_time('l, F jS, Y'); ?></em>
                    <?php the_title( ); ?>
                  </h2>
                <?php if( !get_field( 'remove_link' ) ) { ?>
                  </a>
                <?php } ?>  
              </div>

            <?php endwhile; ?>

          <?php endif; ?>       
        </div>

      </div><!--/col-->
    </div><!--/isoGrid-->
  </div>

</div><!--/container content-area-->
<?php 
  if (have_posts()) : 
     pope_page_nav( false ); 
  endif; 
?>
<?php get_footer(); ?>
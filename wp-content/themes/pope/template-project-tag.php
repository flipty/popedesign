<?php 
/*
Template Name: Project Tag Template
*/
?>
<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<div class="row">
          
    <div class="container nopadding isoGrid" id="news-ctabanners">
      <div class="col-xs-12">

        <div class="row">
          
          <?php if( $paged === 0 && have_rows( 'marketing_message' ) ): ?>

              <div class="isotope marketing">
                <a href="<?php the_field('marketing_link'); ?>">
                  <h2>
                    <?php while( have_rows( 'marketing_message' ) ): the_row(); ?>
                      <?php the_sub_field('message'); ?>.<br />
                    <?php endwhile; ?>
                  </h2>
                </a>
              </div>

            <?php endif; ?>

            <?php 
              $taxonomy = 'project-tag';
              $terms = get_terms( $taxonomy ); 
            ?>

            <?php if ( !empty( $terms ) ) : ?>

              <?php foreach ( $terms as $term ) : ?>

               <?php 
                  $image = wp_get_attachment_image( get_field( 'featured_image', $term ), 'isotope'); 
                  if( !$image ){
                    $isotope_class = 'no-image';
                  } 
                ?>

                <div class="isotope <?php echo $isotope_class; ?> projectIso">
                  <a href="<?php echo get_term_link( $term, $taxonomy ); ?>">

                    <?php echo $image; ?>
                    <h2>
                      <?php echo $term->name; ?>
                    </h2>
                  </a>
                </div>
                
              <?php endforeach; ?>

            <?php endif; ?>
  
        </div>

      </div><!--/col-->
    </div><!--/isoGrid-->
  </div>

</div><!--/container content-area-->

<?php get_footer(); ?>
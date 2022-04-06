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
              global $post;
              $term = get_term_by('slug', $term, 'project-type');
            ?>

            <?php 
              $term_ids = array();
            ?>

            <?php if( have_rows( 'featured_projects', $term ) ) : ?>

              <?php while( have_rows( 'featured_projects', $term ) ): the_row(); ?>

                  <?php $project = get_sub_field('project' ); ?>

                  <?php if( $project ) : ?>

                    <?php $post = $project; setup_postdata( $post ); ?>

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

                      <div class="isotope<?php echo $isotope_class; echo get_field( 'remove_link' ) ? ' no-link': ''; ?> projectIso">
                        <?php if( !get_field( 'remove_link' ) ) { ?>
                          <a href="<?php the_permalink(); ?>">
                        <?php } ?>
                          <?php echo $image; ?>
                          <h2>
                            <?php the_title(); ?>
                          </h2>
                        <?php if( !get_field( 'remove_link' ) ) { ?>
                          </a>
                        <?php } ?>
                      </div>
                      <?php array_push($term_ids, get_the_ID() ); ?>
                      <?php wp_reset_postdata(); ?>

                  <?php endif; ?>

              <?php endwhile; ?>

            <?php endif; ?>


           <?php 
                $args = array( 
                  'post_type' => 'projects',
                  'orderby' => 'name', 
                  'order' => 'ASC', 
                  'posts_per_page' => -1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'project-type',
                      'field'    => 'slug',
                      'terms'    => $term->slug,
                    ),
                  ),
                  'post__not_in' => $term_ids
                );
                
                $posts = new WP_Query( $args );
          ?>
          <?php if ( $posts->have_posts() ) : ?>

            <?php 
              $count = 0;
              $projects_count = $posts->post_count;
              $projects_per_column = round( $projects_count / 3 );
            ?>

            <div class="row projectTypeList">
          
                <div class="col-md-12">
                  <h2>Additional Experience</h2>
                </div>

                <div class="col-md-4">
                  <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

                    <?php $count++; ?>
                    
                    <p>
                      <strong>
                        <?php if( !get_field( 'remove_link' ) ) { ?>
                          <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                          </a>
                        <?php } else { ?>
                          <?php the_title(); ?>
                        <?php } ?>
                      </strong>
                      <br>
                      <?php the_field('city'); ?>, <?php the_field('state'); ?>
                    </p>

                    <?php if( $count == $projects_per_column ): ?>

                        </div>
                        <div class="col-md-4">

                        <?php $count = 0; ?>

                    <?php endif; ?>
                    
                  <?php endwhile; ?>

                </div>

            </div>
          <?php endif; ?>
        </div>

      </div><!--/col-->
    </div><!--/isoGrid-->
  </div>

</div><!--/container content-area-->

<?php get_footer(); ?>
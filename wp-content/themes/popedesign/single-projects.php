<?php get_header(); ?>
<main>
<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>
    <?php 
      $big_title = false;
      $title = get_the_title(); 
      $title_length = strlen($title);
      if ($title_length >= 50) { $big_title = true; }
    ?>
    <section class="title">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 title-text <?php if ($big_title){ echo ' big-title'; };?>">
            <h1><?php echo get_the_title(); ?></h1>
          </div>
          <div class="col-sm-3 title-breadcrumb">
              <?php 
              $ptypeLink = wp_get_post_terms(get_the_ID(), 'project-type')[0]->slug;
              $ptype = wp_get_post_terms(get_the_ID(), 'project-type')[0]->name;
              ?>
            <a href="/projects/type/<?php echo $ptypeLink;?>" class="bread">See More <?php echo $ptype; ?> Projects</a> 
          </div>
        </div>
      </div>
    </section>

    <?php if( have_rows( 'photos' ) ): ?>

          <div class="owl-carousel owl-theme" id="project-detail">

          <?php while( have_rows( 'photos' ) ): the_row(); ?>

            <div class="item">
                 <?php echo wp_get_attachment_image( get_sub_field( 'photo' ), 'carousel'); ?>
            </div><!--/item-->

          <?php endwhile; ?>

          </div>

        <?php endif; ?>

    <div class="container breadcrumb-container">

      <?php get_template_part('partials/page', 'breadcrumb'); ?>

    </div>
        <?php
          $city = get_field('city');
          $state = get_field('state');
          $size = get_field('size');
          $unit_mix = get_field('unit_mix');
          $client = get_field('client');
          $contractor = get_field('contractor');
          $services = get_field('services');
          $occupancy = get_field('occupancy');
          //$completion_date = get_field('completion_date'); //removed by request
          //$estimated_completion_date = get_field('estimated_completion_date'); //removed by request
          $construction_costs = get_field('construction_costs');
          $photographer = get_field('photographer');
          $related = get_field('related_projects');
        ?>


    <div class="container detail-container">
      <div class="row">
        <div class="col-md-8 detailText">

          <div class="post-content">
            <?php the_content(); ?>
          </div>

          <?php if(get_field('quote')) : ?>
            <div class="project-quote">
              <p><?php echo get_field('quote');?></p>
		            <h3><?php echo get_field('quote-name');?>, <?php echo get_field('quote-title');?></h3>
            </div>
          <?php endif; ?>

        </div>

        <div class="col-md-4 testimonial">

          <div class="statBlock">

            <?php if( $state && $city ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Location:
                </div>
                <div class="col-md-12 value">
                  <?php echo $city . ', ' . $state; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if( $size ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Size:
                </div>
                <div class="col-md-12 value">
                  <?php echo $size; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if( $unit_mix ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Unit Mix:
                </div>
                <div class="col-md-12 value">
                  <?php echo $unit_mix; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if( $client ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Client:
                </div>
                <div class="col-md-12 value">
                  <?php echo $client; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if( $contractor ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Contractor:
                </div>
                <div class="col-md-12 value">
                  <?php echo $contractor; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if( $services ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Services:
                </div>
                <div class="col-md-12 value">
                  <?php echo $services; ?>
                </div>
              </div>
            <?php endif; ?>

            
            <?php if( $completion_date ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Completion Date:
                </div>
                <div class="col-md-12 value">
                  <?php echo $completion_date; ?>
                </div>
              </div>
             <?php endif; ?>

             <?php if( $estimated_completion_date ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Estimated Completion Date:
                </div>
                <div class="col-md-12 value">
                  <?php echo $estimated_completion_date; ?>
                </div>
              </div>
             <?php endif; ?>
            
            <?php if( $occupancy ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Occupancy:
                </div>
                <div class="col-md-12 value">
                  <?php echo $occupancy; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if( $photographer ) : ?>
              <div class="row stats">
                <div class="col-md-12 stat">
                  Photographer:
                </div>
                <div class="col-md-12 value">
                  <?php echo $photographer; ?>
                </div>
              </div>
            <?php endif; ?>

          </div>

          <?php
            $taxonomy = 'project-tag';
            $terms = get_the_terms( get_the_ID(), $taxonomy );
            $terms_count = count($terms);
            $term_count = 0;
          ?>

          <?php if ( !empty( $terms ) ) : ?>

            <p class="tags">
              Tags:
              <?php foreach ( $terms as $term ) : ?>

                  <?php $term_count++; ?>

                  <?php if( $term_count != $terms_count ){ ?>
                    <a href="<?php echo get_term_link( $term, $taxonomy ); ?>"><?php echo $term->name; ?></a>,
                  <?php } else { ?>
                    <a href="<?php echo get_term_link( $term, $taxonomy ); ?>"><?php echo $term->name; ?></a>
                  <?php } ?>

              <?php endforeach; ?>

            </p>

          <?php endif; ?>

          <?php if($related) : ?>
            <h3 class="related-title">Related Projects</h3>
            <div class="related-projects">
            <?php foreach ($related as $rproject){ ?>
              <div class="related-project">
                <a href="<?php echo get_the_permalink($rproject);?>">
                  <?php if( have_rows( 'photos', $rproject ) ): $i = 0; ?>
                    <?php while( have_rows( 'photos', $rproject ) ): the_row(); $i++; ?>
                    <?php if ($i == 1){ ?>
                    <div class="related-project-image">
                    <?php echo wp_get_attachment_image( get_sub_field( 'photo' ), 'carousel'); ?>
                    </div>
                    <?php } ?>
                    <?php endwhile; ?>
                  <?php endif; ?>
                  <h4><?php echo get_the_title($rproject);?></h4>          
                </a>
              </div>              
            <?php }; ?>
            </div>
          <?php endif; ?>


        </div>
      </div>
      <?php 
      $layout = 'Normal';
      if (get_field('gallery_layout')){
        $layout = get_field('gallery_layout'); 
        $staggeredItem = 1;
      }
      ?>
      <?php if( have_rows( 'photos' ) ): ?>
      <div class="gallery-container">
          <h2><?php echo get_the_title();?> Gallery</h2>
          <div class="inline-gallery <?php if ($layout){ ?> gallery-<?php echo $layout; } ?>">

          <?php while( have_rows( 'photos' ) ): the_row(); ?>
          <?php $thisIndex = get_row_index(); ?>
            <div class="item <?php if (wp_get_attachment_caption( get_sub_field('photo'))){ echo ' has-caption'; echo ' staggeredItem-' . $staggeredItem; } ?> index-<?php echo $thisIndex; ?>">
                <?php echo wp_get_attachment_image( get_sub_field( 'photo' ), 'carousel'); ?>
                <?php if (wp_get_attachment_caption( get_sub_field('photo'))){ $staggeredItem++ ?>
                <?php echo '<p>' . wp_get_attachment_caption( get_sub_field('photo')) . '</p>'; } ?>
            </div><!--/item-->

          <?php endwhile; ?>

          </div>
      </div>
      <?php endif; ?>

    </div><!--/container-->

    <?php endwhile; ?>

  <?php endif; ?>
</main>
<?php get_footer(); ?>

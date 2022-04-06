<?php
/*
Template Name: News Template
*/
?>
<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

  <?php if( $paged === 0 ) : ?>

    <div class="row">
    <?php $featured_news = get_field('featured_news'); ?>

      <?php if( $featured_news ) : ?>

        <?php $post = $featured_news; setup_postdata( $post ); ?>
          <div class="col-xs-12 featuredStory nopadding">
                
            <div class="featuredImage">
              <div class="isotope">
                <?php echo wp_get_attachment_image( get_field( 'news_image' ), 'isotope'); ?>
              </div>  
            </div>
                
            <div class="featuredContent">
              <h1><?php the_title(); ?></h1>
              <h4><?php the_time('l, F jS, Y'); ?></h4>
              <?php the_excerpt(); ?>         
              <a href="<?php the_permalink(); ?>" class="readMore">Read More</a>
            </div>
                
          </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

    </div><!--/row-->

  <?php endif; ?>

  <div class="row">
          
    <div class="container nopadding isoGrid" id="news-ctabanners">
      <div class="col-xs-12">

        <div class="row">
 <!--
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

  -->
          <?php 
                $paged === 0 ? $posts_per_page = 9 : $posts_per_page = 10;
                $args = array( 
                  'post_type' => 'news', 
                  'orderby' => 'date', 
                  'order' => 'DESC', 
                  'posts_per_page' => $posts_per_page, 
                  'paged' => $paged
                );
                
                $posts = new WP_Query( $args );
          ?>
          <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

            <div class="isotope">
              <a href="<?php the_permalink(); ?>">
                <?php echo wp_get_attachment_image( get_field( 'news_image' ), 'isotope'); ?>
                <h2>
                  <em><?php the_time('l, F jS, Y'); ?></em>
                  <?php the_title(); ?>
                </h2>
              </a>  
            </div>

          <?php endwhile; ?>
                
        </div>

      </div><!--/col-->
    </div><!--/isoGrid-->
  </div>

</div><!--/container content-area-->

<?php pope_page_nav( $posts ); ?>

<?php get_footer(); ?>
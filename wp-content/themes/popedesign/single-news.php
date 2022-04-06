<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <div class="row">

    <?php $imageType = get_field( 'image_type' ); ?>

      <div class="col-xs-<?php echo $imageType === 'sidebar' ? '8' : '8'; ?> featuredStory"><!-- was 8 12 -->
        
        <div class="detailContent">
          <h4><?php the_time('l, F jS, Y'); ?></h4>

          <?php if( $imageType === 'full' ){ ?>
              <div class="full-news-detail-image">
                <?php echo wp_get_attachment_image( get_field( 'news_image' ), 'carousel'); ?>
              </div>
          <?php } ?>
          
          <div class="post-content">
            <?php the_content(); ?>
          </div>
          
        </div>
        
      </div>
      <?php if( $imageType === 'sidebar' ){ ?>
      	<div class="col-xs-4">
          <div class="sidebar-news-detail-image">
            <?php echo wp_get_attachment_image( get_field( 'news_image' ), 'carousel'); ?>
          </div>
      	</div>
      <?php } ?>

    </div><!--/row-->


    </div><!--/container content-area-->

  
  <?php endwhile; ?>

  <?php pope_page_nav( false ); ?>

<?php endif; ?>

<?php get_footer(); ?>
<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>
    <main>

    <section class="subpage-head-small no-margin"><!--logic for color-->
        <div class="container">
          <div class="inner">
              <span>News</span>
          </div>
        </div>
    </section>
    <div class="container">
    <?php get_template_part('partials/page', 'breadcrumb'); ?>
    <div class="row">
      <?php $imageType = get_field( 'image_type' ); ?>
      <div class="col-md-8"><!-- was 8 12 -->
        <div class="detailContent">
          <?php if( $imageType === 'full' ){ ?>
              <div class="full-news-detail-image">
                <?php echo wp_get_attachment_image( get_field( 'news_image' ), 'carousel'); ?>
              </div>
          <?php } ?>
          <div class="post-content">
            <h1><?php the_title();?></h1>
            <h4><?php the_time('l, F jS, Y'); ?></h4>
            <?php the_content(); ?>
            <hr>
            <div class="post-categories">
              <strong>Categories:</strong>
              <?php echo get_the_term_list( $post->ID, 'news-category', '<ul class="styles"><li>', ',</li><li>', '</li></ul>');?>
            </div>
          </div>
        </div>
      </div>

    	<div class="col-md-4">
        <?php if( $imageType === 'sidebar' ){ ?>
          <div class="sidebar-news-detail-image">
            <?php echo wp_get_attachment_image( get_field( 'news_image' ), 'carousel'); ?>
          </div>
        <?php } ?>
          <div class="taxonomies">
            <?php
              $post_type = get_post_type();
              $taxonomy = false;

              if( $post_type == 'news' ){
                $taxonomy = 'news-category';
                $term_title = 'Categories';
              }
              else if( $post_type == 'projects'){
                $taxonomy = 'project-tag';
                $term_title = 'Tags';
              }
              $terms = get_terms($taxonomy);
              if ( $terms && !is_wp_error( $terms ) ) :
            ?>
                <h5><?php echo $term_title; ?></h5>
                <ul>
                  <?php foreach ( $terms as $term ) { ?>
                    <li<?php if (has_term($term)){ echo 'class="active"';} ?>><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
                  <?php } ?>
                </ul>
            <?php endif;?>
            <h5>Archive</h5>
            <ul>
              <?php
                $archives = array(
                  'post_type' => $post_type,
                  'type' => 'yearly'
                );
                wp_get_archives( $archives );
              ?>
            </ul>

       </div>

    </div><!--/row-->
  </div>


  <?php endwhile; ?>


<?php endif; ?>
</main>


<?php get_footer(); ?>

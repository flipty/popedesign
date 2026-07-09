<?php
  function pope_page_nav( $posts ){
?>
<div class="pageNav">
  <div class="container nopadding">
    <div class="row">
      <div class="col-md-6 prevPage">
        <?php
          $posts
          ?
          previous_posts_link('&lt;&lt; Previous Page', $posts->max_num_pages)
          :
          previous_posts_link('&lt;&lt; Previous Page')
          ;
        ?>
      </div>
      <div class="col-md-6 nextPage">
        <?php
          $posts
          ?
          next_posts_link('Next Page &gt;&gt;', $posts->max_num_pages)
          :
          next_posts_link('Next Page &gt;&gt;')
          ;
        ?>
      </div>
    </div>
    <?php if( !is_search() ) :?>
      <?php
        $post_type = get_post_type();
        $taxonomy = false;

        if( $post_type == 'news' ){
          $taxonomy = 'news-category';
          $term_title = 'Categories';
        }else if( $post_type == 'projects'){
          $taxonomy = 'project-tag';
          $term_title = 'Tags';
        }

        $terms = get_terms($taxonomy);

        if ( $terms && !is_wp_error( $terms ) ) :
      ?>
        <div class="col-md-8 categories">
          <h5><?php echo $term_title; ?></h5>
          <ul>
            <?php foreach ( $terms as $term ) { ?>
              <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      <?php endif;?>

      <div class="col-md-4 archive">
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
    <?php endif; ?>
  </div>
</div>
<?php
}

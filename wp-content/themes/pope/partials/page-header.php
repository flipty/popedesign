<?php
	$post_type = get_post_type();
	$id = get_the_ID();
	$title = false;
	$link = false;
	$child_title = false;
	$child_link = false;
	$type_title = false;
	$type_link = false;
	$grandchild_title = false;
	$grandchild_link = false;
	$project_headline = false;

	if( is_single() && $post_type == 'projects'){
		$header_image_class = 'carouselTarget';
	}else{
		$header_image_class = '';
	}
?>

<div class="header-image <?php echo $header_image_class; ?>">

	<?php if( is_single() && $post_type == 'projects' ) { ?>

		<?php if( have_rows( 'photos' ) ): ?>

          <div class="owl-carousel owl-theme" id="project-detail">

          <?php while( have_rows( 'photos' ) ): the_row(); ?>

            <div class="item">
                 <?php echo wp_get_attachment_image( get_sub_field( 'photo' ), 'carousel'); ?>
            </div><!--/item-->

          <?php endwhile; ?>

          </div>

        <?php endif; ?>

  	<?php
  		} else if( is_page() ){
	  		echo wp_get_attachment_image( get_field( 'header_image' ), 'header');
	  	}else if( is_search() || is_404() ){
	  		echo wp_get_attachment_image( get_field( 'header_image', 9497 ), 'header');
	  	} else if( is_tax( 'project-type' ) ){
			global $post;
            $term = get_term_by('slug', $term, 'project-type');
		 	echo wp_get_attachment_image( get_field( 'header_image', $term ), 'header');
		}else {
	  		if( $post_type == 'bios' ){
	  			$page = get_page_by_path( 'people' );
	  		}else{
	  			$page = get_page_by_path( $post_type );
	  		}
	  		echo wp_get_attachment_image( get_field( 'header_image', $page->ID ), 'header');
	  	}
  	?>
</div>

<?php
	if( is_page( 'news' ) ){
		$content_id = 'newsList';
	}else if( is_single() && $post_type == 'news'){
		$content_id = 'newsDetail';
	}else if( is_page( 'projects' ) ){
		$content_id = 'projectList';
	}else if( is_single() && $post_type == 'projects'){
		$content_id = 'projectDetail';
	}else if(is_search()){
		$content_id = 'searchResults';
	}else if(is_404()){
		$content_id = '404';
	}else{
		$content_id = prepId( get_the_title() );
	}

	if( is_page( 'People' ) ){
		$content_id = 'bioList';
	}else if( is_single() && $post_type == 'bios'){
		$content_id = 'bioDetail';
	}

	if ( is_archive() ){
		$post_type_object = get_post_type_object( $post_type );
		$title = $post_type_object->labels->singular_name;
		$link = get_permalink( get_page_by_path( $post_type ) );
	}

	if( is_page() && !is_page('News Category') && !is_page('Projects')){
		$title = get_the_title( $id );
		$link = get_permalink( $id );
	}

	if( is_search() ){
		$count_args = array(
				's' => get_search_query(),
				'posts_per_page' => -1,
			);
		$mySearch = new WP_Query($count_args);
		$search_count = $mySearch->post_count;

		$page_title = $search_count .' Search '.( $search_count  === 1 ? 'Result' : 'Results' ).' for "'. get_search_query() . '"';
		$title = 'Search Results';
		$grandchild_title = get_search_query();
	}

	if( is_page('News Category') ){
		$title = 'News';
		$link = home_url().'/news/';
		$child_title = 'Category';
		$child_link = home_url().'/news-category';
	}

	if( is_page('Project Tags') ){
		$title = 'Projects';
		$link = home_url().'/projects/';
		$child_title = 'Tags';
		$child_link = home_url().'/news/tags';
	}

	if( is_page('Projects') || is_tax('project-type') || is_tax('project-tag') ){
		$title = 'Projects';
		$link = home_url().'/projects/';
	}

	if( $post_type == 'projects' && is_single() ){
		$title = 'Projects';
		$link = home_url().'/projects/';
		$terms = get_the_terms( get_the_ID(), 'project-type' );
		$type_title = $terms[0]->name;
		$type_link = home_url().'/projects/type/'.$terms[0]->slug;
	}

	if( is_year() && $post_type == 'projects' ){
		$page_title = 'Project Archives';
	}

	if( is_year() && $post_type == 'news' ){
		$page_title = 'News Archives';
	}

	if( is_year() ){
		$year = get_the_time('Y');
		$child_title = $year;
		$child_link = get_year_link( $year );
	}

	if( is_tax('news-category') ){
		$child_title = 'Category';
		$child_link = home_url().'/news/category';
		$grandchild_title = single_term_title( false, false );
	}

	if( is_tax('project-type') ){
		$child_title = single_term_title( false, false );
	}

	if( is_tax('project-tag') ){
		$child_title = 'Tags';
		$child_link = home_url().'/projects/tags';
		$grandchild_title = single_term_title( false, false );
	}

	if( is_single() && $post_type == 'bios'){
		$title = 'People';
		$link = home_url().'/people/';
	}

	if( is_single() && $post_type == 'news'){
		$title = 'News';
		$link = home_url().'/news/';
	}

	if( is_single() ){
		$child_title = get_the_title( $id );
		$child_link = get_permalink( $id );
	}

	if( is_single() || is_page() ){
		$page_title = get_the_title();
	}

	if( is_tax() ){
		$page_title = single_term_title( false, false );
	}

	if( is_404() ){
		$page_title = '404';
		$title = '404';
		$link = '#';
	}
?>

<?php if( is_single() && $page_title && $post_type == 'projects' ) : ?>

	<div class="projectHeadline">
	  <div class="container">
	    <h1><?php echo $page_title; ?></h1>
	  </div>
	</div>

	<?php $project_headline = true; ?>

<?php endif; ?>

<div class="container content-area" id="<?php echo $content_id; ?>">

	<div class="row">
		<div class="col-sm-12 breadcrumb">
			<a href="<?php echo home_url(); ?>">Home</a>
			<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
			<?php if( $type_title && $type_link ) : ?>
				<a href="<?php echo $type_link; ?>"><?php echo $type_title; ?></a>
			<?php endif; ?>
			<?php if( $child_title && $child_link ) : ?>
				<a href="<?php echo $child_link; ?>"><?php echo $child_title; ?></a>
			<?php endif; ?>
			<?php if( $grandchild_title ) : ?>
				<a href=""><?php echo $grandchild_title; ?></a>
			<?php endif; ?>
		</div>
	</div>

	<?php if( is_404() ) : ?>
		<div class="row">
			<div class="col-xs-12 introArea">
				<h1>We're sorry. That page does not exist.</h1>
				<p>Please try searching for what you're looking for:</p>
			</div>
		</div>

	<?php endif; ?>

	<?php if( is_search() || is_page( 'search' ) || is_404() ) : ?>
		<div class="row">
			<div class="col-xs-12">
				<form role="search" method="get" action="<?php echo home_url('/'); ?>">
			        <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" placeholder="Search" />
			    	<input type="submit" value="submit" class="btn btn-default" />
			    </form>
			</div>
		</div>
	<?php endif ;?>

	<?php if( $page_title && !$project_headline && $post_type != 'bios' && !is_year() && !is_404() ) : ?>

		<div class="row">
			<div class="col-xs-12 introArea hiThere">
				<h1><?php echo $page_title; ?></h1>
				<?php if (have_posts() && !is_search() && !is_tax() ) : ?>

					<div class="post-content">

	    				<?php while (have_posts()) : the_post(); ?>

	    					<div class="row">

		    					<?php if( have_rows( 'jobs' ) ): ?>

		    						<div class="col-xs-12 col-sm-8">

							         	<?php while( have_rows( 'jobs' ) ): the_row(); ?>
													<h2 class="jobListing">Current Job Listings</h2>

                                        <div class="jobListing">

                                            <h4><?php the_sub_field('title'); ?></h4>

								            <p><?php the_sub_field('description'); ?></p>

                                        </div>

                                        <?php endwhile; ?>
																				<p>&nbsp;</p>
											<?php the_content(); ?>

					         </div>


						        <?php endif; ?>


							    <?php if( $post_type != 'news' && !have_rows( 'jobs' ) ): ?>

							    	<?php the_content(); ?>

						        <?php endif; ?>


			    				<?php if( get_field('form')): ?>

			    						<?php the_field('form'); ?>

			    				<?php endif;?>

		    				</div>

	    				<?php endwhile; ?>

	    			</div>

	    		<?php endif; ?>
	    	</div>
		</div>

	<?php endif; ?>

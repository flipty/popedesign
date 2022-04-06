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
	$header_image_class = '';
?>

<div class="header-image <?php echo $header_image_class; ?>">
  	<?php
	  		echo wp_get_attachment_image( get_field( 'header_image' ), 'header');
  	?>
</div>

<?php

	$content_id = prepId( get_the_title() );

	if( is_page() && !is_page('News Category') && !is_page('Projects')){
		$title = get_the_title( $id );
		$link = get_permalink( $id );
	}

	if( is_single() ){
		$child_title = get_the_title( $id );
		$child_link = get_permalink( $id );
	}

	if( is_single() || is_page() ){
		$page_title = get_the_title();
	}

?>

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

	<div class="row">
			<div class="col-xs-12 introArea hiThere">

				<h1><?php echo $page_title; ?></h1>

				<?php if (have_posts()) : ?>

					<div class="post-content">

	    				<?php while (have_posts()) : the_post(); ?>

	    					<div class="row">

		    						<div class="col-xs-12 col-sm-8">

											<?php the_content(); ?>

											<?php if( have_rows( 'jobs' ) ): ?>


											<h2 class="jobListing">Current Job Listings</h2>

							         	<?php while( have_rows( 'jobs' ) ): the_row(); ?>

                            <div class="jobListing">

                            <h4><?php the_sub_field('title'); ?></h4>

								            <p><?php the_sub_field('description'); ?></p>

                            </div>

                            <?php endwhile; ?>

												<?php endif;//have_rows(jobs) ?>

														<h4>Submit Application</h4>
														<p>
															<?php echo do_shortcode('[contact-form-7 id="9677" title="Application Form"]');?>
														</p>

					         </div>

		    				</div>
	    				<?php endwhile; //have_posts?>
	    			</div>
	    		<?php endif; //have_posts?>
	    	</div>
		</div>

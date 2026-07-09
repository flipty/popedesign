<div class="row">

	<div class="col-xs-12 col-sm-8">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				's' => get_search_query(),
				'posts_per_page' => 18,
				'post_type' => array( 'news', 'bios', 'projects' ),
				'posts_status' => 'publish',
				'paged' => $paged
			);

			$count_args = array(
				's' => get_search_query(),
				'posts_per_page' => -1,
			);

			$search_query = new WP_Query($args);
			$mySearch = new WP_Query($count_args);

			$search_count = $mySearch->post_count;
			$count = 0;
		?>

		<?php if( get_search_query() && $search_query->have_posts() ) : ?>

			<ul class="search-results">

				 <?php while ( $search_query->have_posts() ) : $search_query->the_post(); ?>

				 	<?php if( !get_field( 'remove_link' ) ) { ?>

						<li>
							<?php
								$count++;
								$post_type = get_post_type();
								if($post_type === 'news'){
									$type = 'News';
									$link = '/news';
								}
								if($post_type === 'bios'){
									$type = 'People';
									$link = '/people';
								}
								if($post_type === 'projects'){
									$type = 'Projects';
									$link = '/projects';
								}
							?>
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<?php if( $post_type === 'news' ) : ?>
								<em><?php the_time('l, F jS, Y'); ?>, <a href="<?php echo home_url() . $link ?>"><?php echo $type; ?></a></em>
							<?php else: ?>
								<em><a href="<?php echo home_url() . $link ?>"><?php echo $type; ?></a></em>
							<?php endif; ?>

							<p><?php echo pope_get_excerpt( get_the_content(), 50 ); ?></p>
							<?php if( $count != $search_query->post_count ) :?>
								<hr/>
							<?php endif; ?>
						</li>

					<?php } ?>

				<?php endwhile; ?>

			</ul>

		<?php elseif( get_search_query() && $search_query->have_posts() ): ?>
			<h3>No results found. Please search again.</h3>
		<?php else: ?>
			<h3>Please enter text in the search field to begin your search.</h3>
		<?php endif; ?>

	</div>
</div>

<?php
	if( get_search_query() ){

		pope_page_nav( $search_query );

	}
?>

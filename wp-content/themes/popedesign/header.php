<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<script src="/wp-content/themes/popedesign/js/vendor/jquery-3.6.0.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
	<script src="/wp-content/themes/popedesign/js/vendor/owl.carousel.min.js"></script>
	<title><?php if (is_archive()){ echo 'Listing';} else { echo get_the_title(); } ?> | Pope Design</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<div class="container">
		<div class="branding">
			<a href="/" title="Pope Design Group"><img src="/wp-content/themes/popedesign/images/logo-reverse.svg" alt="Pope Design Group"></a>
		</div>
		<nav class="navigation">
			<?php wp_nav_menu('primary'); ?>
			<div class="search-container">
				<a href="#" class="search-trigger"><img src="/wp-content/themes/popedesign/images/magnifying-glass.svg" alt="Search"></a>
				<div class="search-form inactive">
					<?php echo get_search_form();?>
				</div>
				<button type="button" name="menu" class="mobile-only mobile-trigger">
					<!-- <span class="circle"></span> -->
					<span class="top"></span>
					<span class="mid"></span>
					<span class="bot"></span>
					<!-- <span class="arc"></span> -->
				</button>
			</div>
		</nav>
	</div>
</header>

<main>

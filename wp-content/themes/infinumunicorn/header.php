<!doctype html>
	<html>
		<head>
			<title>
				<?php
					wp_title( '-', true, 'right');
					bloginfo( 'name' );
				?>
			</title>
			<?php wp_head(); ?>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
		<body class="<?php body_class('custom-background'); ?>">
			<div class="section">
				<div class="container-fluid">
					<!-- Navigation -->
					<nav class="navbar navbar-default" role="navigation"> 
						<div class="container navbar-flex">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header navbar-flex-logo">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
									<?php $site_url = get_template_directory_uri(). '/img/Logo.png' ?>
									<img src="<?php echo $site_url; ?>" alt="Uniduck logo">
								</a>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-flex-menu" id="navbar-collapse-1">
								<?php /* Primary navigation */
									wp_nav_menu( array(
										'menu' => 'top_menu',
										'depth' => 2,
										'container' => false,
										'menu_class' => 'nav nav-justified navbar-flex-menu-ul',
										//Process nav menu using our custom nav walker
										'walker' => new wp_bootstrap_navwalker() )
									);
								?>
							</div>
							<div class="navbar-flex-buttons">
									<a href="#" class="ios-button">
										<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-apple.svg'; ?>
										<img src="<?php echo $icon_url; ?>" alt="Apple-logo">
										<span class="ios-button-text">
											GET FOR IOS
										</span>
									</a>
									<a href="#" class="unicorn-owners-button">
										<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-unicorn.svg'; ?>
										<img src="<?php echo $icon_url; ?>" alt="Unicorn logo">
										<span class="unicorn-owners-button-text">
											Unicorn owners											
										</span>
									</a>
							</div>
							<!-- /.navbar-collapse -->
						</div>
						<!-- /.container -->
					</nav>


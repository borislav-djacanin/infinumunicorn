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
		<body class="custom-background">
			<div class="section">
				<div class="container-fluid">
				<nav class="navbar navbar-default" role="navigation"> 
					<!-- Brand and toggle get grouped for better mobile display --> 
					<div class="row">
					  <div class="col-md-12">
						<div class="section">
						  <div class="container">
							<div class="row">
							  <div class="col-md-10 col-md-offset-1">
								<?php /* Primary navigation */
									wp_nav_menu( array(
										'menu' => 'top_menu',
										'depth' => 2,
										'container' => false,
										'menu_class' => 'nav nav-justified nav-pills',
										//Process nav menu using our custom nav walker
										'walker' => new wp_bootstrap_navwalker() )
									);
								?>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</nav>
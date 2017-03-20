</div>
</div>
</div>
		<div class="container">
			<section class="subscribe">
				<div class="row">
					<div class="col-md-12">
						<div class="subscribe-title-wrapper">
							<div class="subscribe-title">
								Subscribe to duck news
							</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-3"></div>
						<div class="col-md-6">	
							<div class="subscribe-form-wrapper">
								<form action="index.html" method="post" class="subscribe-form">
									<div class="subscribe-form-flex-email">
										<input type="email" name="email" class="subscribe-input" placeholder="Enter your e-mail address">								
									</div>
									<div class="subscribe-form-flex-submit">
										<button type="submit" class="subscribe-submit">SUBSCRIBE</button>					
									</div>

								</form>						
							</div>
						</div>
						<div class="col-md-3"></div>
						</div>
					</div>		
				</div>
			</section>
		</div>
		<footer class="section unicorn_infinum-footer">
				<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-logo">
									<a href="<?php echo get_home_url(); ?>">
										<?php $site_url = get_template_directory_uri(). '/img/Logo.png' ?>
										<img src="<?php echo $site_url; ?>" alt="">
									</a>									
								</div>
								<div class="footer-copyright">
									&copy;&nbsp<?php echo date('Y'); ?>&nbsp
									Uniduck. All rights reserved.
								</div>
								<div class="footer-links">
									<div class="link-privacy">
										<a href="#">Privacy Policy</a>
									</div>
									<div class="link-terms">
										<a href="#">Terms of use</a>
									</div>
								</div>
							</div>
							<div class="col-md-6">

								<div class="footer-social-media">
									<div class="soc-facebook">
										<a  href="<?php echo get_theme_mod( 'unicorn_infinum_footer_facebook_url' ); ?>" target="_blank">Like <span class="text-higlight">Uniduck</span> on 
										<span>
											<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-facebook.svg'; ?>
											<img src="<?php echo $icon_url; ?>" alt="">
										</span>
										</a>										
									</div>
									<div class="soc-twitter">
										<a  href="<?php echo get_theme_mod( 'unicorn_infinum_footer_twitter_url' ); ?>" target="_blank">Follow <span class="text-higlight">@uniduck</span> on 
										<span>
											<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-twitter.svg'; ?>
											<img src="<?php echo $icon_url; ?>" alt="">
										</span>
										</a>										
									</div>
									<div class="soc-instagram">
										<a  href="<?php echo get_theme_mod( 'unicorn_infinum_footer_instagram_url' ); ?>" target="_blank">Follow <span class="text-higlight">@uniduck</span> on 
										<span>
											<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-instagram.svg'; ?>
											<img src="<?php echo $icon_url; ?>" alt="">
										</span>
										</a>										
									</div>
								</div>

							</div>
						</div>	  		
				</div> <!-- end container -->
			</footer>

		<?php wp_footer(); ?>
	</body>
</html>
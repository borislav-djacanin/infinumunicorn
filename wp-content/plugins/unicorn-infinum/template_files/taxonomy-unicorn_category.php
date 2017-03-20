<?php get_header(); ?>

	<div class="container">
		
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-md-12">
						<div class="blog-title-wrapper">
							<div class="blog-title">
								Blog
							</div>
						</div>
					</div>								
				</div>

	<div class="load-more">
		<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

			<div class="col-md-12 news-taxonomy">
				<div class="col-md-6">
					<figure>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'unicorn_infinum-thumb-600' ); ?>
						</a>
					</figure>											
				</div>
				<div class="col-md-6">
					<h3 class="unicorn_infinum_title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					<p class="the_excerpt" >
						<?php
							$my_excerpt = get_the_excerpt();
							echo $my_excerpt;
						?>					
					</p>											
				</div>				
			</div>

		
		<?php endwhile; else: ?>
					</div>
			<p>There are no posts or pages here.</p>

		<?php endif; ?>
	</div>
		</div>

		<div class="col-sm-4">
			
			<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
				<div id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar1' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>
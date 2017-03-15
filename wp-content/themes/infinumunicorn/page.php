<?php get_header(); ?>

<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

	<div class="container unicorn_infinum_title">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h3 class=""><?php the_title(); ?></h3>				
			</div>
		</div>
	</div>

	<div class="container unicorn_infinum_content_container">
		
		<div class="row">
			<div class="col-sm-6">
				<div class="unicorn_infinum_the_content">
					<?php the_content(); ?>				
				</div>
	
<?php endwhile; else: ?>
			</div>
	<p>There are no posts or pages here.</p>

<?php endif; ?>
			</div>

			<div class="col-sm-6">

				<div class="unicorn_infinum_glavna_slika">
					<?php 
						// check if the post has a Post Thumbnail assigned to it.
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full', array('class' => 'center_image img-rounded img-responsive') );
						} 
					?>				
				</div>
				
			</div>
		</div>
	</div> <!-- unicorn_infinum_content_container -->
<?php get_footer(); ?>

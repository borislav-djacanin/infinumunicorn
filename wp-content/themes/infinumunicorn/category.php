<?php get_header(); ?>

	<div class="container">
		
		<div class="row">
			<div class="col-sm-8">
			Category page

<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>


	<h3><?php the_title(); ?></h3>
	<?php the_content(); ?>
	
<?php endwhile; else: ?>
			</div>
	<p>There are no posts or pages here.</p>

<?php endif; ?>
		</div>

		<div class="col-sm-4">
			
			Sidebar

		</div>
	</div>
<?php get_footer(); ?>
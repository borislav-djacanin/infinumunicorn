<?php get_header(); ?>

	<div class="container">
		
		<div class="row">
			<div class="col-sm-8">

<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>


	<div class="naslov">
		<h1 class="unicorn_infinum_naslov"><?php the_title(); ?></h1>			
	</div>
	<ul class="info list-unstyled">
		<li>Objavljeno : <?php the_time('j.m.Y.'); ?></li>
	</ul>

	<?php the_content(); ?>
	
<?php endwhile; else: ?>
			</div>
	<p>There are no posts or pages here.</p>

<?php endif; ?>
		</div>

		<div class="col-sm-4">
			
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>
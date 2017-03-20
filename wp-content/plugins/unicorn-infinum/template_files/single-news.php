<?php
 /*Template Name: Single News Template
 */
 
get_header(); ?>

<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
<?php
if (has_post_thumbnail()) {
	$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'unicorn_infinum-thumb-600' );
	$thumbnail_url = $thumbnail_data[0];
}
?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style='background-image: url("<?php echo $thumbnail_url ?>")'>
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="post-heading">
						<h1 class="unicorn_infinum_single_post_title"><?php the_title(); ?></h1>
							<div class ="unicorn_infinum_single_post_meta">
								<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-writer.svg'; ?>
								<img src="<?php echo $icon_url; ?>" alt="">
								<?php
								global $post;
								$author_id=$post->post_author;
								?>
								<?php
								$author_name = get_the_author_meta( 'user_nicename', $author_id );
								$author_url  = get_author_posts_url( $author_id );
								?>						
								<a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
							</div>
							<div class="link-back-to-blog">
								<?php 
								$home_url = get_home_url();
								$blog_url = $home_url . "/news";
								?>
								<a href="<?php echo $blog_url; ?>">Back to blog</a>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 unicorn_infinum_single_post_main_content">
				<?php the_content() ?>					
				<div class="category">
					<?php 
						$category_detail = get_the_terms( $post->ID, 'unicorn_category' );
						if ( $category_detail ):
							?>
							<span class="category-detail">
								<ul>
								<?php 
									foreach ( $category_detail as $cd) {
										echo "<li>";
										$home_url = get_home_url();
										$term_url = $home_url . "/news/category/". esc_html( $cd->slug );
										echo '<a href="' . $term_url . '">' . esc_html( $cd->name ) . '</a>';
										#echo get_category_parents( $cd->term_id, false, '' );
										echo "</li>";				
									}
								?>									
								</ul>
							</span>
						<?php
						endif;
					?>
				</div>
				<div class="random-post">
					<div class="blog-title-wrapper">
						<div class="blog-title">
							More magic
						</div>

					</div>
					<?php 
						$args = array(
							'post_type' => 'news',
							'orderby'	=> 'rand',
							'posts_per_page' => 1, 
							);

							// The Query
							$query = new WP_Query( $args );

							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									// do something
									?>

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
									<?php
								}
							} else {
								// no posts found
							}

							// Restore original Post Data
							wp_reset_postdata();

				
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; else: ?>
			</div>
	<p>There are no posts or pages here.</p>

<?php endif; ?>
<?php #wp_reset_query(); ?>
<?php get_footer(); ?>
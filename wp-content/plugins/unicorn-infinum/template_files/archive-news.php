<?php
 /*Template Name: Archive News Template
 */
 
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="blog-title-wrapper">
				<div class="blog-title">
					<?php 
						$name = get_bloginfo( 'name' );
						echo $name;
					?>
				</div>
				<div class="search-form">
					<form action="<?php echo home_url( '/' ); ?>" method="get">
						<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-search.svg'; ?>
						<img src="<?php echo $icon_url; ?>" alt="search">
						<input type="text" name="s" id="search" class="search-box-input" placeholder="Search blog" value="<?php the_search_query(); ?>" />
					</form>
					<?php 
					?>
				</div>
			</div>
		</div>								
	</div>
</div>


<div class="container">
	<?php 
		$args = array(
			'post_type' => 'news',
			'posts_per_page' => 1,
			'meta_key' => 'featured-post',
			'meta_value' => 'yes'
		);
		$featured = new WP_Query($args);

		if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post();
	?>

	<div id="featured-post">
		<div class="row">
			<div class="col-md-6">
					<?php if (has_post_thumbnail()) : ?>
				 
					<figure>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'unicorn_infinum-thumb-600' ); ?>
						</a>
					</figure>
			</div>
			<div class="col-md-6">
				<p class="details"><?php echo get_the_date('F j, Y'); ?></p>
				<h3 class="unicorn_infinum_title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
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
				<p class="the_excerpt" >
					<?php
						$my_excerpt = get_the_excerpt();
						echo $my_excerpt;
					?>					
				</p>
				<div class="the_excerpt_footer">
					<ul>
						<li>
							<span>
								<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-heart.svg'; ?>
								<img src="<?php echo $icon_url; ?>" alt="">
							</span>
							<span class="opis">
								17 Favs
							</span>
						</li>
						<li>
							<span>
								<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-comment.svg'; ?>
								<img src="<?php echo $icon_url; ?>" alt="">
							</span>
							<span class="opis">
								22 comments
							</span>
						</li>
					</ul>
				</div>
				</div>
			<?php $showed = get_the_ID();
				endif;
				endwhile; else:
				endif;
			?>
		</div>
	</div>




	<div class="row">
		<?php
		$mypost = array( 'post_type' => 'news', );
		$loop = new WP_Query( $mypost );
		?>
		<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php if ( get_the_ID() != $showed ): ?>
			<div class="col-md-4 portfolio-item">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	 
					<!-- Display featured image in right-aligned floating div -->
					<div>
						<?php the_post_thumbnail( 'unicorn_infinum-thumb-600' ); ?>
					</div>
	 
				<div class="flex-parent">
					<p class="details-date"><?php echo get_the_date('F j, Y'); ?></p> 					


					<h3 class="unicorn_infinum_title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>

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

	 
				<!-- Display News excerpt -->

					<p class="the_excerpt" >
						<?php
							$my_excerpt = get_the_excerpt();
							echo $my_excerpt;
						?>					
					</p>					

				
					<div class="the_excerpt_footer">
						<ul>
							<li>
								<span>
									<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-heart.svg'; ?>
									<img src="<?php echo $icon_url; ?>" alt="">
								</span>
								<span class="opis">
									17 Favs
								</span>
							</li>
							<li>
								<span>
									<?php $icon_url = UNICORN_INFINUM_PLUGIN_URL . 'icons/ic-comment.svg'; ?>
									<img src="<?php echo $icon_url; ?>" alt="">
								</span>
								<span class="opis">
									22 comments
								</span>
							</li>
						</ul>
					</div>

			</div>
			</article>
			</div>
	 	<?php endif; ?>
		<?php endwhile; ?>
	</div>
	<div class="row">
		<?php unicorn_infinum_numeric_posts_nav(); ?>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
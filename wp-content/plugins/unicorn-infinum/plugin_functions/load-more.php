<?php
/**
 * AJAX Load More 
 * @link http://www.billerickson.net/infinite-scroll-in-wordpress
 */
function unicorn_infinum_ajax_load_more() {
	$args['posts_per_page']  = 3;
	$args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
	$args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
	$args['paged'] = esc_attr( $_POST['page'] );
	$args['post_status'] = 'publish';

	ob_start();
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
		be_post_summary2();
	endwhile; endif; wp_reset_postdata();

	$data = ob_get_contents();

	ob_end_clean();

	echo $data;

	exit;
}
add_action( 'wp_ajax_be_ajax_load_more', 'unicorn_infinum_ajax_load_more' );
add_action( 'wp_ajax_nopriv_be_ajax_load_more', 'unicorn_infinum_ajax_load_more' );


/**
 * Javascript for Load More
 *
 */
function be_load_more_js() {
	global $wp_query;
	$args = array(
		'url'   => admin_url( 'admin-ajax.php' ),
		'query' => $wp_query->query,
	);

	wp_enqueue_script( 'be-load-more', UNICORN_INFINUM_PLUGIN_URL . 'js/load-more.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'be-load-more', 'beloadmore', $args );
	
}
add_action( 'wp_enqueue_scripts', 'be_load_more_js' );

function be_post_summary2() {
	?>
	
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
	
	<?php
}


function be_post_summary() {
?>
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
<?php
}
?>


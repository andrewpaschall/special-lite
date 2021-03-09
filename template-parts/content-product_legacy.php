<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Special-Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'special-lite' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>
		<!--Downloads-->
		<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
			<div class="grid-x grid-padding-x">
				<div class="medium-6 cell">
					<h1><?php echo get_the_title(); ?></h1>
					<aside class="resources-accordion">
						<div class="accordion-header">
							<h3>Resources</h3>
						</div>

						
						<?php

							$associated_downloads = get_field('associated_downloads', false, false);
							$custom_terms = get_terms('download_category');

							foreach($custom_terms as $custom_term) {

								if ($associated_downloads) {
									if (!is_array($associated_downloads)) {
										$associated_downloads = array($associated_downloads);
									}

									$args = array(
										'post_type' => 'downloads',
										'post_status' => 'publish',
										'tax_query' => array(
											array(
												'taxonomy' => 'download_category',
												'field' => 'slug',
												'terms' => $custom_term->slug,
												'hide_empty' => true
											)
										),

										'post__in' => $associated_downloads
									);

									$req_query = new WP_Query($args);
									echo '<ul class="accordion" data-accordion data-allow-all-closed="true">';
									
									if($custom_term->parent) {
										echo '<li class="accordion-item" data-accordion-item>'.'<a href="#" class="accordion-title">'.$custom_term->name.'</a>'.'<div class="accordion-content" data-tab-content>'.'<ul class="menu vertical">';

										
										if ($req_query->have_posts()) {
											while($req_query->have_posts()) {
												$req_query->the_post();
												echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
											}
										
										}

										echo '</ul></div></li>';
									
									}
									echo '</ul>';

								}
							}
							wp_reset_postdata();
						?>
					</aside>
				</div>

				<!--Product Photo-->
				<div class="medium-6 cell">
					<div class="content-box">
						<div class="product-slider">
							<div><img src="http://placehold.it/800/FF0000" data-open="slider-zoom"></div>
							<div><img src="http://placehold.it/800/00FF00" data-open="slider-zoom"></div>
							<div><img src="http://placehold.it/800/0F0F0F" data-open="slider-zoom"></div>
							<div><img src="http://placehold.it/800/231123" data-open="slider-zoom"></div>
							<div><img src="http://placehold.it/800/123321" data-open="slider-zoom"></div>
							<div><img src="http://placehold.it/800/456654" data-open="slider-zoom"></div>
							<div><img src="http://placehold.it/800/654456" data-open="slider-zoom"></div>
						</div><!-- .product-slider -->
						<div class="product-slider-control">
							<div><img src="http://placehold.it/200/FF0000"></div>
							<div><img src="http://placehold.it/200/00FF00"></div>
							<div><img src="http://placehold.it/200/0F0F0F"></div>
							<div><img src="http://placehold.it/200/231123"></div>
							<div><img src="http://placehold.it/200/123321"></div>
							<div><img src="http://placehold.it/200/456654"></div>
							<div><img src="http://placehold.it/200/654456"></div>
						</div><!-- .product-slider-control -->
					</div>
				</div>

			</div><!-- .grid-x -->
		</section><!-- .grid-container -->

		<!-- Description -->
		<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
			<div class="grid-x grid-padding-x content-box" style="padding-bottom: 2em;">
				<div class="cell">
					<h2>Description</h2>
					<?php the_field( 'product_description' ); ?>
				</div>
			</div><!-- .grid-x.content-box -->
		</section>

		<!-- Bullets -->
		<?php if ( have_rows( 'bullet_groups' ) ): ?>
			<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
				<div class="grid-x grid-padding-x content-box" style="padding-bottom: 1.5em;">
					<?php while ( have_rows( 'bullet_groups' ) ) : the_row(); ?>
						<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
							<div class="cell">
								<?php the_sub_field( 'single_column' ); ?>
							</div>
						<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
							<div class="medium-6 cell">
								<?php the_sub_field( 'column_1' ); ?>
							</div>
							<div class="medium-6 cell">
								<?php the_sub_field( 'column_2' ); ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>	
				</div><!-- .grid-x.content-box -->
			</section>
		<?php else: ?>
			<?php // no layouts found ?>
		<?php endif; ?>

		<!-- Test Results -->
		<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
			<div class="grid-x grid-padding-x content-box">
				<div class="cell">
			<div class="resources-accordion">
				<div class="accordion-header">
					<h3>Test Results</h3>
				</div>
				<ul class="accordion" data-accordion data-allow-all-closed="true">
					<li class="accordion-item" data-accordion-item>
						<!--Main menu option-->
						<a href="#" class="accordion-title">Menu Item 1</a>
						<!--Accordion Tab Content-->
						<div class="accordion-content" data-tab-content>
							<ul class="menu vertical">
								<li><a href="#">Item 1</a></li>
								<li>Item 2</li>
								<li>Item 3</li>
								<li>Item 4</li>
								<li>Item 5</li>
							</ul>
						</div>
					</li>
					<li class="accordion-item" data-accordion-item>
						<!--Main menu option-->
						<a href="#" class="accordion-title">Menu Item 1</a>
						<!--Accordion Tab Content-->
						<div class="accordion-content" data-tab-content>
							<ul class="menu vertical">
								<li>Item 1</li>
								<li>Item 2</li>
								<li>Item 3</li>
								<li>Item 4</li>
								<li>Item 5</li>
							</ul>
						</div>
					</li>
					<li class="accordion-item" data-accordion-item>
						<!--Main menu option-->
						<a href="#" class="accordion-title">Menu Item 1</a>
						<!--Accordion Tab Content-->
						<div class="accordion-content" data-tab-content>
							<ul class="menu vertical">
								<li>Item 1</li>
								<li>Item 2</li>
								<li>Item 3</li>
								<li>Item 4</li>
								<li>Item 5</li>
							</ul>
						</div>
					</li>
					<li class="accordion-item" data-accordion-item>
						<!--Main menu option-->
						<a href="#" class="accordion-title">Menu Item 1</a>
						<!--Accordion Tab Content-->
						<div class="accordion-content" data-tab-content>
							<ul class="menu vertical">
								<li>Item 1</li>
								<li>Item 2</li>
								<li>Item 3</li>
								<li>Item 4</li>
								<li>Item 5</li>
							</ul>
						</div>
					</li>
					<li class="accordion-item" data-accordion-item>
						<!--Main menu option-->
						<a href="#" class="accordion-title">Menu Item 1</a>
						<!--Accordion Tab Content-->
						<div class="accordion-content" data-tab-content>
							<ul class="menu vertical">
								<li>Item 1</li>
								<li>Item 2</li>
								<li>Item 3</li>
								<li>Item 4</li>
								<li>Item 5</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			</div>
			</div>
		</section>

		<!-- Related Products -->
		<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
			<div class="grid-x grid-margin-x product-carousel">
				<div class="medium-4 large-3 cell">
					<div class="card card-product-hover">
					  <img src="https://zurb.com/blog/system/images/690/original/blue_bw_web.jpg?1354921642" alt="sweet foundation shirt" />
					  <img src="https://2.bp.blogspot.com/-luqexZwkPcY/VPamfRCxrmI/AAAAAAAAO8s/R6YaU81Zleo/s1600/foundationzurb-theme-DownloadNewThemes.jpg" alt="picture of admin dashboard" />
					  <div class="card-product-hover-icons">
					    <a href="#"><i class="fa fa-shopping-cart"></i></a>
					    <a href="#"><i class="fa fa-star-o"></i></a>
					    <a href="#"><i class="fa fa-share-alt"></i></a>
					  </div>
					  <div class="card-product-hover-details">
					    <h3 class="card-product-hover-title">Legacy Foundation Tee</h3>
					    <span class="card-product-hover-price">$15.00</span>
					  </div>
					</div>
				</div>
				<div class="medium-4 large-3 cell">
					<div class="card card-product-hover">
					  <img src="https://zurb.com/blog/system/images/690/original/blue_bw_web.jpg?1354921642" alt="sweet foundation shirt" />
					  <img src="https://2.bp.blogspot.com/-luqexZwkPcY/VPamfRCxrmI/AAAAAAAAO8s/R6YaU81Zleo/s1600/foundationzurb-theme-DownloadNewThemes.jpg" alt="picture of admin dashboard" />
					  <div class="card-product-hover-icons">
					    <a href="#"><i class="fa fa-shopping-cart"></i></a>
					    <a href="#"><i class="fa fa-star-o"></i></a>
					    <a href="#"><i class="fa fa-share-alt"></i></a>
					  </div>
					  <div class="card-product-hover-details">
					    <h3 class="card-product-hover-title">Legacy Foundation Tee</h3>
					    <span class="card-product-hover-price">$15.00</span>
					  </div>
					</div>
				</div>
				<div class="medium-4 large-3 cell">
					<div class="card card-product-hover">
					  <img src="https://zurb.com/blog/system/images/690/original/blue_bw_web.jpg?1354921642" alt="sweet foundation shirt" />
					  <img src="https://2.bp.blogspot.com/-luqexZwkPcY/VPamfRCxrmI/AAAAAAAAO8s/R6YaU81Zleo/s1600/foundationzurb-theme-DownloadNewThemes.jpg" alt="picture of admin dashboard" />
					  <div class="card-product-hover-icons">
					    <a href="#"><i class="fa fa-shopping-cart"></i></a>
					    <a href="#"><i class="fa fa-star-o"></i></a>
					    <a href="#"><i class="fa fa-share-alt"></i></a>
					  </div>
					  <div class="card-product-hover-details">
					    <h3 class="card-product-hover-title">Legacy Foundation Tee</h3>
					    <span class="card-product-hover-price">$15.00</span>
					  </div>
					</div>
				</div>
				<div class="medium-4 large-3 cell">
					<div class="card card-product-hover">
					  <img src="https://zurb.com/blog/system/images/690/original/blue_bw_web.jpg?1354921642" alt="sweet foundation shirt" />
					  <img src="https://2.bp.blogspot.com/-luqexZwkPcY/VPamfRCxrmI/AAAAAAAAO8s/R6YaU81Zleo/s1600/foundationzurb-theme-DownloadNewThemes.jpg" alt="picture of admin dashboard" />
					  <div class="card-product-hover-icons">
					    <a href="#"><i class="fa fa-shopping-cart"></i></a>
					    <a href="#"><i class="fa fa-star-o"></i></a>
					    <a href="#"><i class="fa fa-share-alt"></i></a>
					  </div>
					  <div class="card-product-hover-details">
					    <h3 class="card-product-hover-title">Legacy Foundation Tee</h3>
					    <span class="card-product-hover-price">$15.00</span>
					  </div>
					</div>
				</div>
				<div class="medium-4 large-3 cell">
					<div class="card card-product-hover">
					  <img src="https://zurb.com/blog/system/images/690/original/blue_bw_web.jpg?1354921642" alt="sweet foundation shirt" />
					  <img src="https://2.bp.blogspot.com/-luqexZwkPcY/VPamfRCxrmI/AAAAAAAAO8s/R6YaU81Zleo/s1600/foundationzurb-theme-DownloadNewThemes.jpg" alt="picture of admin dashboard" />
					  <div class="card-product-hover-icons">
					    <a href="#"><i class="fa fa-shopping-cart"></i></a>
					    <a href="#"><i class="fa fa-star-o"></i></a>
					    <a href="#"><i class="fa fa-share-alt"></i></a>
					  </div>
					  <div class="card-product-hover-details">
					    <h3 class="card-product-hover-title">Legacy Foundation Tee</h3>
					    <span class="card-product-hover-price">$15.00</span>
					  </div>
					</div>
				</div>
				<div class="medium-4 large-3 cell">
					<div class="card card-product-hover">
					  <img src="https://zurb.com/blog/system/images/690/original/blue_bw_web.jpg?1354921642" alt="sweet foundation shirt" />
					  <img src="https://2.bp.blogspot.com/-luqexZwkPcY/VPamfRCxrmI/AAAAAAAAO8s/R6YaU81Zleo/s1600/foundationzurb-theme-DownloadNewThemes.jpg" alt="picture of admin dashboard" />
					  <div class="card-product-hover-icons">
					    <a href="#"><i class="fa fa-shopping-cart"></i></a>
					    <a href="#"><i class="fa fa-star-o"></i></a>
					    <a href="#"><i class="fa fa-share-alt"></i></a>
					  </div>
					  <div class="card-product-hover-details">
					    <h3 class="card-product-hover-title">Legacy Foundation Tee</h3>
					    <span class="card-product-hover-price">$15.00</span>
					  </div>
					</div>
				</div>
				<div class="medium-4 large-3 cell">
					<div class="card card-product-hover">
					  <img src="https://zurb.com/blog/system/images/690/original/blue_bw_web.jpg?1354921642" alt="sweet foundation shirt" />
					  <img src="https://2.bp.blogspot.com/-luqexZwkPcY/VPamfRCxrmI/AAAAAAAAO8s/R6YaU81Zleo/s1600/foundationzurb-theme-DownloadNewThemes.jpg" alt="picture of admin dashboard" />
					  <div class="card-product-hover-icons">
					    <a href="#"><i class="fa fa-shopping-cart"></i></a>
					    <a href="#"><i class="fa fa-star-o"></i></a>
					    <a href="#"><i class="fa fa-share-alt"></i></a>
					  </div>
					  <div class="card-product-hover-details">
					    <h3 class="card-product-hover-title">Legacy Foundation Tee</h3>
					    <span class="card-product-hover-price">$15.00</span>
					  </div>
					</div>
				</div>
			</div>
		</section>
							

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php special_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

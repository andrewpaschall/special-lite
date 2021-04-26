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
	<?php the_content( sprintf(
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
		<header class="product-hero">
			<section class="grid-container">
				<div class="grid-x grid-padding-x align-center">
					<div class="medium-6 cell flex-container align-center flex-dir-column">
						<div class="content">
								<h1><?php echo get_the_title(); ?></h1>
								<?php if ( have_rows( 'sl_ca_buttons' ) ) : ?>
									<div class="button-group large" style="flex-wrap: wrap;">
										<?php while ( have_rows( 'sl_ca_buttons' ) ) : the_row(); ?>
											<?php if ( have_rows( 'button_options' ) ) : ?>
												<?php while ( have_rows( 'button_options' ) ) : the_row(); ?>
													<a class="button large <?php the_sub_field('button_type'); ?>" href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('text'); ?>" target="_blank"><?php the_sub_field('text'); ?></a>
												<?php endwhile;
											endif;
										endwhile;
									echo '</div>';
								endif; ?>
								<?php the_field('short_description'); ?>	
						</div>
					</div>
					<div class="medium-4 cell">
						<?php special_lite_post_thumbnail(); ?>
					</div>
				</div>
			</section>
		</header>


		<section class="grid-container product-content" style="margin-top: -5em; background: #fff; border: 1px solid #ccc; padding-top: 1em; margin-bottom: 1.5em;">
			<div class="grid-x grid-padding-x align-center">
					<!--Resource Links-->
					<?php if ( have_rows( 'associated_downloads' ) ) : ?>
						<aside class="medium-4 cell" data-sticky-container>
							<div class="doc-box sticky" data-sticky data-stick-to="top" data-anchor="product-description">
								<h4>Downloadable Resources</h4>
								
									<?php while ( have_rows( 'associated_downloads' ) ) : the_row(); ?>
										<a href="<?php the_sub_field( 'link' ); ?>" class="button" target="_blank" title="<?php the_sub_field('text'); ?>"><?php the_sub_field('text'); ?></a>
									<?php endwhile; 	
							echo '</div>';
						echo '</aside>';
					endif; ?>
					<!--Description-->
					<div class="<?php if ( have_rows( 'associated_downloads' ) ){
						echo 'medium-8';
					}else{
						echo 'medium-12';
					} ?> cell" style="padding-left: 2em;">
								<div id="product-description" class="content-box">
									<?php the_field('product_description'); ?>
								</div>
					</div>
			</div><!-- .grid-x -->
		

			<!-- Bullets -->
			<?php if ( have_rows( 'bullet_groups' ) ): ?>
				<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
					<?php while ( have_rows( 'bullet_groups' ) ) : the_row(); ?>
						<div class="grid-x grid-padding-x content-box">
							<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
								<div class="cell"><?php the_sub_field( 'single_column' ); ?></div>
							<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
								<div class="medium-6 cell"><?php the_sub_field( 'column_1' ); ?></div>
								<div class="medium-6 cell"><?php the_sub_field( 'column_2' ); ?></div>
							<?php endif; ?>
						</div>
					<?php endwhile;
				echo '</section>';
			endif; ?>

			<!-- Test Results -->
			<?php if ( has_term('', 'performance_rating')) : ?>
				<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
					<div class="grid-x grid-padding-x content-box">
						<div class="cell">
							<div class="resources-accordion">
								<div class="accordion-header">
									<h3>Test Results</h3>
								</div>
								<ul class="accordion" data-accordion data-allow-all-closed="true">
									<!-- Blast Content -->
									<?php if ( have_rows( 'blast_content' ) ): ?>
										<li class="accordion-item" data-accordion-item>
											<!--Main menu option-->
											<a href="#" class="accordion-title">Blast Resistance</a>
											<?php while ( have_rows( 'blast_content' ) ) : the_row(); ?>
											<!--Accordion Tab Content-->
												<div class="accordion-content" data-tab-content>
													<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
														<div class="grid-x">
															<div class="cell">
																<?php the_sub_field( 'single_column' ); ?>
															</div>
														</div>
													<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
														<div class="grid-x grid-padding-x">
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_1' ); ?>
															</div>
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_2' ); ?>
															</div>
														</div>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</li>
									<?php endif; ?>

									<!-- Bullet Content -->
									<?php if ( have_rows( 'bullet_content' ) ): ?>
										<li class="accordion-item" data-accordion-item>
											<!--Main menu option-->
											<a href="#" class="accordion-title">Bullet Resistance</a>
											<?php while ( have_rows( 'bullet_content' ) ) : the_row(); ?>
											<!--Accordion Tab Content-->
												<div class="accordion-content" data-tab-content>
													<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
														<div class="grid-x">
															<div class="cell">
																<?php the_sub_field( 'single_column' ); ?>
															</div>
														</div>
													<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
														<div class="grid-x grid-padding-x">
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_1' ); ?>
															</div>
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_2' ); ?>
															</div>
														</div>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</li>
									<?php endif; ?>

									<!-- Fire Content -->
									<?php if ( have_rows( 'fire_content' ) ): ?>
										<li class="accordion-item" data-accordion-item>
											<!--Main menu option-->
											<a href="#" class="accordion-title">Fire</a>
											<?php while ( have_rows( 'fire_content' ) ) : the_row(); ?>
											<!--Accordion Tab Content-->
												<div class="accordion-content" data-tab-content>
													<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
														<div class="grid-x">
															<div class="cell">
																<?php the_sub_field( 'single_column' ); ?>
															</div>
														</div>
													<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
														<div class="grid-x grid-padding-x">
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_1' ); ?>
															</div>
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_2' ); ?>
															</div>
														</div>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</li>
									<?php endif; ?>

									<!-- Hurricane Content -->
									<?php if ( have_rows( 'hurricane_content' ) ): ?>
										<li class="accordion-item" data-accordion-item>
											<!--Main menu option-->
											<a href="#" class="accordion-title">Hurricane and Windstorm</a>
											<?php while ( have_rows( 'hurricane_content' ) ) : the_row(); ?>
											<!--Accordion Tab Content-->
												<div class="accordion-content" data-tab-content>
													<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
														<div class="grid-x">
															<div class="cell">
																<?php the_sub_field( 'single_column' ); ?>
															</div>
														</div>
													<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
														<div class="grid-x grid-padding-x">
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_1' ); ?>
															</div>
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_2' ); ?>
															</div>
														</div>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</li>
									<?php endif; ?>

									<!-- HVHZ Content -->
									<?php if ( have_rows( 'hvhz_content' ) ): ?>
										<li class="accordion-item" data-accordion-item>
											<!--Main menu option-->
											<a href="#" class="accordion-title">Menu Item 1</a>
											<?php while ( have_rows( 'hvhz_content' ) ) : the_row(); ?>
											<!--Accordion Tab Content-->
												<div class="accordion-content" data-tab-content>
													<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
														<div class="grid-x">
															<div class="cell">
																<?php the_sub_field( 'single_column' ); ?>
															</div>
														</div>
													<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
														<div class="grid-x grid-padding-x">
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_1' ); ?>
															</div>
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_2' ); ?>
															</div>
														</div>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</li>
									<?php endif; ?>

									<!-- Impact Content -->
									<?php if ( have_rows( 'impact_content' ) ): ?>
										<li class="accordion-item" data-accordion-item>
											<!--Main menu option-->
											<a href="#" class="accordion-title">Intrusion Resistance</a>
											<?php while ( have_rows( 'impact_content' ) ) : the_row(); ?>
											<!--Accordion Tab Content-->
												<div class="accordion-content" data-tab-content>
													<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
														<div class="grid-x">
															<div class="cell">
																<?php the_sub_field( 'single_column' ); ?>
															</div>
														</div>
													<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
														<div class="grid-x grid-padding-x">
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_1' ); ?>
															</div>
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_2' ); ?>
															</div>
														</div>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</li>
									<?php endif; ?>

									<!-- Thermal Content -->
									<?php if ( have_rows( 'thermal_content' ) ): ?>
										<li class="accordion-item" data-accordion-item>
											<!--Main menu option-->
											<a href="#" class="accordion-title">Thermal Performance and Sustainability</a>
											<?php while ( have_rows( 'thermal_content' ) ) : the_row(); ?>
											<!--Accordion Tab Content-->
												<div class="accordion-content" data-tab-content>
													<?php if ( get_row_layout() == 'single_column_layout' ) : ?>
														<div class="grid-x">
															<div class="cell">
																<?php the_sub_field( 'single_column' ); ?>
															</div>
														</div>
													<?php elseif ( get_row_layout() == 'two_column_layout' ) : ?>
														<div class="grid-x grid-padding-x">
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_1' ); ?>
															</div>
															<div class="medium-6 cell">
																<?php the_sub_field( 'column_2' ); ?>
															</div>
														</div>
													<?php endif; ?>
												</div>
											<?php endwhile; ?>
										</li>
									<?php endif; ?>

								</ul>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<!-- Related Products -->
			<?php $associated_products = get_field( 'associated_products' ); ?>
				<?php if ( $associated_products ): ?>
					<section class="grid-container" style="margin-top: 1.5em; margin-bottom: 1.5em;">
						<div class="grid-x">
							<div class="cell content-box">
							<h3>Related Products</h3>
							</div>
						</div>
						<div class="grid-x grid-margin-x product-carousel">
							<?php foreach ( $associated_products as $post ):  ?>
								<?php setup_postdata ( $post ); ?>
								<div class="card card-product">
									<a href="<?php the_permalink(); ?>">
										<header class="entry-header">
											<?php the_post_thumbnail('product-gallery size');
												echo '<ul class="icons">';
													if (has_term('blast-resistance', 'performance_rating')){
														echo '<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330"><defs><style>.cls-1{fill:gray;}.cls-2{fill:#fff;}.cls-3{fill:none;}</style></defs><title>Blast Resistance</title><path class="cls-1" d="M165,1A164,164,0,1,0,329,165,164,164,0,0,0,165,1Zm91,157.5c-5.44,10.44-20.07,17.17-34.32,13.33-9.71-2.62-13.43-.07-16.38,8.76-3.14,9.4-7.79,18.3-11.87,27.37-.22.5-1.3.61-4.31,1.9.94-7.65,1.73-14.14,2.79-22.81-9.85,11.66-7.3,28.58-23.26,35.08-1.81-17.12-3.49-33-5.17-48.82l-2.27.17c-1.94,15.65-3.87,31.3-6.11,49.35-16.66-11.58-13.21-31.35-22.56-44.65.54,11.29,1.07,22.5,1.61,33.71l27.83,23,26.79-22.25c.72,9.72,1.32,17.75,2,27.19l50.62-9.58-27.29,28.93H109.81L82.52,230.25l51.19,9.65V212.32l-3.83.31c-5.84-14.14-11.69-28.28-17.73-42.91-4.09.69-7.53,1.29-11,1.85-13.27,2.11-27.09-3.31-32.6-12.78s-3.65-24.27,5.83-34.25c6.09-6.42,10.36-12.71,12.83-21.69,3.31-12,14-17.34,26.45-19.2a27.13,27.13,0,0,0,13.25-5.8c21.07-18.47,49.41-18.28,70.62.53a23.6,23.6,0,0,0,12.23,5.24c15.87,1.89,26.06,11,29.29,26.74.65,3.18,2.81,6.13,4.64,9,1.05,1.63,2.89,2.72,4.26,4.17C258,134.18,261.25,148.36,256,158.5Z"/><path class="cls-1" d="M127.14,256.82c-3-4.06-4.37-4.07-6.87-7.42l23.29,3.85c1-5.56,1.86-10.26,2.87-15.85l15.64,12.21,16.34-12.8c.7,6.63,1.22,11.52,1.77,16.72l23-4.24L197.59,258c1,1.07,3.69-.8,4.73.27,7.57-6.56,13.53-10.18,21.11-16.74-.37-.77-.74-1.55-1.1-2.32l-36,6.22c-.83-7.72-1.52-14.15-2.38-22.12l-22.06,18-22.63-18.68c-.4,9-.7,15.59-1,22.95l-36.33-6.3C109.16,247.43,113.2,255.8,127.14,256.82Z"/><path class="cls-2" d="M133.71,212.32l.42,0v-.4l-.41-.34Z"/><path class="cls-3" d="M85,201.1,81.38,205a5.89,5.89,0,0,1-8.25.37l-9.82-8.82a5.85,5.85,0,0,1-.44-8.3l4.38-4.7L64,176.19l-2.84,11.65L51,189.63l5.37,8.06-7,9.41,10.46.45,5.67,16.58L71,210.29,82.23,220,80.88,207.4l9.56-1.94S87.65,203.25,85,201.1Z"/></svg></li>';
													} if (has_term('bullet-resistance', 'performance_rating')){
														echo '<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330"><title>Bullet Resistance</title><path class="cls-1" d="M165,0A165,165,0,1,0,330,165,165,165,0,0,0,165,0Zm19.7,73.58a93.47,93.47,0,0,1,71.56,72.05H238.17a75.85,75.85,0,0,0-53.47-54ZM44.52,171.22V158.78h95.6v12.44ZM146,255.93a93.46,93.46,0,0,1-72-71.56H92A75.83,75.83,0,0,0,146,237.84ZM146,91.5a75.84,75.84,0,0,0-54.12,54.13H73.74A93.49,93.49,0,0,1,146,73.41Zm25.6,191.68H159.11V189.55h12.44Zm0-142.73H159.11V46.82h12.44ZM184.7,255.77v-18.1a75.83,75.83,0,0,0,53.3-53.3h18.09A93.45,93.45,0,0,1,184.7,255.77Zm4.53-84.55V158.78h96.25v12.44Z"/></svg></li>';
													} if (has_term('fire-resistance', 'performance_rating')){
														echo '<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330"><title>Fire</title><path class="cls-1" d="M165,1A164,164,0,1,0,329,165,164,164,0,0,0,165,1Zm3,276.59c2.68-2.08,48.39-30.09,41.67-59.14-3.61-15.59-25.18-53.46-32.11-59.15-2.15,37.26-36.1,36.22-47.27,61.47-14.3,32.44,12.23,56.12,12.23,56.12C91.78,274.61,63.23,227,91.63,183.52c19.48-29.84,74.15-60.38,61.61-115.5,47.72,33.34,94.09,71.59,104.85,115.16C264.07,207.4,248.94,272.06,168,277.59Z"/></svg></li>';
													} if (has_term('hurricane-hvhz', 'performance_rating')){
														echo '<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330"><title>Windstorm &amp; Hurricane HVHZ</title><polygon class="cls-2" points="182 271.29 168.74 271.29 168.74 259.15 163.47 259.15 163.47 287.37 168.74 287.37 168.74 275.04 182 275.04 182 287.37 187.26 287.37 187.26 259.15 182 259.15 182 271.29"/><polygon class="cls-2" points="124.82 271.29 111.57 271.29 111.57 259.15 106.3 259.15 106.3 287.37 111.57 287.37 111.57 275.04 124.82 275.04 124.82 287.37 130.09 287.37 130.09 259.15 124.82 259.15 124.82 271.29"/><path class="cls-2" d="M155.19,259.52a1.86,1.86,0,0,0-.61.82L148,277.55a15.44,15.44,0,0,0-.61,1.85q-.27,1-.51,2.1-.27-1.1-.57-2.1c-.2-.67-.42-1.29-.64-1.85L139,260.34a2.05,2.05,0,0,0-.65-.86,1.75,1.75,0,0,0-1.11-.33H133l11.39,28.22h4.74l11.4-28.22h-4.23A1.78,1.78,0,0,0,155.19,259.52Z"/><path class="cls-2" d="M192.1,263.33h14.09l-14.52,20.54a3.36,3.36,0,0,0-.35.68,2.12,2.12,0,0,0-.14.75v2.07h21.47v-4.2H198l14.48-20.45a2.82,2.82,0,0,0,.51-1.64v-1.93H192.1Z"/><path class="cls-1" d="M165,1A164,164,0,1,0,329,165,164,164,0,0,0,165,1ZM130.09,287.37h-5.27V275H111.57v12.33H106.3V259.15h5.27v12.14h13.25V259.15h5.27Zm19.06,0h-4.74L133,259.15h4.21a1.75,1.75,0,0,1,1.11.33,2.05,2.05,0,0,1,.65.86l6.65,17.21c.22.56.44,1.18.64,1.85s.39,1.37.57,2.1q.24-1.1.51-2.1a15.44,15.44,0,0,1,.61-1.85l6.61-17.21a1.86,1.86,0,0,1,.61-.82,1.78,1.78,0,0,1,1.13-.37h4.23Zm38.11,0H182V275H168.74v12.33h-5.27V259.15h5.27v12.14H182V259.15h5.27ZM213,261.08a2.82,2.82,0,0,1-.51,1.64L198,283.17h14.66v4.2H191.18V285.3a2.12,2.12,0,0,1,.14-.75,3.36,3.36,0,0,1,.35-.68l14.52-20.54H192.1v-4.18H213Zm-4-159c22.48,22.76,23.15,59.08,6,84.14-18.43,26.93-46.46,40.84-57.31,44.71-47.15,16.82-89.53,7.64-89.53,7.64a152.73,152.73,0,0,0,33.48-10.41c19-8.59,24.27-25,13.27-37.37-15.4-17.26-26.54-46.88-4.76-80.9,21.91-34.23,54.7-46.5,73.71-51.55S231,52.5,255.79,55.68c-21.39,5.42-39.28,11.16-48.47,23.45A17.3,17.3,0,0,0,209,102.08Z"/><path class="cls-1" d="M163.32,166.52a18.89,18.89,0,1,1,18-19.78A18.89,18.89,0,0,1,163.32,166.52Z"/><path class="cls-1" d="M161.49,128.78a18.89,18.89,0,1,0,19.78,18A18.89,18.89,0,0,0,161.49,128.78Z"/></svg></li>';
													} if (has_term('impact-resistance', 'performance_rating')){
														echo '<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330"><title>Intrusion Resistance</title><path class="cls-1" d="M165,0A165,165,0,1,0,330,165,165,165,0,0,0,165,0Zm2.38,69a35.55,35.55,0,0,1,52.91,47.5L210.5,127,181,158.63l-24,25.74a6.57,6.57,0,0,1-9.27.49l-43.13-38.71a6.56,6.56,0,0,1-.5-9.28l26.75-28.65,29.52-31.65ZM128.8,76.14a21.62,21.62,0,0,1,22-5.24L124.05,99.59A21.63,21.63,0,0,1,128.8,76.14Zm45.37,187.07-49.42-42.33-23.92,60.67L76,208.87l-45.83-2,30.77-41.25L37.32,130.3l44.52-7.86L94.29,71.37l14.21,32.05L89.27,124a25.74,25.74,0,0,0,2,36.4l43.05,38.64a25.75,25.75,0,0,0,36.18-1.62l15.72-16.85c11.75,9.42,24,19.1,24,19.1l-41.91,8.51ZM259.41,238l-71.62-72,29.53-31.65,72.67,73A21.62,21.62,0,1,1,259.41,238Z"/></svg></li>';
													} if (has_term('hurricane-resistance', 'performance_rating')){
														echo '<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330"><title>Windstorm &amp; Hurricane</title><path class="cls-1" d="M159.43,145a20.33,20.33,0,1,0,20.33,20.33A20.33,20.33,0,0,0,159.43,145Z"/><path class="cls-1" d="M165,0A165,165,0,1,0,330,165,165,165,0,0,0,165,0Zm46.87,118.75c23,25.64,21.8,64.71,2.07,90.76-21.22,28-52.08,41.48-63.94,45.07-51.57,15.62-96.64,3.54-96.64,3.54a163.67,163.67,0,0,0,36.53-9.44c20.92-8.24,27.4-25.62,16.21-39.47C90.45,189.85,80,157.43,105.21,122c25.34-35.65,61.22-47.13,81.92-51.56s51-3.83,77.48.89C241.34,76,221.81,81.26,211.28,94A18.62,18.62,0,0,0,211.87,118.75Z"/></svg></li>';
													} if (has_term('thermal-performance-and-sustainability', 'performance_rating')){
														echo '<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 330 330"><title>Thermal Performance &amp;amp; Sustainability</title><path class="cls-1" d="M165,1A164,164,0,1,0,329,165,164,164,0,0,0,165,1Zm51.14,201.55c-9,32.62-34.71,39.55-35.75,41.88-6.5,14.55-12.55,45.76-23,47.68-4.16.77-10.36-.07-10.36-.07,7.86-6.63,22.46-53.21,22.46-53.21C192,182,158.57,105.11,158.57,105.11c22.7,98.62-.8,136-.8,136-23.17-3.83-35.44-18.67-35.44-18.67-24.49-41.64-8.62-62.18,2.17-100.67s7.36-84.23,7.36-84.23c46.36,34.41,43.36,33.42,59.87,57.87C208.33,120,225.14,169.92,216.14,202.55Z"/></svg></li>';
													}
												echo '</ul>'; ?>
										</header>
										<footer class="entry-footer details">
											<h3 class="title"><?php the_title(); ?></h3>
										</footer>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</section>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

			</section><!-- .grid-container -->
		
		<!-- Photo Gallery -->
		<?php $product_images_images = get_field( 'product_images' ); ?>
		<?php if ( $product_images_images ) :  ?>
			<section class="product-photo-gallery">
				<?php foreach ( $product_images_images as $product_images_image ): ?>
						<img src="<?php echo $product_images_image['sizes']['product-gallery size']; ?>" alt="<?php echo $product_images_image['alt']; ?>" />
				<?php endforeach; ?>
			</section>
		<?php endif; ?>
							

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php special_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

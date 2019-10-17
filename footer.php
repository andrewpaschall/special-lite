<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Special-Lite
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="grid-x grid-padding-x" <?php if( get_theme_mod( 'footer_columns' ) == 1 ){ echo 'style="justify-content: center;"'; } ?>>
			<?php if( get_theme_mod( 'footer_columns' ) == 4 ) : ?>
				<div class="medium-6 large-3 cell">
					<nav>
						<h4 id="navLabel1"><?php echo get_theme_mod( 'column_1_label', '' ); ?></h4>
						<small>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'Footer Menu 1',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
						</small>
					</nav>
				</div>
				<div class="medium-6 large-3 cell">
					<nav>
						<h4 id="navLabel2"><?php echo get_theme_mod( 'column_2_label', '' ); ?></h4>
						<small>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-3',
									'menu_id'        => 'Footer Menu 2',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
						</small>
					</nav>
				</div>
				<div class="medium-6 large-3 cell">
					<nav>
						<h4 id="navLabel3"><?php echo get_theme_mod( 'column_3_label', '' ); ?></h4>
						<small>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-4',
									'menu_id'        => 'Footer Menu 3',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
						</small>
					</nav>
				</div>
				<div class="medium-6 large-3 cell">
					<nav>
						<h4 id="navLabel4"><?php echo get_theme_mod( 'column_4_label', '' ); ?></h4>
						<small>
							<?php if( get_theme_mod( 'enable_signup', 'show' ) == 'show' ) : ?>
								<form>
									<label>Sign Up for Our Newsletter!<br>
										<div class="input-group">
											<input class="input-group-field" type="email">
											<span class="input-group-button">
												<input type="button" class="button tiny success" value="SIGN UP">
											</span>
										</div>
									</label>
								</form>
							<?php endif ?>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-5',
									'menu_id'        => 'Footer Menu 4',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
							<?php if( get_theme_mod( 'enable_social', 'show' ) == 'show' ){
								wp_nav_menu( array(
									'theme_location' => 'menu-9',
									'menu_id'        => 'Social Networks',
									'menu_class' => 'menu horizontal social-links',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							} ?>
						</small>
					</nav>
				</div>
			<?php elseif( get_theme_mod( 'footer_columns' ) == 3 ) : ?>
				<div class="medium-4 cell">
					<nav>
						<h4 id="navLabel1"><?php echo get_theme_mod( 'column_1_label', '' ); ?></h4>
						<small>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'Footer Menu 1',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
						</small>
					</nav>
				</div>
				<div class="medium-4 cell">
					<nav>
						<h4 id="navLabel2"><?php echo get_theme_mod( 'column_2_label', '' ); ?></h4>
						<small>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-3',
									'menu_id'        => 'Footer Menu 2',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
						</small>
					</nav>
				</div>
				<div class="medium-4 cell">
					<nav>
						<h4 id="navLabel3"><?php echo get_theme_mod( 'column_3_label', '' ); ?></h4>
						<small>
							<?php if( get_theme_mod( 'enable_signup', 'show' ) == 'show' ) : ?>
								<form>
									<label>Sign Up for Our Newsletter!<br>
										<div class="input-group">
											<input class="input-group-field" type="email">
											<span class="input-group-button">
												<input type="button" class="button tiny success" value="SIGN UP">
											</span>
										</div>
									</label>
								</form>
							<?php endif ?>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-4',
									'menu_id'        => 'Footer Menu 3',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
							<?php if( get_theme_mod( 'enable_social', 'show' ) == 'show' ){
								wp_nav_menu( array(
									'theme_location' => 'menu-9',
									'menu_id'        => 'Social Networks',
									'menu_class' => 'menu horizontal social-links',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							} ?>
						</small>
					</nav>
				</div>
			<?php elseif( get_theme_mod( 'footer_columns' ) == 2 ) : ?>
				<div class="medium-6 cell">
					<nav>
						<h4 id="navLabel1"><?php echo get_theme_mod( 'column_1_label', '' ); ?></h4>
						<small>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'Footer Menu 1',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
						</small>
					</nav>
				</div>
				<div class="medium-6 cell">
					<nav>
						<h4 id="navLabel2"><?php echo get_theme_mod( 'column_2_label', '' ); ?></h4>
						<small>
							<?php if( get_theme_mod( 'enable_signup', 'show' ) == 'show' ) : ?>
								<form>
									<label>Sign Up for Our Newsletter!<br>
										<div class="input-group">
											<input class="input-group-field" type="email">
											<span class="input-group-button">
												<input type="button" class="button tiny success" value="SIGN UP">
											</span>
										</div>
									</label>
								</form>
							<?php endif ?>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-3',
									'menu_id'        => 'Footer Menu 2',
									'menu_class' => 'menu vertical',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							?>
							<?php if( get_theme_mod( 'enable_social', 'show' ) == 'show' ){
								wp_nav_menu( array(
									'theme_location' => 'menu-9',
									'menu_id'        => 'Social Networks',
									'menu_class' => 'menu horizontal social-links',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
							} ?>
						</small>
					</nav>
				</div>
				<?php elseif( get_theme_mod( 'footer_columns' ) == 1 ) : ?>
					<?php if( get_theme_mod( 'enable_signup', 'show' ) == 'show' ) : ?>
						<form class="medium-9 cell flex-container flex-dir-column align-middle align-self-middle" style="text-align: center;">
							<label style="width: 100%;"><h3>Sign Up for Our Newsletter!</h3><br>
								<div class="input-group">
									<input class="input-group-field" type="email">
									<span class="input-group-button">
										<input type="button" class="button tiny success" value="SIGN UP">
									</span>
								</div>
							</label>
						</form>
					<?php endif ?>
					<?php if( get_theme_mod( 'enable_social', 'show' ) == 'show' ){
						echo '<div class="cell flex-container align-center">';
								wp_nav_menu( array(
									'theme_location' => 'menu-9',
									'menu_id'        => 'Social Networks',
									'menu_class' => 'menu horizontal social-links',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								) );
						echo '</div>';
					} ?>
			<?php endif ?>
			<div class="cell legalese" style="display: flex; justify-content: center;">
				<nav>
					<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-8',
								'menu_id'        => 'legalese',
								'menu_class' => 'menu horizontal',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							) );
						?>
				</nav>
				<p>&copy<?php echo date("Y")?> Special-Lite</p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

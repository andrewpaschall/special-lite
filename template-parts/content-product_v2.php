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
		<!--Andrew Code-->
		<section class="grid-container" style="margin-top: 20px; margin-bottom: 20px;">
			<div class="grid-x grid-padding-x">
				<div class="medium-6 cell">
					<h1><?php echo get_the_title(); ?></h1>
					<aside class="resources-accordion">
						<div class="accordion-header">
							<h3>Resources</h3>
						</div>
						<?php
							$associated_downloads = get_field('associated_downloads');
							$custom_terms = get_terms('download_category');
							foreach($custom_terms as $custom_term) {
							    wp_reset_query();
							    $args = array(
							    	'post_type' => 'downloads',
							        'tax_query' => array(
							            array(
							                'taxonomy' => 'download_category',
							                'field' => 'slug',
							                'terms' => $custom_term->slug,
							            ),
							        ),
							        'meta_query' => array(array(
										'key' => 'associated_downloads',
										//'value' => '"'.get_the_ID().'"',
										//'compare' => 'LIKE'
									))
							     );

							    //Testing Output
							    
							    //print_r($loop);

							     $loop = new WP_Query($args);
							     echo '<ul class="accordion" data-accordion data-allow-all-closed="true">';
							     //echo var_dump($loop);
								     if($loop->have_posts() and $custom_term->parent) {
								     	echo '<li class="accordion-item" data-accordion-item>'.'<a href="#" class="accordion-title">'.$custom_term->name.'</a>'.'<div class="accordion-content" data-tab-content>'.'<ul class="menu vertical">';
								        while($loop->have_posts()) : $loop->the_post();
								        				echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
								        endwhile;
								        echo '</ul>'.'</div>'.'</li>';
								     }

								 echo '</ul>';
								 wp_reset_postdata();
							}
						?>
					</aside>
				</div>
							

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php special_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

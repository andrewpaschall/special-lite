<?php
/**
 * Block Name: Timeline
 *
 * This is the template that displays the block for a background image and centered text and c2a.
 */ ?>

<?php if ( have_rows( 'timeline' ) ) : ?>
    <div class="grid-x align-center">
        <div class="grid-container">
            <div class="cell">
                <div class="timeline">
                    <?php while ( have_rows( 'timeline' ) ) : the_row(); ?>
                        <?php if ( have_rows( 'timeline_entry' ) ) : ?>
                            <?php while ( have_rows( 'timeline_entry' ) ) : the_row(); ?>
                                <div class="timeline-item">
                                    <?php $image = get_sub_field( 'image' ); ?>
                                    <?php if ( $image ) { ?>
                                        <div class="timeline-icon">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        </div>
                                    <?php } ?>
                                    <div class="timeline-content">
                                        <h3 class="timeline-content-date"><?php the_sub_field( 'year' ); ?></h3>
                                        <p><?php the_sub_field( 'description' ); ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
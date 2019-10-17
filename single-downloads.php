<?php
/**
 * The template for displaying all single downloads
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Special-Lite
 * 
 */

 get_header();

$file = get_field('file');
$file_url = $file['url'];


echo '<div class="grid-container" style="margin-top: 2em; margin-bottom: 2em;">';
the_title('<h1 class="text-center">', '</h1>'); ?>

<div class="grid-x downloads">
    <div class="cell flex-container align-middle flex-dir-column">
    <p class="text-center" style="text-transform: uppercase;"> File Type:
    <?php 
        if ($file['subtype'] == 'vnd.openxmlformats-officedocument.wordprocessingml.document') {
            echo 'docx';
        } else {
            echo $file['subtype'];
        }
    ?>
    </p>
        <a class="<?php 
        if ($file['subtype'] == 'vnd.openxmlformats-officedocument.wordprocessingml.document') {
            echo 'docx';
        } else {
            echo $file['subtype'];
        }
        ?> button large" href="<?php echo $file['url']; ?>" target="_blank" style="color: #fefefe; margin-top: 1em; margin-bottom: 1em;">Download Now
        </a>

        <embed src="<?php echo $file_url; ?>" width="100%" height="600px"/>
    </div>
</div>

<?php
echo '</div>';
get_footer();
?>


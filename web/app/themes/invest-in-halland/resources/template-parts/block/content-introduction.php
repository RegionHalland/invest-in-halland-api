<?php
/**
 * Block Name: Introduction
 */

// create id attribute for specific styling
$id = 'introduction-' . $block['id'];
?>

<p id="<?php echo $id; ?>" class="introduction">
    <?php the_field('introduction') ?>
</p>

<style>
.introduction {
	font-size: 1.375rem !important;
}
</style>
<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// get image field (array)

// create id attribute for specific styling
$id = 'fact-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
//$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<div class="fact">
    <h2>Fakta</h2>
    <p id="<?php echo $id; ?>" class="fact">
        <?php echo get_field('fact')->post_title ?>
    </p>
</div>

<!-- <style>
    .fact {
        background:black;
        color:white;
    }
</style> -->
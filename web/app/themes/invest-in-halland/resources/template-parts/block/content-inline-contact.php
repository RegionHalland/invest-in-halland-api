<?php
/**
 * Block Name: Contact
 */

$contact = get_field('contact_relationship');
// Get contacts acf-fields
$contact_id = $contact[0]->ID;
$contact_email = get_field('email', $contact_id);
$contact_phone = get_field('phone', $contact_id);
$contact_image = get_field('image', $contact_id);

// TODO:
// GraphQL queries prevents us from using a repeater here, but maybe in the future.
// Manually create an array of question and answers for now.
$amountOfLinks = 2;
$fields = [];
for ($i = 1; $i <= $amountOfLinks; $i++) {
	$fields[] = [
		'url' => get_field('contact_link_' . $i)['contact_link_' . $i . '_url'],
		'label' => get_field('contact_link_' . $i)['contact_link_' . $i . '_label'],
	];
}
?>

<div id="<?php echo $id; ?>" class="contact">
	<h2 class="contact-color-white"> <?php echo the_field('contact_title') ?></h2>
	<div class="contact-person">
		<div class="contact-person-image">
			<img src="<?php echo $contact_image['sizes']['thumbnail']; ?>">
		</div>
		<div class="contact-person-content">
			<h3 class="contact-color-white contact-heading"><?php echo $contact[0]->post_title; ?></h3>
			<h4 class="contact-color-white contact-heading"><?php echo $contact[0]->area_name; ?></h4>
			<a class="contact-color-white" href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
			<a class="contact-color-white" href="tel:<?php echo $contact_phone; ?>"><?php echo $contact_phone; ?></a>
		</div>
	</div>
	<?php foreach ($fields as $field) {
		echo '<div class="contact-link-container">';
		if ($field['url'] !== null) {
			echo '<a href' . $field['url'] .' class="contact-link">' . $field['label'] . '</a>';
		};
		echo '</div>';
	};
	?>
</div>

<style>
.contact-color-white {
	color: #fff !important;
	display: block;
}

.contact-heading {
	margin: 0;
}

.contact {
	padding: 1rem !important;
	background-color: #1B1B1B !important;
}

.contact-person {
	display: flex;
	border: 1px solid rgba(255,255,255,0.25);
	padding: 0.25rem;
	border-radius: 4px;
	margin-bottom: 1rem;
}

.contact-person-image {
	flex: 0 0 128px;
	margin-right: 1rem;
}

.contact-link-container {
	display: block;
	margin-bottom: 1rem;
}

.contact-link-container:last-child {
	margin-bottom: 0 !important;
}

.contact-link {
	display: block;
	line-height: 1;
	font-weight: bold;
	font-size: 0.875rem;
	color: #fff;
}
</style>
<?php
/**
 * Block Name: Summary
 */

// create id attribute for specific styling

// TODO:
// GraphQL queries prevents us from using a repeater here, but maybe in the future.
// Manually create an array of question and answers for now.
$amountOfQuestions = 4;
$fields = [];
$title = get_field('summary_title');
$id = 'summary-' . $block['id'];

for ($i = 1; $i <= $amountOfQuestions; $i++) {
	$fields[] = [
		'question' => get_field('summary_question_' . $i),
		'answer' => get_field('summary_answer_' . $i)
	];
}
?>

<div id="<?php echo $id; ?>" class="summary">
	<h2 class="summary-heading"><?php echo $title; ?></h2>
	<?php foreach ($fields as $field) {
		echo '<div class="summary-container">';
		if ($field['question'] !== null) {
			echo '<span class="summary-title">' . $field['question'] . '</span>';
		};

		if ($field['answer'] !== null) {
			echo '<span class="summary-answer">' . $field['answer'] . '</span>';
		};
		echo '</div>';
	};
	?>
	</div>
</div>

<style>
.summary {
	padding: 1rem !important;
	background-color: #1B1B1B !important;
}

.summary-container {
	display: block;
	margin-bottom: 1rem;
}

.summary-container:last-child {
	margin-bottom: 0 !important;
}

.summary-title {
	display: block;
	line-height: 1;
	font-weight: bold;
	font-size: 0.875rem;
	color: gray;
}

.summary-heading {
	margin: 0;
	margin-bottom: 1rem;
	line-height: 1.125;
	color: #fff;
}

.summary-answer {
	display: block;
	line-height: 1.25;
	color: rgba(255,255,255,0.85);
}
</style>
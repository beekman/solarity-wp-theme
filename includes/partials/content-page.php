<?php

	global $post;

	$name = $post->post_name;

	# Add special partial template names here:
	$special = array(
		'by-type',
	);
?>

<?php if ((is_single() || is_page()) && in_array($name, $special)): ?>

	<?php get_template_part('includes/partials/content', $name); ?>

<?php else: ?>

	<?php get_template_part('includes/partials/content-header'); ?>

	<?php get_template_part('includes/partials/content'); ?>

<?php endif; ?>

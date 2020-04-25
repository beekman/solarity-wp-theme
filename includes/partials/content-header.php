<header>
	<h1>
		<?php if (is_front_page() && is_home()): ?>
			<?php //don't print the title on the blog page?>

		<?php elseif (is_front_page()): ?>
			<?php //the_title(); ?>

		<?php elseif (is_home()): ?>
			<?php # Blog page: ?>
		<?php elseif (is_category()): ?>
			<?php single_cat_title();?>
		<?php elseif (is_tag()): ?>
			<?php single_tag_title(); ?>
		<?php elseif (is_author()) : ?>
			<?php global $post;
			$author_id = $post->post_author; ?>
			<span><?php _e('Posts By', 'solarity'); ?></span>
			<?php the_author_meta('display_name', $author_id); ?>
		<?php elseif (is_day()): ?>
			<span><?php _e('Daily Archives:', 'solarity'); ?></span>
			<?php the_date( (get_option( 'date_format') ), 'solarity' ); ?>
		<?php elseif (is_month()): ?>
			<span><?php _e('Monthly Archives:', 'solarity'); ?></span>
			<?php the_time('F Y'); ?>
		<?php elseif (is_year()): ?>
			<span><?php _e('Yearly Archives:', 'solarity'); ?></span>
			<?php the_time('Y'); ?>

		<?php elseif (is_single() || is_page()): ?>
			<?php # Single posts or pages: ?>
			<?php the_title(); ?>
		<?php endif; ?>
	</h1>


	<?php if (is_single() || is_page()): ?>
		<?php if (has_deck()): //if there's a pipe separator in the title of a page or post, add an h2 title beneath ?>
			<div id="subhead" class="deck">
				<h2>
					<?php echo get_deck(); ?>
				</h2>
			</div>
		<?php endif; ?>
	<?php elseif (is_category()):
		$term = get_queried_object();
		$cat_sub = get_field ( 'cat-subhead', $term);
		$cat_blurb = get_field ( 'cat-blurb', $term);
		if ($cat_sub) {
			echo '<h2 class="category-subhead">' . $cat_sub . '</h2>';
		}
		if ($cat_blurb) {
			echo '<p class="category-blurb">' . $cat_blurb . '</p>';
		}
	endif; ?>
</header>

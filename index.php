<?php get_header(); ?>


<div id="content" class="fix wrap">
	<?php breadcrumbs_and_social_buttons(); ?>

	<div id="sidebar" class="sidebar m-all t-1of3 d-2of7 first-col" role="complementary">
		<?php if (is_category()): ?>
			<?php echo '<p class="category-description">' . category_description() . '</p>'; ?>
		<?php endif; ?>
		<div>
			<?php get_sidebar(); ?>
		</div>

	</div> <!-- /#sidebar -->

	<div id="mainbar" class="m-all t-2of3 d-5of7 last-col">

		<?php get_template_part('includes/partials/content', 'header'); ?>

		<?php //chronological posts for climate category only (the rest are newest first)
			$args_order='';
			if (is_category('climate-change-sustainability')):
				$args_order= 'ASC'; //newest at the bottom

				//for the climate change section, reverse the sort order
				$args = array (
					'cat' 		=> '14',
					'orderby'	=> 'date', //sorted by date
					'order'		=> $args_order
				);

				global $wp_query;
					// The Query
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ):
					while ( $the_query->have_posts() ) :
						$the_query->the_post(); ?>

						<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<?php get_template_part('includes/partials/content', 'index'); ?>
						</article>

					<?php endwhile; ?>

				<?/* Restore original Post Data */
				wp_reset_postdata(); ?>
				<?php else: ?>

					<?php get_template_part('includes/partials/content', 'none'); ?>

				<?php endif; //end $the_query ?>
			<?php	elseif (have_posts() ):
				//otherwise, use the normal loop
				 while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<?php get_template_part('includes/partials/content', 'index'); ?>
					</article>

				<?php endwhile; ?>

			<?php else: ?>

				<?php get_template_part('includes/partials/content', 'none'); ?>

			<?php endif; ?>

			</div> <!-- /#mainbar -->

	<?php get_footer(); ?>

</div>


<?php //content 'loop' for pages that don't have a custom content-slug.php file in /includes/partials ?>
	<?php if (is_page() ) :  //if it's a page, not a post ?>
		<?php if (has_post_thumbnail() ): //if there's a featured image, put it in a column on the left ?>
			<div class="d-2of5 t-1of2 m-all clearfix aligncenter margin-top">
				<?php the_post_thumbnail('landscape-med', array('class' => 'aligncenter')); ?>
			</div>
			<div class="clearfix"></div>
		<?php endif; ?>
	<?php endif; ?>

	<?php the_content(); ?>

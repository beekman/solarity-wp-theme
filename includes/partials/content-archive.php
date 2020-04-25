<?php # The content loop for tag pages, category pages and other archives. ?>

<section class="entry-content cf">
	<div class="group linkcontainer">
		<div class="d-3of7 t-1of3 m-all">
			<a
				href="<?php the_permalink(); ?>"
				rel="bookmark"
				title="<?php the_title_attribute(); ?>"
			>
				<?php the_post_thumbnail( 'large' ); ?>
			</a>
		</div>
		<div class="d-4of7 t-2of3 m-all last-col">

			<h3 class="entry-title">
				<a
					href="<?php the_permalink(); ?>"
					rel="bookmark"
					title="<?php the_title_attribute(); ?>"
				>
						<?php the_title(); ?>
				</a>
			</h3>

			<?php the_excerpt(); ?>

		</div>
	</div>
</section>

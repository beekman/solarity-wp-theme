<?php if (is_singular( 'gallery' ) ): ?>
	<div class="group featured-block"> <!-- Show the featured image before content -->
		<?php if ( has_post_thumbnail() ) { //show the featured image with caption above the videos/gallery
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
			the_post_thumbnail( 'landscape-medium' );
			echo '</a>';
		} ?>
		<p class="gallery-caption"><?php the_post_thumbnail_caption(); ?></p>
	</div>
<?php endif; ?>

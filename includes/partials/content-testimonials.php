<?php
/*
| Testimonial article loop
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
	<section class="entry-content">
		<?php the_content(); ?>
	</section>
	<?php
	/*
	<footer class="article-footer testimonial_attribution"> <!-- The testimonial title serves as the testimonial attribution -->
		<?php the_title(); ?>
	</footer>
	*/
	?>
</article>

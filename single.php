<?php get_header(); ?>
<?php global $more; ?>

<div class="wrap main-content">
	<?php breadcrumbs_and_social_buttons(); ?>

	<?php if (have_posts()): ?>
		<?php while (have_posts()): ?>


			<?php get_template_part('includes/partials/content', 'header'); ?>
			<main>

				<div id="mainbar" class="m-all t-2of3 d-2of3 first-col">

					<?php the_post(); ?>

					<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<?php if (has_post_format('gallery') ): ?>
							<section id="installation-map">

								<?php #map appears in main column before content when visible ?>

								<?php if( have_rows('locations') ): ?>
									<div class="acf-map">
										<?php while ( have_rows('locations') ) : the_row();

										$location = get_sub_field('location');
										echo $location['address']; ?>

										<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
											<h4><?php the_sub_field('title'); ?></h4>
											<p class="address"><?php echo $location['address']; ?></p>
											<p><?php the_sub_field('description'); ?></p></div>

										<?php endwhile; //end map locations ?>

									</div>
								<?php endif; //end locations ?>

							</section>
						<?php endif; //end post format gallery ?>

						<section>

							<?php get_template_part('includes/partials/content', 'single'); ?>

							<?php if (has_post_format('gallery')): ?>
								<?php if ( has_post_thumbnail() ) { //show the featured image with caption above the videos/gallery ?>
									<div class="group featured-block"> <!-- Show the featured image before content -->
										<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
										echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
										the_post_thumbnail( 'medium' );
										echo '</a>';
										?>
										<p class="gallery-caption"><?php the_featured_image_caption(); ?></p>
									</div>
								<?php }

								$more=0; //display only the part before the more tag ?>

							<?php endif; //end post format gallery
							the_content('');
							?>
						</section>
					</article>
				</div>

				<div id="sidebar" class="sidebar m-all t-1of3 d-1of3 last-col" role="complementary">
					<?php if (has_post_format('gallery') ): ?>
						<section id="gallery-intro">
							<php $subhead = the_field('sidebar-subhead'); ?>
							<?php if ( subhead ) : ?>
								<h2><?php the_field('sidebar-subhead');?></h2>
							<?php endif; ?>
							<php $blurb = the_field('sidebar-blurb'); ?>
							<?php if ( blurb ) : ?>
								<h3>OVERVIEW</h3>
								<p><?php the_field('sidebar-blurb');?></p>
							<?php endif; ?>
						</section>

					<?php # Installation Locations
					if( have_rows('locations') ): ?>
					<div class="locations">
						<?php //print a list of locations of the installations
						$rows = get_field('locations');
						$row_count = count($rows);
						echo '<h3>' . pluralize($row_count, 'Installation Location', 'Installation Locations');
						echo ' <a href="#installation-map" class="map-link">' . '>>View on Map' . '</a></h3>';

						while (have_rows('locations')): the_row(); ?>
						<ul><strong><?php echo the_sub_field('title'); ?></strong><?php
							?>, <?php echo the_sub_field('description'); ?></ul> <?php
							endwhile;
							?>
						</div> <?php #.locations ?>
					<?php endif; ?>
					<div class="gallery-description">
						<?php
						$content = get_extended(get_the_content() );
							$content = after_more($content); //we only want the part after the more tag of the content (the rest is output above)
							$content = apply_filters('the_content', $content); //apply the standard Wordpress content filter to the output
							$content = str_replace(']]>', ']]>', $content); //see above
							echo $content;
							?>
						</div>
					<?php endif; ?>

					<?php get_sidebar(); ?>
				</div> <!-- /#sidebar -->
			<?php endwhile; ?>

		<?php else: ?>

			<?php get_template_part('includes/partials/content', 'none'); ?>

		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>

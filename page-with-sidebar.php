<?php //Template Name: Page with Sidebars ?>

<?php get_header(); ?>

<div class="wrap">
	<?php if ( ! is_page( array('type', 'location') ) ) : //no breadcrumbs for Type or Location pages
		breadcrumbs_and_social_buttons();
	endif; ?>

	<?php if (have_posts()): ?>

		<?php while (have_posts()): ?>

			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<section id="content" itemprop="articleBody">

				<div id="sidebar" class="sidebar m-all t-1of3 d-2of7" role="complementary">

							<?php get_sidebar('sidebar1'); ?>

						</div> <!-- /#sidebar -->

						<div id="mainbar" class="m-all t-2of3 d-5of7 last-col">

							<?php get_template_part('includes/partials/content', 'page'); ?>

						</div> <!-- /#mainbar -->


				</section> <!-- /#content -->

			</article>

		<?php endwhile; ?>

	<?php else: ?>

		<?php get_template_part('includes/partials/content', 'none'); ?>


	<?php endif; ?>

</div>

<?php get_footer(); ?>

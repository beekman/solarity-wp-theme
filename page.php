<?php
/** Standard page template without sidebar
*/

get_header();
?>

<div class="wrap">
	<?php //no breadcrumbs or social toolbar for pages with no sidebar
	//breadcrumbs_and_social_buttons();
	?>
	<?php if (have_posts()) :

	while (have_posts()):

	the_post();
?>

<article id="post-<?php echo the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<section id="content" itemprop="articleBody">

		<?php get_template_part('includes/partials/content', 'page'); ?>

	</section> <!-- /#content -->

</article>
<?php
endwhile;

else:

get_template_part('includes/partials/content', 'none');

endif;

?>

</div>

<?php echo get_footer();
?>

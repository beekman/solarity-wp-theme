<?php
/** Front page template
*/
?>

<?php get_header( 'front-page' ); ?>

	<?php if (have_posts()) :

	while (have_posts()):

	the_post();
?>

    <article id="post-<?php echo the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

    	<section id="content" itemprop="articleBody">

    		<?php get_template_part('includes/partials/content', 'front'); ?>

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

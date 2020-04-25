<article id="post-<?php the_ID(); ?>" <?php post_class('gallery'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
	</header> <?php // end article header ?>

	<section class="entry-content cf" itemprop="articleBody">
		<?php echo $content_arr['main']; //Display the part of the content before the more tag  ?>
	</section> <?php // end article section ?>

	<footer class="article-footer">
		<?php #the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'solarity' ) . '</span> ', ', ', '</p>' ); ?>

	</footer> <?php // end article footer ?>

	<?php comments_template(); ?>

</article> <?php // end article ?>

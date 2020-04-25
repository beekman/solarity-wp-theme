<?php # The content loop for the 404 page. ?>
<article id="post-not-found" class="hentry clearfix">

	<header class="article-header">

		<h1 class="page-title"><?php _e( 'Sorry, Page not Found', 'solarity' ); ?></h1>

	</header>

	<section class="entry-content">

		<p><?php _e( 'The page you were looking for was not found at that address and returned a 404 error. Try using the navigation or the search bar below to find what you seek.', 'solarity' ); ?></p>

	</section>

	<section class="search">

		<p><?php get_search_form(); ?></p>

	</section>

	<footer class="article-footer">

		<p><?php _e( 'This is the content-404.php template.', 'solarity' ); ?></p>

	</footer>

</article>

<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

	<div id="inner-footer" class="wrap cf">

		<nav role="navigation" class="nav">
			<?php wp_nav_menu(
			array(
'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
'menu' => __('Footer Links', 'solarity'),       // nav name
'menu_class' => 'nav footer-nav cf',            // adding custom nav class
'theme_location' => 'footer-links',             // where it's located in the theme
'before' => '',                                 // before the menu
'after' => '',                                  // after the menu
'link_before' => '',                            // before each link
'link_after' => '',                             // after each link
'depth' => 0,                                   // limit the depth of the nav
'fallback_cb' => 'solarity_footer_links_fallback'  // fallback function
)
			);
			?>
		</nav>

		<div class="source-org copyright">&copy;&nbsp;<?php echo date('Y'); ?>&nbsp;Peter Erskine,&nbsp;all rights reserved. &#8226;&nbsp;<a href="/contact">Email Peter Erskine</a>&nbsp;&#8226; <span class="vcard"><span class="tel">(310)663-4442</span></span>&nbsp;&#8226; English only, please</p>
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</div>
	</footer>

</body>

</html> <!-- end of site. thanks for flying! -->

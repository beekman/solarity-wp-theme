<?php
/*This code tests conditions for 2 separate widget areas:
•
'id'            => 'main_sidebar',, 'name'          => __( 'Main Sidebar', 'solarity' ),
                                            The home page and any other non-blog, non-product pages
'id'            => 'blog_sidebar', 'name'          => __( 'Blog Sidebar', 'solarity' )
                                    The standard blog sidebar.
___________________________________________________________________________________________________*/
?>
<?php
if(is_home() || is_archive() || is_tag() || is_tax() || is_category() || (is_page() ) ) :
	if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar')) :
		dynamic_sidebar('Blog Sidebar');
	endif; //end Blog Sidebar
elseif (is_singular('post') ) :
    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('single') ) :
    	dynamic_sidebar('single');

    else:
    endif;
endif; //end single sidebar
?>

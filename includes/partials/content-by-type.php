<article>
<?php
$terms = apply_filters( 'taxonomy-images-get-terms', '' );
if ( ! empty( $terms ) ) {
    print '<ul>';
    foreach ( (array) $terms as $term ) {
    print '<li><a href="' . esc_url( get_term_link( $term, $term->taxonomy ) ) . '">' . wp_get_attachment_image( $term->image_id, 'detail' ) . '</a></li>';
    }
    print '</ul>';
}
?>
</article>

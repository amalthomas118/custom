<?php
/**
 * The template part for displaying Image content
 *
 * @package the-fashion-woocommerce
 * @subpackage the-fashion-woocommerce
 * @since the-fashion-woocommerce 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title();?></span></a></h1>
        <div class="entry-attachment">
            <div class="attachment">
                <?php the_fashion_woocommerce_the_attached_image(); ?>
            </div>
            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'the-fashion-woocommerce' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'the-fashion-woocommerce' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'the-fashion-woocommerce' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'the-fashion-woocommerce' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'the-fashion-woocommerce' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'the-fashion-woocommerce' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'the-fashion-woocommerce' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
</article>
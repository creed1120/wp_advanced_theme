<?php
/**
 * Template for Post Entry Content
 * 
 * @package wpadvancedtheme
 * 
 * ( this file is within the WP Loop )
 */
?>

<div class="entry-content post-loop">
    <?php if ( is_single() ) : ?>

        <?php 
            the_content(
                sprintf(
                    wp_kses(
                        __( 'Continue Reading %s <span>&rarr;</span>', 'wpadvancedtheme' ),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                )
            ); 
        ?>

    <?php wp_link_pages(
        [
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpadvancedtheme' ),
            'after'  => '</div>',
        ]
    ) ?>

    <?php else : ?>

        <?php 
            wpat_the_excerpt( 150 );
            echo '<div>'. wpat_excerpt_read_more() .'</div>';
        ?>

    <?php endif; ?>

</div>
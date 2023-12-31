<?php
/**
 * Main Template File.
 * 
 * @package wpadvancedtheme
 * 
 */

get_header();
 ?>

<div id="primary">
    <div id="main" class="site-main mt-5 mb-5" role="main">

        <div class="container">

        <!-- <//?php get_template_part( 'template-parts/content-test' ); ?> -->

            <?php if ( have_posts() ) : ?>

                    <?php if ( is_home() && ! is_front_page() ) : ?>
                        <header class="mb-5">
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    <div class="row">
                        <?php 
                            // the WP Loop
                            while ( have_posts() ) : the_post(); ?>

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <?php get_template_part( 'template-parts/content' ); ?>
                                </div>

                        <?php endwhile; ?>
                    </div>
                    <?php else : ?>
                        <?php get_template_part( 'template-parts/content-none' ); ?>
            <?php endif; ?>

            <?php wpat_pagination(); ?>

        </div>
        
    </div>
</div>

<?php get_footer(); ?>
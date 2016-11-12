<?php
/**
 * Template Name: One Column
 *
 * This is a template for displaying page content in one column without a sidebar.
 * @package WordPress
 * @subpackage basetheme
 * @since basetheme 1.0
 */

get_header(); ?>
    <div id="primary" class="content-area container">
        <div class="row">
            <main id="main" class="site-main col-sm-10 col-sm-offset-1" role="main">

                <?php

                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'page' );

                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile;

                the_posts_navigation();
                ?>

            </main><!-- #main -->
        </div><!-- .row -->
    </div><!-- #primary -->
<?php
get_footer();
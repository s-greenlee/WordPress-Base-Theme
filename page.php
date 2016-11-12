<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Base_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area container">
        <div class="row">
            <main id="main" class="site-main col-sm-8 col-md-9" role="main">

                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
            <div class="col-sm-4 col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div><!-- .row -->
        
	</div><!-- #primary -->

<?php
get_footer();

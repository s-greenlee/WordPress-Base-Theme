<?php
/**
 * Template Name: Sidebar Left
 *
 * This is a page template for displaying page content with the side bar on the left.
 * @package WordPress
 * @subpackage basetheme
 * @since basetheme 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area container">
		<div class="row">
            <div class="col-sm-4 col-md-3">
                <?php get_sidebar(); ?>
            </div>
            <main id="main" class="site-main col-sm-8 col-md-9" role="main">

                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', get_post_format() );

                    the_post_navigation();

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        
        </div><!-- .row -->
	</div><!-- #primary -->

<?php
get_footer();

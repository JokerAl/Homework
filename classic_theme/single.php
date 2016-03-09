<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Classic_theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <?php get_template_part( 'template-parts/category','page' );?>
        <main id="main" class="site-main" role="main">
            <div class="container-fluid">
                <?php
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content', get_post_format());?>

                   <?php if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();

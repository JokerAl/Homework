<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Classic_theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <?php get_template_part( 'template-parts/category','page' );?>
        <main id="main" class="site-main" role="main">
            <div class="container-fluid">
                <div class="posts clearfix">
                    <?php
                    if (have_posts()) :

                        if (is_home() && !is_front_page()) : ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>

                            <?php
                        endif;

                        /* Start the Loop */
                        while (have_posts()) : the_post(); ?>
                            <div class="short-description">
                                <h2>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <span class="date">Posted on <?php echo Get_the_date('d M, y'); ?></span>
                                <div class=" screen-notebook">
                                    <div class="thumbnail-wrapper">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                </div>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more"><?php echo __('Read more'); ?></a>

                            </div>



                            <?php

                        endwhile;?>

                        <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
                    <?php else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();

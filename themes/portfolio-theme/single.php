<?php 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

?>

<div class="wrapper">
    <div class="header">
        <?php get_header(); ?>

    </div>

    <div class="post-title">
        <h2><?php the_title() ?></h2>
    </div>

    <div class="portfolio-item">

        <div class="img"><?php the_post_thumbnail(); ?>
        </div>

    </div>

</div>

<?php get_footer(); ?>
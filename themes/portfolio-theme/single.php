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

    <div class="post-image"><?php the_post_thumbnail(); ?>
    </div>

    <div class="post-title">
        <h2><?php the_title() ?></h2>
    </div>

    <?php

    $posttags = get_the_tags();
    if (has_tag()) {
        foreach ($posttags as $tag) {
            echo '<p>' . $tag->name . '</p>';
        }
    }

    ?>

</div>

<?php get_footer(); ?>
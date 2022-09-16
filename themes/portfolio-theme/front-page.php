<!-- wrapper for sit -->
<div class="wrapper">

    <!-- define header -->
    <div class="header">
        <?php get_header(); ?>
    </div>

    <!-- about me section (need to make this public for editting) -->
    <div class="about-header">
        <p> C# & C++ programmer graduating from Games Technology at <br> the University of the West of England (UWE)
            with a first class degree.</p>
    </div>

    <!-- loop through all of the categories available -->
    <?php

    // get all of the categories
    $terms = get_terms([
        'taxonomy' => 'category',
        'hide_empty' => false,
        'orderby' => 'description',
        'order' => 'DESC',
    ]);

    // loop through each of these
    foreach ($terms as $term) :
    ?>

        <div class="section-header">
            <h2> <?= $term->name ?> </h2>
            <p> <?= $term->description ?> </p>
        </div>

        <?php
        // here we do a query to get the posts related to this category
        $loop = new WP_Query(
            array(
                'posts_per_page' => '50',
                'post_type' => 'portfolio',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $term->slug,
                    )
                )
            )
        );
        ?>

        <div class="project-container">
            <?php
            if (have_posts()) : while ($loop->have_posts()) : $loop->the_post();

                    $title = str_ireplace('"', '', trim(get_the_title()));
                    $desc = get_post_custom_values('projShortDesc');


            ?>
                    <div class="portfolio-item">

                        <div class="img"><a href=""> <?php the_post_thumbnail() ?></a>
                        </div>
                        
                        <div class="portfolio-overlay"><a href=" <?php the_permalink() ?> ">
                                <div class="portfolio-content">
                                    <h4><strong> <?= $title ?> </strong></h4>
                                    <p> <?= $desc[0] ?> </p>
                                </div>
                            </a></div>

                        <div class="portfolio-tag-container">
                            <?php
                            $posttags = get_the_tags();
                            if (has_tag()) {
                                foreach ($posttags as $tag) {
                                    echo '<div class="portfolio-item-tag">';
                                    echo '<p>', $tag->name, '</p>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    <?php
    endforeach;
    ?>

</div>
<!-- end -->

<?php get_footer(); ?>
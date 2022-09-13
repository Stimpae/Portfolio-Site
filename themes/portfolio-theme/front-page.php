<div class="wrapper">
    <div class="header">
        <?php get_header(); ?>
    </div>
    <div class="about-header">
        <p> C# & C++ programmer graduating from Games Technology at <br> the University of the West of England (UWE)
            with a first class degree.</p>
    </div>

    <div class="section-header">
        <h2> University Projects </h2>
        <p> Here are a small selection of projects that I have completed during my degree, <br> 
        primarly throughout my second and third year, either as part of a group ranging from 4 - 40 or working independently. </p>
    </div>

    <div class="project-container">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
         $title= str_ireplace('"', '', trim(get_the_title()));
         $desc= str_ireplace('"', '', trim(get_the_content()));
         
     ?>
        <div class="portfolio-item">
 
            <div class="img"><a href="<?php $site[0] ?>"><?php the_post_thumbnail(); ?></a>
        
            

            </div>

            

            <div class="portfolio-title">
            </div>
            <?php $site= get_post_custom_values('projLink'); ?>
            <div class="portfolio-overlay"><a href="<?=$site[0]?>" target="_blank">
                    <div class="portfolio-content">
                        <h4><strong><?=$title?></strong>
                            <h4>
                                <?php $desc= get_post_custom_values('projShortDesc');?>
                                <p><?=$desc[0]?></p>
                    </div>
                </a></div>


        </div>

        <?php endwhile; endif; ?>

    </div>

    <div class="project-container"></div>

    <?php get_footer(); ?>


</div>
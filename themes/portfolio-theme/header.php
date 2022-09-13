<!DOCTYPE html>
<html>

<head>
    <?php  wp_head(); query_posts('post_type=portfolio&posts_per_page=9'); ?>
    <script src="https://kit.fontawesome.com/94daaa7835.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="name-header">
            <img src="http://samstamp.local/wp-content/uploads/2021/06/avatar-icon-images-4-e1622720319675.png"
                alt="Avatar of me">
            <h1> Sam Stamp </h1>
            <div class="social-container">
                <a href="https://github.com/Stimpae" target="_blank" class="github"><i class="fab fa-github"></i></a>
                <a href="https://linkedin.com/in/stampsam" target="_blank" class="linkedin"><i
                        class="fa fa-linkedin"></i></a>
                <a href="mailto:stampsam@outlook.com" target="_blank" class="email"><i class="fa fa-envelope"></i></a>
            </div>
        </div>

        <nav>
            <ul class="navigation">
                <?php wp_nav_menu( array('menu' => 'main-menu', 'container' => 'nav' )); ?>
            </ul>
        </nav>
    </header>
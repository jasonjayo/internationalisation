<?php
/*
    * Template Name: Custom Blog
*/
get_header();
?>

<body>
    <div id="top">
        <?php
        get_template_part("nav");
        ?>
        <header>
          <div class="blog__breadcrumb"><a href="/blog">Blog</a></div>
          <h1><?php the_archive_title() ?></h1>
          <div class="blog__header-description"><?php the_archive_description() ?></div>
        </header>
        <main class="container">
            <div class="row">
                <div class="col-md-8">


                <?php
        // Start the loop.
        while (have_posts()) : the_post();
 
            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part("blog-post-template", get_post_format());
 
 
            
 
        // End the loop.
        endwhile;

        ?>

                </div>
                <?php get_sidebar() ?>
            </div>
            
        </main>
    </div>
<?php get_footer(); ?>
</body>
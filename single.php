<?php
/*
    * Template Name: Custom Blog
*/
get_header();
?>
<style>
.blog-post-meta {
    font-size: 1.2rem;
    margin-top: 10px;
}
.blog-post-meta a {
    color: inherit;
    text-decoration: underline;
}
</style>
<body>
    <div id="top">
        <?php
        get_template_part("nav");
        ?>
        
        <?php
        // Start the loop.
        while (have_posts()) : the_post();
        ?>


        <header>            
            <div class="blog__breadcrumb"><a href="/blog">Blog</a></div>
            <h1><?php echo get_the_title() ?></h1>
            <div class="blog__header-description blog-post-meta">
                <strong><?php the_date("F j, Y"); ?></strong> by <?php echo the_author_posts_link() ?></a>
            </div>
        </header>
        
        <main class="container">
            <div class="row">
                <div class="col-md-8">

                    <article class="blog-post">        
                        <?php the_content(__('(more…)')); ?>
                    </article>

        <?php
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="post-title">Next Post: %title</span>',
                'prev_text' => '<span class="post-title">Previous Post: %title</span>',
            ) );
 
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
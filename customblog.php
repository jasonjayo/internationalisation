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
        <header>Blog</header>
        <main class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
                    
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post();
                    get_template_part("blog-post-template", get_post_format());
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php get_sidebar() ?>
            </div>
            
        </main>
    </div>
<?php get_footer(); ?>
</body>
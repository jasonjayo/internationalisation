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
        <header>            
            <div class="blog__breadcrumb"><a href="/blog">Blog</a></div>
            <h1><div class="blog__author-prefix">posts by</div> <?php the_author() ?></h1>
            <div class="blog__header-description"><?php echo get_the_author_meta("description") ?></div>
        </header>
        


        
        
        <main class="container">
            <div class="row">
              <div class="col-md-8">
              <?php $the_query = new WP_Query( array( 'author_name' => get_the_author() ) ); ?>
                  
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
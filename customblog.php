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
            <h1>Blog</h1>
            <div class="blog__header-description">Welcome to our Blog! Here you can find updates about our international projects.</div>
        </header>
        <main class="container">
            
            <div class="row">
                <div class="col-md-8">

                    <?php 
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $posts_per_page = 4;
                    $the_query = new WP_Query( array(
                        'posts_per_page' => $posts_per_page,
                        'paged' => $paged
                    ) );
                    
                    ?>
                    
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post();
                    get_template_part("blog-post-template", get_post_format());
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    
                    <?php 
                    if ($the_query->max_num_pages != 1):
                    ?>
                    <div class="pagination">
                        <?php 
                            echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $the_query->max_num_pages,
                                'current'      => max( 1, get_query_var( 'paged' ) ),
                                'format'       => '?paged=%#%',
                                'show_all'     => false,
                                'type'         => 'plain',
                                'end_size'     => 2,
                                'mid_size'     => 1,
                                'prev_next'    => true,
                                'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                                'next_text'    => sprintf( '%1$s <i></i>', __( 'More Posts', 'text-domain' ) ),
                                'add_args'     => false,
                                'add_fragment' => '',
                            ) );
                        ?>
                    </div>
                    <?php
                    endif;
                    ?>


                </div>
                <?php get_sidebar() ?>
            </div>

            <?php posts_nav_link() ?>
            

        </main>
    </div>
<?php get_footer(); ?>
</body>
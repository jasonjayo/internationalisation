<?php
/*
    * Template Name: Erasmus
*/
get_header();
?>
<body>
    <div id="top">
        <?php
        get_template_part("nav");
        ?>
        <header>
        Erasmus+
        </header>
        <main>
            <section class="standard-grid">
                <?php
                    if (have_posts()) : while (have_posts()) : the_post();
                        
                    get_template_part("portal-page-template", get_post_format());

                    endwhile; endif; 
                ?>
                <?php
                wp_nav_menu(array(
                    "menu"    => "ErasmusNav",
                    "walker"  => new ErasmusNav(),
                    "container" => "",
                    "items_wrap" => '%3$s'
                ));
                ?>
            </section>
        </main>
    </div>
    <?php
    get_footer();
    ?>
</body>
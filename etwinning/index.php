<?php
/*
    * Template Name: eTwinning Index
*/
get_header();
?>
<body>
    <div id="top">
        <?php
        get_template_part("nav");
        ?>
        <header> 
        eTwinning 
        </header> 
        <main>
            <section class="standard-grid">
                <div id="info">
                    <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                            
                        get_template_part("portal-page-template", get_post_format());

                        endwhile; endif; 
                    ?>
                </div>                
                    <a href="#" class="infoBox"> 
                    <div> 
                        <h2>Celebrating Education</h2> 
                        <div class="linkdesc">Celebrating Education through Creativity</div> 
                    </div> 
                    </a>
                    <a href="#" class="infoBox"> 
                    <div>
                        <h2>EU Projects</h2>
                    </div>
                    </a>
                    <a href="#" class="infoBox"> 
                    <div></div> 
                    </a>
                    <a href="#" class="infoBox"> 
                    <div></div>
                    </a>
            </section>
        </main>
    </div>
    <?php
    get_footer();
    ?>
</body>
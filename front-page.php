<?php get_header() ?>
<body>
    <main>
        <div id="title">
            <h1>
                <img src="<?php echo get_stylesheet_directory_uri() . "/crest.png"?>" alt="Carrick CS">
                Internationalisation @ Carrick CS
            </h1>
            <div id="desc">
            This site records all transnational collaboration undertaken by Carrick-on-Shannon Community School, County Leitrim, Ireland.
            </div>
            <nav>
                <?php get_template_part("nav-items"); ?>
            </nav>
        </div>
        <div id="erasmus-background"></div>
    </main>
    <?php get_footer(); ?>
</body>
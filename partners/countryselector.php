<?php
/*
    * Template Name: Partner Country Selector
*/
get_header();
function flag($country) {
    echo get_stylesheet_directory_uri() . "/flags/" . $country . ".png";
}
$partners = [
    "belgium", "denmark", "finland", "germany", "ireland", "italy", "portugal", "romania", "slovenia", "the_netherlands", "united_kingdom"
];
?>
<body>
    <div id="top">
        <?php
        get_template_part("nav");
        ?>
        <header> 
        Partners 
        </header> 
        <main>
            <section class="standard-grid">
                <?php foreach ($partners as $partner): ?>
                    <a href='#'>
                        <div class='country-name'><?php echo ucwords(str_replace("_", " ", $partner)); ?></div>
                        <img src='<?php flag($partner); ?>'>
                    </a>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
    <?php
    get_footer();
    ?>
    </body>
</html>
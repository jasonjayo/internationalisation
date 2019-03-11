<aside class="col-md-4 px-5">
    <h2><?php _e("Categories"); ?></h2>
    <ul>
        <?php 
        wp_list_categories([
            "title_li" => ""
        ]);
        ?>
    </ul>
    <h2><?php _e("Archives"); ?></h2>
    <ul>
        <?php wp_get_archives(); ?>
    </ul>
</aside>
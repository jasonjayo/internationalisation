<?php
function assets() {
    wp_enqueue_script("appjs", get_stylesheet_directory_uri() . "/js/internationaisation.js");

    if (is_page(["blog"])) {
        wp_enqueue_style("bootstrap", get_stylesheet_directory_uri() . "/css/bootstrap.css");
    }

    // Single post page
    if (is_singular("post") || is_category() || is_archive()) {
        wp_enqueue_style("bootstrap", get_stylesheet_directory_uri() . "/css/bootstrap.css");
        wp_enqueue_style("standard-page", get_stylesheet_directory_uri() . "/css/standard-page.css");
        wp_enqueue_style("blog", get_stylesheet_directory_uri() . "/css/blog.css");
    }

    // wp_enqueue_style("global", get_stylesheet_uri());
    wp_enqueue_style("global", get_stylesheet_directory_uri() . "/css/style.css");

    if (is_front_page()) {
        wp_enqueue_style("index", get_stylesheet_directory_uri() . "/css/index.css");
    }
    if (is_page("partners/")) {
        wp_enqueue_style("partners-country-selector", get_stylesheet_directory_uri() . "/css/partners-country-selector.css");
    }
    
    if (is_page(["erasmus", "etwinning", "partners", "blog", "partnerslist", "single.php"])) {
        wp_enqueue_style("standard-page", get_stylesheet_directory_uri() . "/css/standard-page.css");
    }

    if (is_page(["blog"])) {
        wp_enqueue_style("blog", get_stylesheet_directory_uri() . "/css/blog.css");
    }
}

// Load scripts and styles
add_action("wp_enqueue_scripts", "assets");

// Hide admin bar
add_filter("show_admin_bar", "__return_false");

//Title on front page
add_filter("wp_title", "baw_hack_wp_title_for_home");
function baw_hack_wp_title_for_home($title) {
    if(empty($title) && ( is_home() || is_front_page() ) ) {
        return __("» ", "theme_domain") . get_bloginfo("title") . " | Home";
    }
    return $title;
}

function custom_rewrite_tag() {
    add_rewrite_tag('%c%', '([^&]+)');
  }
  add_action("init", "custom_rewrite_tag", 10, 0);


//   function custom_rewrite_rule() {
//     add_rewrite_rule('^partners/([^/]*)/?','partnerslist/?food=$1','top');
//   }
//   add_action('init', 'custom_rewrite_rule', 10, 0);


// function add_query_vars_filter( $vars ) {
//     $vars[] = "c";
//     return $vars;
//   }
// add_filter("query_vars", "add_query_vars_filter");

function register_my_menus() {
    register_nav_menu("header-menu", __("Header Navigation"));
    register_nav_menu("partners-country-menu", __("Partners Country Selector"));
}
add_action("init", "register_my_menus");


class ErasmusNav extends Walker_Nav_Menu {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    );

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= sprintf(
        "<a href='%s' class='infoBox'>
            <div>
                <h2>%s</h2>
                <div class='linkdesc'>%s</div>
            </div>
        </a>", $item->url, $item->title, $item->description);
    }

}

class PartnersCountrySelector extends Walker_Nav_Menu {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    );

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function flag($country) {
        echo get_stylesheet_directory_uri() . "/flags/" . $country . ".png";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= sprintf(
        "<a href='%s'>
            <div class='country-name'>" . ucwords(str_replace("_", " ", '%s')) . "
            <img src='" . flag($partner) . "'>
        </a>", $country->url, $country->name, $country->description);
    }

}
?>
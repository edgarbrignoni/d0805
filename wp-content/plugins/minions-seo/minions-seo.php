<?php
/**
 * Plugin Name: Minions SEO
 * Version: 5.1
 * Plugin URI: https://d0805-edgarbrignoni.c9users.io/
 * Description: Sets up a custom wordpress search plugin
 * Author: Team Minions
 * Author URI: https://d0805-edgarbrignoni.c9users.io/
 * Text Domain: minions-seo
 * Domain Path: /languages/
 * License: GPL v3
 */

//this template has to have one file inside that has the same name as the folder
//with a .php extension
//an add_action vs add_filter returns
 
add_action( 'pre_get_posts', 'searchOverride' );
 
// function searchOverride($query) {
//         print_r($query);
//         die();
// }

function searchOverride($query) {
    if (is_search()) {
        echo "This is your query:" . $query->query['s']; die();
        $q = new WP_Query([
            'catergorie'])
        print_r($query);
        die();
    }
}
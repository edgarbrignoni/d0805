<?php


class WPRoles {
    
    function __construct() {
        add_action( 'switch_theme', [$this, 'add_theme_caps']);
    }
}
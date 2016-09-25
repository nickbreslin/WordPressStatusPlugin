<?php
/*
Plugin Name:  WordPress Status
Plugin URI:   https://github.com/nickbreslin/WordPressStatusPlugin
Description:  ...
Version:      1.0.0
Author:       Nick Breslin
Author URI:   http://www.nickbreslin.com
License:      MIT License
*/

// Prevent direct access
defined( 'ABSPATH' ) or die();

class WordPressStatus {


	public function __construct() {
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    public function admin_menu() {
        add_management_page(
            'WordPress Status', // page_title
            'WordPress Status', // menu_title
            'manage_options',   // capability
            'wordpress_status', // menu_slug
            array( $this, 'admin_page' ) // function
        );
    }

    public function admin_page() {

    	$data = [];

    	Timber::render('admin_page.twig', $data);
    }
}

$wordPressStatus = new WordPressStatus();
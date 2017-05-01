<?php
/*
Plugin Name: SmartPhoto
Plugin URI: https://github.com/appleple/wp-smartphoto
Description: The most easy to use responsive image viwer especially for mobile devices
Author: appleple
Version: 0.1.0
License: GPL2
Author URI: https://appleple.github.io/
*/

function add_assets() {
	wp_enqueue_script('smartphoto-js','https://unpkg.com/smartphoto@latest/js/smartphoto.min.js');
	wp_enqueue_style('smartphoto-css','https://unpkg.com/smartphoto@latest/css/smartphoto.min.css');
}

add_action('wp_enqueue_scripts', 'add_assets');

include_once('lib/admin.php');

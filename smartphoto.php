<?php
/*
Plugin Name: SmartPhoto
Plugin URI: https://github.com/appleple/wp-smartphoto
Description: The most easy to use responsive image viwer especially for mobile devices
Author: appleple
Version: 0.1.0
License: MIT
Author URI: https://appleple.github.io/
*/

function add_assets() {
	wp_register_script('SmartPhoto', 'https://unpkg.com/smartphoto@latest/js/smartphoto.min.js');
	wp_register_style('SmartPhoto', 'https://unpkg.com/smartphoto@latest/css/smartphoto.min.css');
	wp_enqueue_script('SmartPhoto');
	wp_enqueue_style('SmartPhoto');
}

include_once('lib/admin.php');

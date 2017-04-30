<?php
/*
Plugin Name: SmartPhoto
Plugin URI: http://www.example.com/plugin
Description: テキストを表示するだけのプラグイン
Author: appleple
Version: 0.1
License: MIT
Author URI: http://www.example.com
*/

function add_assets() {
	wp_register_script('SmartPhoto', 'https://unpkg.com/smartphoto@latest/js/smartphoto.min.js');
	wp_register_style('SmartPhoto', 'https://unpkg.com/smartphoto@latest/css/smartphoto.min.css');
	wp_enqueue_script();
	wp_enqueue_style();
}


include_once('lib/admin.php');

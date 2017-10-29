<?php
/**
Plugin Name: SmartPhoto
Plugin URI: https://github.com/appleple/wp-smartphoto
Description: The most easy to use responsive image viwer especially for mobile devices
Author: appleple
Version: 0.1.0
License: GPL2
Author URI: https://appleple.github.io/
*/

require 'lib/admin.php';
require 'lib/front.php';


new Smartphoto_Admin();
new Smartphoto_Front();
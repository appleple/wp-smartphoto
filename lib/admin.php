<?php

class smartphoto_options {
  public static function render() {

  }
}


add_action('admin_menu', array('smartphoto_options', 'render'));

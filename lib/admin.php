<?php

class smartphoto_options {
	function __construct() {
		add_action('admin_menu', array($this, 'render'));
	}
  function render() {
		?>
			<div>hoge</div>
		<?php
  }
}

new smartphoto_options

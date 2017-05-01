<?php

class smartphoto_front {
	function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'add_assets'));
		add_action('wp_footer', array($this, 'add_script'));
	}
	function add_assets() {
		wp_enqueue_script('smartphoto-js','https://unpkg.com/smartphoto@latest/js/smartphoto.min.js');
		wp_enqueue_style('smartphoto-css','https://unpkg.com/smartphoto@latest/css/smartphoto.min.css');
	}
	function add_script() {
		$options = get_option('smartphoto_options');
		?>
		<script>
			<?php if (!is_array($options)) { ?>

			<?php } else { ?>

			<?php } ?>
		</script>
		<?php
	}
}

new smartphoto_front;

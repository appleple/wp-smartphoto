<?php

class smartphoto_options {
	function __construct() {
		add_action('admin_menu', array($this, 'add_pages'));
	}
  function add_pages() {
		add_menu_page('SmartPhoto','SmartPhoto', 'level_8', __FILE__, array($this,'show_text_option_page'), '', 26);
  }
	function get_options() {
		$options = get_option('smartphoto_options');
		if (!is_array($options)) {
			$options['arrows'] = true;
			$options['nav'] = true;
			$options['animationSpeed'] = true;
			$options['swipeOffset'] = 100;
			$options['forceInterval'] = 10;
			$options['registance'] = 0.5;
			$options['resizeStyle'] = 'fill';
			$options['verticalGravity'] = false;
			$options['useOrientationApi'] = true;
			update_option('smartphoto_options', $options);
		}
		return $options;
	}
	function show_text_option_page() {
		$opt = $this->get_options();
		?>
			<h1>SmartPhoto</h1>
			<form method="post" action="" enctype="multipart/form-data">
				<table>
					<tr>
						<th>arrows</th>
						<td></td>
					<tr>
						<th>animationSpeed</th>
						<td><input type="number" name="smartphoto_options[animationSpeed]" value="<?php echo $opt['animationSpeed'] ?>"></td>
					</tr>
					<tr>
						<th>swipeOffset</th>
						<td><input type="number" name="smartphoto_options[swipeOffset]" value="<?php  echo $opt['swipeOffset'] ?>"></td>
					</tr>
					<tr>
						<th>forceInterval</th>
						<td><input type="number" name="smartphoto_options[forceInterval]" value="<?php echo $opt['forceInterval'] ?>"></td>
					</tr>
				</table>
				<input type="submit" name="Submit" value="Save" />
			</form>
		<?php
	}
}

$options = new smartphoto_options;

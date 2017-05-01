<?php

class smartphoto_admin {
	function __construct() {
		add_action('admin_menu', array($this, 'add_pages'));
	}
  function add_pages() {
		add_menu_page('SmartPhoto','SmartPhoto', 'level_8', __FILE__, array($this,'show_text_option_page'), '', 26);
  }
	function get_options() {
		$options = get_option('smartphoto_options');
		if (!is_array($options)) {
			$options['arrows'] = 'true';
			$options['nav'] = 'true';
			$options['animationSpeed'] = 300;
			$options['swipeOffset'] = 100;
			$options['forceInterval'] = 10;
			$options['registance'] = 0.5;
			$options['resizeStyle'] = 'fill';
			$options['verticalGravity'] = 'false';
			$options['useOrientationApi'] = 'true';
			update_option('smartphoto_options', $options);
		}
		return $options;
	}
	function show_text_option_page() {
		if (isset($_POST['smartphoto_options'])){
			$post = $_POST['smartphoto_options'];
			update_option('smartphoto_options', $post);
		}
		$opt = $this->get_options();
		?>
			<h1>SmartPhoto</h1>
			<form method="post" action="#" enctype="multipart/form-data">
				<table>
					<tr>
						<th>arrows</th>
						<td>
							<label><input type="radio" name="smartphoto_options[arrows]" value="true"<?php if($opt[arrows] === 'true') echo 'checked'?> />true</label>
							<label><input type="radio" name="smartphoto_options[arrows]" value="false"<?php if($opt[arrows] === 'false') echo 'checked'?> />false</label>
						</td>
					</tr>
					<tr>
						<th>nav</th>
						<td>
							<label><input type="radio" name="smartphoto_options[nav]" value="true"<?php if($opt[nav] === 'true') echo 'checked'?> />true</label>
							<label><input type="radio" name="smartphoto_options[nav]" value="false"<?php if($opt[nav] === 'false') echo 'checked'?> />false</label>
						</td>
					</tr>
					<tr>
						<th>resizeStyle</th>
						<td>
								<label><input type="radio" name="smartphoto_options[resizeStyle]" value="fill"<?php if($opt[resizeStyle] === 'fill') echo 'checked'?> />fill</label>
								<label><input type="radio" name="smartphoto_options[resizeStyle]" value="fit"<?php if($opt[resizeStyle] === 'fit') echo 'checked'?> />fit</label>
						</td>
					</tr>
					<tr>
						<th>useOrientationApi</th>
						<td>
								<label><input type="radio" name="smartphoto_options[useOrientationApi]" value="true"<?php if($opt[useOrientationApi] === 'true') echo 'checked'?> />true</label>
								<label><input type="radio" name="smartphoto_options[useOrientationApi]" value="false"<?php if($opt[useOrientationApi] === 'false') echo 'checked'?> />false</label>
						</td>
					</tr>
					<tr>
						<th>verticalGravity</th>
						<td>
								<label><input type="radio" name="smartphoto_options[verticalGravity]" value="true"<?php if($opt[verticalGravity] === 'true') echo 'checked'?> />true</label>
								<label><input type="radio" name="smartphoto_options[verticalGravity]" value="false"<?php if($opt[verticalGravity] === 'false') echo 'checked'?> />false</label>
						</td>
					</tr>
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
					<tr>
						<th>registance</th>
						<td><input type="text" name="smartphoto_options[registance]" value="<?php echo $opt['registance'] ?>"></td>
					</tr>
				</table>
				<input type="submit" name="Submit" value="Save" />
			</form>
		<?php
	}
}

new smartphoto_admin;

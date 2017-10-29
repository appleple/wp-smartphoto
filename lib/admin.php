<?php

class Smartphoto_Admin {
	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_pages' ) );
		add_action( 'plugins_loaded', array( $this, 'initialize_options' ) );
	}
	function add_pages() {
		add_theme_page( 'SmartPhoto', 'SmartPhoto', 'edit_theme_options', 'SmartPhoto', array( $this, 'show_page' ) );
	}
	function add_assets() {
		$custom_css = '#wpcontent {padding-left: 0;}.grid > * {box-sizing:border-box;}';
		wp_enqueue_style( 'uny-css', plugins_url( 'assets/uny.min.css', __FILE__ ) );
		wp_register_style( 'smartphoto-admin-style', false );
		wp_add_inline_style( 'smartphoto-admin-style', $custom_css );
		wp_enqueue_style( 'smartphoto-admin-style' );
	}

	public function initialize_options() {
		$options['arrows'] = true;
		$options['nav'] = true;
		$options['animationSpeed'] = 300;
		$options['swipeOffset'] = 100;
		$options['forceInterval'] = 10;
		$options['registance'] = 0.5;
		$options['resizeStyle'] = 'fill';
		$options['verticalGravity'] = false;
		$options['useOrientationApi'] = true;
		add_option( 'smartphoto_options', $options );
	}

	function get_options() {
		$options = get_option( 'smartphoto_options' );
		return $options;
	}
	function show_page() {
		add_action( 'admin_enqueue_scripts', array( $this, 'add_assets' ) );

		$this->add_assets();
		$post = filter_input( INPUT_POST, 'smartphoto_options' );
		if ( ! empty( $post ) && check_admin_referer( 'save_options','wp_smartphoto_nonce_field' ) ) {
			update_option( 'smartphoto_options', $post );
		}


		$opt = $this->get_options();
		?>
			<div class="hero is-center is-gradation">
				<h1 class="type-large" style="color:#FFF;">SmartPhoto</h1>
			</div>
			<form method="post" action="#" enctype="multipart/form-data" class="table">
				<?php wp_nonce_field( 'save_options','wp_smartphoto_nonce_field' ); ?>
				<div class="grid is-col-2">
				<div>
					<table>
						<tr>
							<th>arrows</th>
							<td>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[arrows]" value="true" <?php checked( $opt['arrows'], true ); ?> />
									<span>true</span>
								</label>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[arrows]" value="false" <?php checked( $opt['arrows'], false ); ?> />
									<span>false</span>
								</label>
							</td>
						</tr>
						<tr>
							<th>nav</th>
							<td>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[nav]" value="true" <?php checked( $opt['nav'], true ); ?>/>
									<span>true</span>
								</label>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[nav]" value="false" <?php checked( $opt['nav'], false ); ?>/>
									<span>false</span>
								</label>
							</td>
						</tr>
						<tr>
							<th>resizeStyle</th>
							<td>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[resizeStyle]" value="fill" <?php checked( $opt['resizeStyle'], 'fill' ); ?> />
									<span>fill</span></label>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[resizeStyle]" value="fit" <?php checked( $opt['resizeStyle'], 'fit' ); ?> />
									<span>fit</span>
								</label>
							</td>
						</tr>
						<tr>
							<th>useOrientationApi</th>
							<td>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[useOrientationApi]" value="true" <?php checked( $opt['useOrientationApi'], true ); ?>/>
									<span>true</span>
								</label>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[useOrientationApi]" value="false" <?php checked( $opt['useOrientationApi'], false ); ?>/>
									<span>false</span>
								</label>
							</td>
						</tr>
						<tr>
							<th>verticalGravity</th>
							<td>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[verticalGravity]" value="true" <?php checked( $opt['verticalGravity'], true ); ?>/>
									<span>true</span>
								</label>
								<label class="input is-radio">
									<input type="radio" name="smartphoto_options[verticalGravity]" value="false" <?php checked( $opt['verticalGravity'], false ); ?>/>
									<span>false</span>
								</label>
							</td>
						</tr>
					</table>
				</div>
				<div>
					<table>
						<tr>
							<th>animationSpeed</th>
							<td><input class="input" type="number" name="smartphoto_options[animationSpeed]" value="<?php echo esc_attr( $opt['animationSpeed'] ); ?>"></td>
						</tr>
						<tr>
							<th>swipeOffset</th>
							<td><input class="input" type="number" name="smartphoto_options[swipeOffset]" value="<?php echo esc_attr( $opt['swipeOffset'] ); ?>"></td>
						</tr>
						<tr>
							<th>forceInterval</th>
							<td><input class="input" type="number" name="smartphoto_options[forceInterval]" value="<?php echo esc_attr( $opt['forceInterval'] ); ?>"></td>
						</tr>
						<tr>
							<th>registance</th>
							<td><input class="input" type="number" name="smartphoto_options[registance]" value="<?php echo esc_attr( $opt['registance'] ); ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="Submit" value="Save" class="button"/></td>
						</tr>
					</table>
				</div>
				</div>
			</form>
		<?php
	}
}

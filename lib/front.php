<?php

class Smartphoto_Front {
	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'add_assets' ) );
		add_filter( 'the_content', array( $this, 'change_content' ) );
	}

	function add_assets() {
		wp_enqueue_script( 'smartphoto-js', plugins_url( 'assets/smartphoto.min.js', __FILE__ ), false, true );
		$options = get_option( 'smartphoto_options', array() );
		wp_localize_script( 'smartphoto-js', 'wp_smartphoto', $options );
		wp_add_inline_script( 'smartphoto-js', "document.addEventListener('DOMContentLoaded',function(){ new smartPhoto('.js-smartPhoto', wp_smartphoto );});" );

		wp_enqueue_style( 'smartphoto-css', plugins_url( 'assets/smartphoto.min.css', __FILE__ ) );
		$css = '.smartphoto-img { max-width: none; } .smartphoto-nav li { background-color: #FFF; }';
		wp_add_inline_style( 'smartphoto-css', $css );

	}

	function change_content( $content ) {
		$pattern     = '/<img.*?src="(.*?)"(.*?)>/';
		$replacement = '<a href="${1}" class="js-smartPhoto"><img src="${1}"${2}/></a>';

		return preg_replace( $pattern, $replacement, $content );
	}
}

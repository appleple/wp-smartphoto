<?php

class smartphoto_front {
	function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'add_assets'));
		add_filter('the_content', array($this, 'change_content'));
		add_action('wp_footer', array($this, 'add_script'));
	}
	function add_assets() {
		wp_enqueue_script('smartphoto-js','https://unpkg.com/smartphoto@latest/js/smartphoto.min.js');
		wp_enqueue_style('smartphoto-css','https://unpkg.com/smartphoto@latest/css/smartphoto.min.css');
	}
	function change_content($content) {
		$pattern = '/<img.*?src="(.*?)"(.*?)>/';
		$replacement = '<a href="${1}" class="js-smartPhoto"><img src="${1}"${2}/></a>';
		return preg_replace($pattern, $replacement, $content);
	}
	function add_script() {
		$options = get_option('smartphoto_options');
		?>
		<style>
		.smartphoto-img {
			max-width: none;
		}
		.smartphoto-nav li {
			background-color: #FFF;
		}
		</style>
		<script>
			document.addEventListener('DOMContentLoaded',function(){
			<?php if (!is_array($options)) { ?>
				new smartPhoto('.js-smartPhoto');
			<?php } else { ?>
				new smartPhoto('.js-smartPhoto',{
					nav: <?php echo $options['nav'] ?>,
					arrows: <?php echo $options['arrows'] ?>,
					animationSpeed: <?php echo $options['animationSpeed'] ?>,
					swipeOffset: <?php echo $options['swipeOffset'] ?>,
					forceInterval: <?php echo $options['forceInterval'] ?>,
					registance: <?php echo $options['registance'] ?>,
					resizeStyle: '<?php echo $options['resizeStyle'] ?>',
					verticalGravity: <?php echo $options['verticalGravity'] ?>,
					useOrientationApi: <?php echo $options['useOrientationApi'] ?>
				});
			<?php } ?>
			});
		</script>
		<?php
	}
}

new smartphoto_front;

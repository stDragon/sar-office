<?php

class CALLME_WIDGET extends WP_Widget{
	public function __construct(){
		parent::__construct(
				'Callme_widget',
				__('Call.me Widget', 'callme-plugin'),
				array(
					'description'=>__('A widget which allows users to send call requests', 'callme-plugin')
				)
		);
	}
	public function widget($args, $instance){
		global $callmePlugin;
		echo '<div id="callme-plugin-widget">';
		$options = $callmePlugin->options;'callme-plugin';
		include ('form.php');
		global $callmePlugin;
		$callmePlugin->process_request();
		echo '</div>';
	}
	
	public function form($instance){
		echo '<p>'.__('You can change plugin settings in Settings -> Call.me Settings', 'callme-plugin').'</p>';
	}
}

?>
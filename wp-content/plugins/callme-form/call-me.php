<?php
/*
Plugin Name: Call.me form
Plugin URI: http://wordpress.org/plugins/callme-form/
Version: 1.1
Description: A simple plugin which allows users to leave their telephone so that you could call them back. Usefull for e-commerce. A plugin has widget with "Call me" form and shorcode [сallme] for building in a form in your pages
Author: Alexaner Sadovnikov

Text Domain: callme-plugin
Domain Path: /languages
*/

include 'widget.php';

if (!class_exists('CALLME_PLUGIN')){
	class CALLME_PLUGIN{
	
		public $default_values;
		public $options;
		
		function __construct(){
			$this->default_options = array(
				'email'=>get_bloginfo('admin_email'),
				'fields'=>array(
					'telephone'=>true,
					'name'=>true,
					'time'=>true,
				),
				'labels'=>array(
					'telephone'=>__('My phone', 'callme-plugin'),
					'name'=>__('My name', 'callme-plugin'),
					'time'=>__('Suitable time', 'callme-plugin'),
				),
				'styling'=>true,
				'ajax'=>true,
			);
			$this->options = get_option('callme_options');
			add_shortcode('callme', array($this, 'callme_shortcode_handler'));	
			add_action('admin_menu',  array($this, 'callme_create_menu_options'));
			add_action('admin_init',  array($this, 'callme_register_options'));
			add_action('widgets_init', array($this, 'callme_register_widget'));
			add_action('plugins_loaded', array($this, 'callme_load_plugin_textdomain' ));
			add_action('wp_enqueue_scripts', array($this, 'load_assets'));
			if (isset($this->options['ajax'])){
				add_action('wp_ajax_nopriv_callme_request', array($this, 'process_ajax_request'));	
				add_action('wp_ajax_callme_request', array($this, 'process_ajax_request'));	
			}
		}
		
		
		public function load_assets(){
			if (isset($this->options['styling']))
				wp_enqueue_style('callme-style', plugins_url('callme.css', __FILE__));
			if (isset($this->options['ajax'])){
				//an url for our AJAX request
				echo '<script type="text/javascript">
					//<![CDATA[
					callme_ajaxurl = "'.get_bloginfo('url').'/wp-admin/admin-ajax.php";
					//]]>
				</script>';
				wp_enqueue_script('callme_script', plugins_url('callme.js', __FILE__), array('jquery'));
			}
		}
		public function activate(){
			add_option('callme_options', $this->default_options);
		}
		
		public function callme_shortcode_handler(){
			echo '<div id="callme-plugin">';
			$options = $this->options;
			include ('form.php');
			$this->process_request();
		}
		
		public function callme_create_menu_options(){
			add_submenu_page('options-general.php', __('Call.me Settings'), __('Call.me Settings'), 'manage_options','callme-config', array($this, 'callme_show_settings'));
		}
	
		function callme_load_plugin_textdomain(){
			load_plugin_textdomain('callme-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
		}
		
		/*
			Отправляет данные, выводит сообщения об ошибке или успехе
		*/
		public function process_request(){
			if (isset($_REQUEST['callme']) || isset($_REQUEST['callme_ajax'])){
				try{ 
					$this->send_data();
					echo '<p class="callme-success">'.__('Your request is being processed. Our managers will call you back soon', 'callme-plugin').'</p>';
				} catch (Exception $e){
					$success = 'false';
					echo '<p class="callme-error">'.($e->getMessage()).'</p>';
				}
						
			} else {
				return; 
			}
		}
		
		/*
			Processing AJAX request 
		*/
		public function process_ajax_request(){
			if (isset($_REQUEST['callme']) || isset($_REQUEST['callme_ajax'])){
				
				try{ 
					$this->send_data();
					echo json_encode(Array('message'=>'<p class="callme-success">'.__('Your request is being processed. Our managers will call you back soon', 'callme-plugin').'</p>', 'status'=>'success'));
				} catch (Exception $e){
					$success = 'false';
					echo json_encode(Array('message'=>'<p class="callme-error">'.($e->getMessage()).'</p>', 'status'=>'error'));
				}
			} 
			die();
		}
			
		/*
			Обрабатывает данные, присланные в $_POST запросе
		*/
		public function send_data(){
			if (isset($_POST['callme_ajax'])){
				$tel = $_POST['telephone'];
				$name = isset($_POST['myname']) ? $_POST['myname'] : '';
				$timefrom = isset($_POST['time_from']) ? $_POST['time_from'] : '';
				$timeto = isset($_POST['time_to']) ? $_POST['time_to'] : '';
				$page = isset($_POST['page']) ? $_POST['page'] : '';
				$pageurl = isset($_POST['pageurl']) ? $_POST['pageurl'] : '';
			} else {
				$tel = $_REQUEST['callme']['telephone'];
				$name = isset($_POST['myname']) ? $_REQUEST['callme']['myname'] : '';
				$timefrom = isset($_POST['time_from']) ? $_REQUEST['callme']['time_to'] : '';
				$timeto = isset($_POST['time_from']) ? $_REQUEST['callme']['time_to'] : '';
				$page = isset($_POST['page']) ? $_POST['page'] : '';
				$pageurl = isset($_POST['pageurl']) ? $_POST['pageurl'] : '';
			}
			if (empty($tel)){
				throw new Exception(__('Please, leave your telephone so we could call you back', 'callme-plugin'));
			}
			$message = __('New call order: ', 'callme-plugin')."\r\n".
						__('Telephone: ', 'callme-plugin').$tel."\r\n";
						
			if (isset($this->options['fields']['name']))
				$message .= __('Name: ', 'callme-plugin').(!empty($name) ? $name : 'не указано')."\r\n";
				
			if (isset($this->options['fields']['time']))
				$message .= __('Suitable time: ', 'callme-plugin').' '.(!empty($timefrom) ? __('from', 'callme-plugin').' '.$timefrom.__('h.', 'callme-plugin').' ' : '').(!empty($timeto) ? __('to', 'callme-plugin').' '.$timeto.__('h.', 'callme-plugin') : '');
						
			if (isset($this->options['fields']['time']) && empty($timefrom) && empty($timeto))
				 $message .= __('not specified', 'callme-plugin');
				 
			$message .= "\r\n".__('The request was sent from ', 'callme-plugin').' '.$page.' ( url: '.$pageurl.' )';
			
			$to = $this->options['email'];
			$siteurl = get_bloginfo('url');
			$parseurl = parse_url($siteurl);
			$domain = str_replace('www.', '', $parseurl['host']);
			
			$headers = "Content-Type: text/plain\r\n";
			$headers .= 'From: '.get_bloginfo('name').' <call.me@'.$domain.">\r\n";
			if (wp_mail($to, __('New call request', 'callme-plugin'), $message, $headers)){
				return true;
			} else {
				throw new Exception( __('We\'re sorry, but some error have occured. Please try again later', 'callme-plugin'));
			}
		}
		
		public function callme_register_options(){
			register_setting('callme_options', 'callme_options');
		}
		
		public function callme_show_settings(){
			$options = $this->options;
			include 'settings.php';
		}
		
		public function callme_register_widget(){
			register_widget('CALLME_WIDGET');
		}
	
	
	}
	
	
	$callmePlugin = new CALLME_PLUGIN();
	register_activation_hook(__FILE__, array($callmePlugin, 'activate'));
}


	




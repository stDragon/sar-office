<?php
/*
	This is a form fort Call.me plugin
*/
?>
<?php //var_dump($options); ?>
<?php if (isset($options['styling'])): ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo plugins_url('callme.css', __FILE__); ?>" />
<?php endif; ?>
<form class="callme-form" method="POST">
	
	<p><label for="callme[telephone]"><?php echo $options['labels']['telephone']; ?></label></p>
	<p><input class="callme" type="tel" name="callme[telephone]"></p>
	
	<?php if (isset($options['fields']['time'])): ?>
	<p><label><?php echo $options['labels']['time']; ?></label></p>
	<label for="callme[time_from]"><?php echo ' '.__('from').' '; ?></label>
	<input class="callme" type="number" name="callme[time_from]" value="9"><?php echo ' '.__('h.'); ?>
	<label for="callme[time_to]"><?php echo ' '.__('to').' '; ?></label>
	<input class="callme" type="number" name="callme[time_to]" value="21"><?php echo ' '.__('h.'); ?>
	<?php endif; ?>
	<?php if (isset($options['fields']['name'])): ?>
	<p><label class="callme" for="callme[myname]"><?php echo $options['labels']['name']; ?></label></p>
	<p><input class="callme" type="text" name="callme[myname]"></p>
	<?php endif; ?>
	<?php
	/*
		Getting page type and name
	*/
	global $wp_query;
	if (is_front_page())
		$pagename = __('Homepage', 'callme-plugin');
	elseif (class_exists('WooCommerce') && function_exists('is_shop') && is_shop())
			$pagename = __('Shop page', 'callme-plugin');
	elseif (class_exists('WooCommerce') && function_exists('is_product_category') && is_product_category())
			$pagename = __('Category page', 'callme-plugin').': '.$wp_query->queried_object->name;
	elseif (class_exists('WooCommerce') && function_exists('is_product') && is_product())
			$pagename = __('Product page', 'callme-plugin').': '.get_the_title();
	elseif (class_exists('WooCommerce') && function_exists('is_cart') && is_cart())
			$pagename = __('Cart page', 'callme-plugin');
	elseif (class_exists('WooCommerce') && function_exists('is_checkout') && is_checkout())
			$pagename = __('Checkout page', 'callme-plugin').': ';
	elseif (is_page())
		$pagename = __('Static page', 'callme-plugin').': '.get_the_title();
	elseif (is_single())
		$pagename = __('Post page', 'callme-plugin').': '.get_the_title();
	else
		$pagename = __('Unknown page type', 'callme-plugin');
	?>
	<input type="hidden" name="callme[page]" value="<?php echo $pagename; ?>"/>
	<input type="hidden" name="callme[pageurl]" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
	<div class="submit">
		<input class="<?php echo (isset($options['styling'])) ? 'red callme-btn' : '' ?>" type="submit" value="<?php echo __('Call me', 'callme-plugin'); ?>">
		<?php if (isset($options['styling'])): ?>
		<span class="red top-angle"></span>
		<?php endif; ?>
	</div>
</form>	

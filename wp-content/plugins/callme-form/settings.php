<?php
/*
	СТРАНИЦА НАСТРОЕК 
*/
?>

<h2><?php __('Call.me plugin — Settings', 'callme-plugin'); ?></h2>
<form action="options.php" method="post">
<?php settings_fields('callme_options'); ?>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php echo __('Email', 'callme-plugin'); ?></th>
		<td><input type="text" name="callme_options[email]" value="<?php echo $options['email']; ?>"</td>
		<td><i><?php echo __('Email for receiving new call requests', 'callme-plugin'); ?></i></td>
	</tr>
	<tr valign="top">
		<th scope="colgroup"><?php echo __('Telephone field label text', 'callme-plugin'); ?></th>
		<td><input type="text" name="callme_options[labels][telephone]" value="<?php echo $options['labels']['telephone']; ?>"</td>
	</tr>
	<tr valign="top">
		<th scope="colgroup"><?php echo __('Name field field', 'callme-plugin'); ?></th>
		<td><input type="checkbox"  name="callme_options[fields][name]" <?php echo (isset($options['fields']['name'])) ? 'checked' : '' ?>/></td>
		<td><i><?php echo __('Turn this off to remove name field', 'callme-plugin'); ?></i></td>
	</tr>
	<tr valign="top">
		<th scope="colgroup"><?php echo __('Name field label text', 'callme-plugin'); ?></th>
		<td><input type="text" name="callme_options[labels][name]" value="<?php echo $options['labels']['name']; ?>"</td>
	</tr>
	<tr valign="top">
		<th scope="colgroup"><?php echo __('Suitable time field', 'callme-plugin'); ?></th>
		<td><input type="checkbox" name="callme_options[fields][time]" <?php echo (isset($options['fields']['time'])) ? 'checked' : '' ?>/></td>
		<td><i><?php echo __('Turn this off to remove suitable time field', 'callme-plugin'); ?></i></td>
	</tr>
	<tr valign="top">
		<th scope="colgroup"><?php echo __('Suitable time field label text', 'callme-plugin'); ?></th>
		<td><input type="text" name="callme_options[labels][time]" value="<?php echo $options['labels']['time']; ?>"</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php echo __('Enable styling', 'callme-plugin'); ?></th>
		<td><input type="checkbox" <?php echo (isset($options['styling'])) ? 'checked' : '' ?> name="callme_options[styling]"></td>
		<td><i><?php echo __('Turn this off if you would like to use your own styles', 'callme-plugin'); ?></i></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php echo __('Enable AJAX', 'callme-plugin'); ?></th>
		<td><input type="checkbox" <?php echo (isset($options['ajax'])) ? 'checked' : '' ?> name="callme_options[ajax]"></td>
		<td><i><?php echo __('If this option is turned on, request will be sent without reloading page', 'callme-plugin'); ?></i></td>
	</tr>
	<tr>
		<td><input type="submit" value="<?php echo __('Save'); ?>" /></td>
	</tr>
</table>
</form>
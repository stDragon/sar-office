<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta name="google-site-verification" content="Iv5VHhQ0UnyUE-1XV7ZNT1Bc7YWgnyOCpRieMahyBvo" />
  <meta name='yandex-verification' content='5dfc7d905e581096' />
  <meta charset="UTF-8">
  <?php global $virtue; ?>
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if (!empty($virtue['virtue_custom_favicon']['url'])) {?>
  	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($virtue['virtue_custom_favicon']['url']); ?>" />
  	<?php } ?>
  <?php wp_head(); ?>
</head>
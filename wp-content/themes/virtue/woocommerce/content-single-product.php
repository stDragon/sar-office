<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
	  if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-5 product-img-case">

	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
	</div>
	<div class="col-md-7 product-summary-case">
	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->
</div>
</div>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>

<script>
var result = {};
var text;
var type = [];
var color = [];
var option = [];

jQuery('#pa_color option').not(":first").each(function(index, el) {
    option = jQuery(this).val();
    text = jQuery(this).html();
    type = ( /\[(.+)\]/.exec( text ))[1];
    color = ( /\(([0-9]+)\)/.exec( text ))[1];
    result[index] = {
        option: option,
        type: type,
        color: color,
	text: text
    };
});

addColors(result);

function addColors(colors){
    var colorHref;
    jQuery('.variations_form .variations').before('<div class="variations-colors"></div>');

    _.each(colors, function(num, index){

        if (jQuery('.variations-colors .material-title:contains("' + num.type + '")').length) {

        } else {
            jQuery('.variations-colors').append('<p class="material-title">' + num.type + '</p>')
        };

        colorHref = "/wp-content/uploads/colors/" + num.color;
        jQuery('.variations-colors').append('<img src="' + colorHref + '.jpg" data-option="' + num.option + '" data-toggle="tooltip" data-placement="top" title="' + num.text + '"' + '">');
    });
    jQuery('.variations-colors img').on('click', function(event) {
        event.preventDefault();
        var option = jQuery(this).data('option');
        jQuery('#pa_color').val(option).trigger('update').change();
    });
}
</script>
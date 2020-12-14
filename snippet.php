/**
 * @snippet       Restrict Coupons by Shipping Country
 * @how-to        Customize Woocommerce
 * @author        Jacopo Zangrilli - visualjack
 * @testedwith    WooCommerce 4.8
 * @info          Two digit country code: https://github.com/woocommerce/woocommerce/blob/master/i18n/countries.php
 */
add_filter( 'woocommerce_coupon_is_valid', 'restrict_coupon_by_shipping_country', 100, 2 );
 
function restrict_coupon_by_shipping_country( $is_valid, $coupon ) {
 
  $selected_coupon = array ('example1','example2'); //replace with your coupons
  $current_coupon = $coupon->get_code();
  $invalid_shipping_country = array ('HK','MO'); //replace with invalid countries 
  $current_shipping_country = WC()->customer->get_shipping_country();
 
  if( in_array( $current_coupon, $selected_coupon) && 
      in_array( $current_shipping_country, $invalid_shipping_country) ) {
    return false;
    }
  else {
    return $is_valid;
  }
 
}

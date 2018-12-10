<?php 
/**
 * @link            http://holyorganic-core.com/wp/plugins/mailchimp-widget-wp/
 * @since           1.0.0
 * @package         Holyorganic_Core
 * 
 * Plugin Name:     Holyorganic Core
 * Plugin URI:      https://webalive.com/wp-plugins
 * Description:     Holyorganic Ecommerce Plugin.
 * Version:         1.0.0 
 * Author:          Webalive
 * Author URI:      https://webalive.com/
 * License:         GPLv3 or later
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:     holyorganic-core
 */
if( !defined( 'ABSPATH' ) ) exit();

require_once 'vendor/autoload.php';

use Holyorganic\Module\Cart\Cart;
use Holyorganic\Module\Cart\Payment;

class WP_Plugin_Boilerplate {

    /**
     * Construct Function
     */
    public function __construct() {
        $cart = new Cart();
        $pa = new Payment();
    }

}
new WP_Plugin_Boilerplate();
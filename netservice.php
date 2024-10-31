<?php

/**
 * Netservice Reseller
 *
 * @package     Netservice Reseller
 * @author      Netservice
 * @copyright   2016 dapishro
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: نمایندگی نت سرویس
 * Plugin URI:  https://netservice.shop
 * Description: افزونه رسمی نت سرویس برای نمایندگان رسمی نت سرویس     |     برای مشاهده آموزش نصب و استفاده از ماژول بروی <a href="https://netservice.shop/whmcs" target="_blank"> بروی اینجا </a> کلیک فرمایید
 * Version:     1.9.4
 * Author:      نت سرویس
 * Author URI:  https://dapishro.co.ir
 * Text Domain: Netservice
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

defined('ABSPATH') or die('Not Authorized!');
define("WPS_FILE", __FILE__);
define("WPS_DIRECTORY", dirname(__FILE__));
define("WPS_TEXT_DOMAIN", dirname(__FILE__));
define("WPS_DIRECTORY_BASENAME", plugin_basename(WPS_FILE));
define("WPS_DIRECTORY_PATH", plugin_dir_path(WPS_FILE));
define("WPS_DIRECTORY_URL", plugins_url(null, WPS_FILE));

require_once(WPS_DIRECTORY . '/include/main.php');

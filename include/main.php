<?php
defined('ABSPATH') or die('Not Authorized!');
class WordPress_Plugin_Starter
{
    public function __construct()
    {
        register_uninstall_hook(WPS_FILE, array('WordPress_Plugin_Starter', 'plugin_uninstall'));
        register_activation_hook(WPS_FILE, array($this, 'plugin_activate'));
        register_deactivation_hook(WPS_FILE, array($this, 'plugin_deactivate'));
        add_action('plugins_loaded', array($this, 'plugin_init'));
        add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'plugin_enqueue_admin_scripts'));
        add_action('admin_menu', array($this, 'plugin_admin_menu_function'));
    }
    public static function plugin_uninstall()
    {
    }
    public function plugin_activate()
    {
    }
    public function plugin_deactivate()
    {
    }
    function plugin_init()
    {
        load_plugin_textDomain(WPS_TEXT_DOMAIN, false, dirname(WPS_DIRECTORY_BASENAME) . '/languages');
    }
    function plugin_admin_menu_function()
    {
        add_menu_page(__('ثبت سفارش در نت سرویس', WPS_TEXT_DOMAIN), __('نت سرویس', WPS_TEXT_DOMAIN), 'administrator', 'wps-general', null, 'https://blog.netservice.shop/wp-content/plugins/NetService/include/download.png', 4);
        add_submenu_page('wps-general', __('', WPS_TEXT_DOMAIN), __('صفحه نخست', WPS_TEXT_DOMAIN), 'manage_options', 'wps-general', array($this, 'plugin_settings_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('گواهینامه SSL', WPS_TEXT_DOMAIN), 'manage_options', 'wps-ssl', array($this, 'plugin_ssl_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('وب اپلیکیشن', WPS_TEXT_DOMAIN), 'manage_options', 'wps-webapp', array($this, 'plugin_webapp_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('بهینه سازی و سئو', WPS_TEXT_DOMAIN), 'manage_options', 'wps-seo', array($this, 'plugin_seo_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('پیامک انبوه', WPS_TEXT_DOMAIN), 'manage_options', 'wps-sms', array($this, 'plugin_sms_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('گوگل مارکتینگ', WPS_TEXT_DOMAIN), 'manage_options', 'wps-google', array($this, 'plugin_google_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('ایمیل مارکتینگ', WPS_TEXT_DOMAIN), 'manage_options', 'wps-email', array($this, 'plugin_email_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('تبلیغات پاپ آپ', WPS_TEXT_DOMAIN), 'manage_options', 'wps-popup', array($this, 'plugin_popup_page'));
        add_submenu_page('wps-general', __('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN), __('بک لینک', WPS_TEXT_DOMAIN), 'manage_options', 'wps-backlink', array($this, 'plugin_backlink_page'));

        add_action('admin_init', array($this, 'plugin_register_settings'));
    }

    function plugin_register_settings()
    {
        register_setting('wps-settings-group', 'example_option');
        register_setting('wps-settings-group', 'another_example_option');
    }

    function plugin_enqueue_admin_scripts()
    {
        wp_register_style('wps-admin-style', WPS_DIRECTORY_URL . '/assets/dist/css/admin-style.css', array(), null);
        wp_register_script('wps-admin-script', WPS_DIRECTORY_URL . '/assets/dist/js/admin-script.min.js', array(), null, true);
        wp_enqueue_script('jquery');
        wp_enqueue_style('wps-admin-style');
        wp_enqueue_script('wps-admin-script');
    }

    function plugin_enqueue_scripts()
    {
        wp_register_style('wps-user-style', WPS_DIRECTORY_URL . '/assets/dist/css/user-style.css', array(), null);
        wp_register_script('wps-user-script', WPS_DIRECTORY_URL . '/assets/dist/js/user-script.min.js', array(), null, true);
        wp_enqueue_script('jquery');
        wp_enqueue_style('wps-user-style');
        wp_enqueue_script('wps-user-script');
    }

    function plugin_settings_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_ssl_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_webapp_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_seo_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_sms_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_google_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_email_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_popup_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
    <?php }
    function plugin_backlink_page()
    { ?>
        <div class="wrap card card12">
            <div class="top"></div>
            <img src="http://netservice.shop/assets/img/logo.png" class="ax">
            <h1><?php _e('پشتیبانی با نت سرویس', WPS_TEXT_DOMAIN); ?></h1>
            <p><?php _e('لطفا با کلیک بروی دکمه زیر برای ما ایمیل ارسال فرمایید', WPS_TEXT_DOMAIN); ?></p>
            <form method="post">
                <div class="form-group ">
                    <label>عنوان ایمیل</label>
                    <input type="text" name="" value="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>توکن وب سرویس</label>
                    <input type="text" name="" class="form-control">
                </div>
                <br>
                <div class="form-group ">
                    <label>متن ایمیل</label>
                    <textarea name="" class="form-control" rows="4" style="height:150px"></textarea>
                </div>
                <br>
                <div class="form-group ">
                    <label>فیلد شماره موبایل</label>
                    <select class="form-control" name="">
                        <option value="1">فیلد پیشفرض شماره موبایل</option>
                        <option value="2">از چه طریقی با نت سرویس آشنا شدید؟</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btnna">ثبت تغییرات</button>
            </form>
        </div>
<?php }
}
new WordPress_Plugin_Starter;

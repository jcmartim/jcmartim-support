<?php

/**
 * Plugin Name:       Jcmartim Support
 * Plugin URI:        https://jcmartim.site/plugins/jcmartim-support
 * Description:       Displays a Meta Box of information for accessing support.
 * Version:           1.0.0
 * Author:            João Carlos Martimbianco
 * Author URI:        https://jcmartim.site
 * Requires at least: 4.7
 * Tested up to:      5.8.2
 * Requires PHP:      7.3
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       jcmartim-support
 * Domain Path:       /languages
 **/
//*

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

if ( ! class_exists( 'Jcmartim_Support' ) ) {
    class Jcmartim_Support {
    
        public function __construct()
        {
            $this->define_constants();

            //Registra os metodos de instalação, desativação e desistalação respectivamente.
            register_activation_hook( JCMARTIM_SUPPORT_PATH, [$this, 'activate'] );
            register_deactivation_hook( JCMARTIM_SUPPORT_PATH, [$this, 'deactivation'] );
            //register_uninstall_hook( JCMARTIM_SENDMAILER_PATH, [$this, 'uninstall'] );

            $this->load_textdomain();

            //Página e Menu do Front end.
            add_action('admin_menu', [$this, 'jcmartim_dashboard_admin_page']);

            //Classe que cria o Widget
            add_action('wp_dashboard_setup', [$this, 'wp_dashboard_setup_jcmartim']);

            //classe de configurações do plugin
            require_once( JCMARTIM_SUPPORT_PATH . 'class/class.jcmartim_dashboard_settings.php' );
            new JCMartim_Daschboard_Settings();

            //remove o rodape do WordPress
            add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
            add_filter( 'update_footer', '__return_empty_string', 11 );
        }

        public function define_constants()
        {
            define('JCMARTIM_SUPPORT_PATH', plugin_dir_path(__FILE__));
            define('JCMARTIM_SUPPORT_URL', plugin_dir_url(__FILE__));
            define('JCMARTIM_SUPPORT_VERSION', '1.0.0');
        }

        /**
         * Método de ativação do plugin.
         */
        public static function activate()
        {   
            // code...
        }

        /**
         * Método de desativação do plugin.
         */
        public static function deactivation()
        {
            // code...
        }

        /**
         * Método de desinstalação do plugin.
         */
        public static function uninstall()
        {
            # code...
        }

        public function load_textdomain() {
            load_plugin_textdomain(
                $domain = 'jcmartim-support', 
                $deprecated = false, 
                $plugin_rel_path = dirname(plugin_basename(__FILE__)) . '/languages/'
            );
        }

        public function jcmartim_dashboard_admin_page()
        {
            add_menu_page(
                $page_title = esc_html('Support Information', 'jcmartim-support'),
                $menu_title = esc_html('Support Information', 'jcmartim-support'),
                $capability = 'edit_pages',
                $menu_slug = 'jcmartim_support',
                $function = [$this, 'jcmartim_support_page'],
                $icon_url = 'dashicons-info',
                $position = null
            );
        }
        public function jcmartim_support_page()
        {
            if ( !current_user_can( 'edit_pages' ) )  {
                wp_die( __( 'You do not have sufficient permissions to access this page.', 'jcmartim-support' ) );
            }
            require_once(JCMARTIM_SUPPORT_PATH . 'views/jcmartim_dashboard_admin_view.php');
        }

        public function wp_dashboard_setup_jcmartim()
        {
            wp_add_dashboard_widget(
                $widget_id = 'jcmartim_support',
                $widget_name = esc_html__('Support Information', 'jcmartim-support'),
                $callback = [$this, 'jcmartim_dashboard_support'],
                $control_callback = null,
                $callback_args = null,
                $context = 'normal',
                $priority = 'core',
            );
        }
        public function jcmartim_dashboard_support()
        {
            require_once( JCMARTIM_SUPPORT_PATH . 'views/jcmartim_dashboard_view.php' );
        }
    
    }
}

if ( class_exists( 'Jcmartim_Support' ) ) {
    if ( is_admin() )
    new Jcmartim_Support();
}
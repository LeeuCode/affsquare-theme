<?php
namespace Affsquare;

if (!class_exists('Assets')) {
    class Assets
    {
        private static $_instance = null;

        public static function instance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self;
            }
            return self::$_instance;
        }

        public function __construct()
        {
            // register scripts and styles
            add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
            add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        }

        public function register_scripts()
        {
            // CSS Register            
            if (is_rtl()) {
                wp_register_style('bootstrap', THEME_DIR_URI . '/assets/css/bootstrap.rtl.min.css', '', '5.2.3');
            } else {
                wp_register_style('bootstrap', THEME_DIR_URI . '/assets/css/bootstrap.min.css', '', '5.2.3');
            }

            wp_register_style('slick', THEME_DIR_URI . '/assets/css/slick.css', '', '1.8.0');
            wp_register_style('fontawesome', THEME_DIR_URI . '/assets/css/all.min.css', '', '1.0.1');

            // JS Register
            wp_register_script('jquery', THEME_DIR_URI . '/assets/js/jquery-3.6.1.min.js', '', '3.6.1', true);
            wp_register_script('bootstrap', THEME_DIR_URI . '/assets/js/bootstrap.bundle.min.js', '', '5.2.3', true);
            wp_register_script('slick', THEME_DIR_URI . '/assets/js/slick.min.js', '', '1.8.0', true);
            wp_register_script('affsquare-script', THEME_DIR_URI . '/assets/js/app.js', '', THEME_VERSION, true);

            wp_localize_script(
                'affsquare-script',
                'affsquare',
                array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('affsquare-ajax')
                )
            );

        }

        public function enqueue_scripts()
        {
            // CSS Enqueue
            wp_enqueue_style('bootstrap');
            wp_enqueue_style('slick');
            wp_enqueue_style('fontawesome');
            wp_enqueue_style('affsquare-style', get_stylesheet_uri());
            
            // JS Enqueue
            wp_enqueue_script('jquery');
            wp_enqueue_script('bootstrap');
            wp_enqueue_script('slick');
            wp_enqueue_script('affsquare-script');
        }
    }
}
<?php
/**
* Enqueue Theme Assets
* 
* @package wpadvancedtheme
* 
*/

namespace WPADVANCEDTHEME\Includes;

use WPADVANCEDTHEME\Includes\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
        // loads the class methods below
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
    }

    // ENQUEUE STYLES
    public function register_styles() {
        // Register Scripts & Styles to call later when needed (like conditionally on a certain page)
        wp_register_style( 'style-css', get_stylesheet_uri(), false, filemtime( WPADVANCEDTHEME_DIR_PATH . '/style.css' ), 'all' );
        wp_register_style( 'bootstrap-css', WPADVANCEDTHEME_DIR_URI . '/assets/src/lib/css/bootstrap.min.css', [], false, 'all' );
        wp_register_style( 'custom', WPADVANCEDTHEME_DIR_URI . '/assets/css/custom.css', [], false, 'all' );
        wp_register_style( 'fonts-css', WPADVANCEDTHEME_DIR_URI . '/assets/src/lib/fonts/fonts.css', [], false, 'all' );

        // Enqueue the specific Stylesheet by the handle
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('custom');
        wp_enqueue_style('fonts-css');
    }

    // ENQUEUE SCRIPTS
    public function register_scripts() {
        // added WP get_template_directory_uri() because it grabs the Docker path
        wp_register_script( 'main-js', get_template_directory_uri() . '/assets/build/js/main.js', ['jquery'], filemtime( WPADVANCEDTHEME_BUILD_JS_DIR_PATH . '/main.js' ), true);
        wp_register_script( 'bootstrap-js', WPADVANCEDTHEME_DIR_URI . '/assets/src/lib/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue the specific Stylesheet or Script by the handle
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}
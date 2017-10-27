<?php

namespace MunicipioHighSchool\Theme;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'));
        add_action('admin_enqueue_scripts', array($this, 'adminStyle'));
        //
        if (!defined('DEV_MODE') || defined('DEV_MODE') && DEV_MODE == false) {
            add_action('wp_enqueue_scripts', array($this, 'tempStyleGuide',), 3);
        }
    }

    public function tempStyleGuide()
    {
        wp_deregister_style('hbg-prime');
        wp_deregister_script('hbg-prime');

        wp_register_style('hbg-prime', get_stylesheet_directory_uri() . '/assets/dist-styleguide/css/hbg-prime-' . \Municipio\Theme\Enqueue::getStyleguideTheme() . '.min.css', '', 'latest');

        wp_register_script('hbg-prime', get_stylesheet_directory_uri() . '/assets/dist-styleguide/js/hbg-prime.min.js', '', 'latest');

        wp_enqueue_style('hbg-prime');
        wp_enqueue_script('hbg-prime');
    }

    public function adminStyle()
    {
        wp_enqueue_style('municipio-school', get_stylesheet_directory_uri() . '/assets/dist/css/admin.min.css', array(), '1.0.0');
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        wp_enqueue_style('MunicipioHighSchool-css', get_stylesheet_directory_uri(). '/assets/dist/css/app.min.css', '', filemtime(get_stylesheet_directory() . '/assets/dist/css/app.min.css'));
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        wp_enqueue_script('MunicipioHighSchool-js', get_stylesheet_directory_uri(). '/assets/dist/js/app.min.js', '', filemtime(get_stylesheet_directory() . '/assets/dist/js/app.min.js'), true);
    }
}

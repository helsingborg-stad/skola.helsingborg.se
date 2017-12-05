<?php

namespace MunicipioHighSchool\Theme;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'), 10);
        add_action('wp_enqueue_scripts', array($this, 'script'), 10);
        add_action('admin_enqueue_scripts', array($this, 'adminStyle'), 10);
    }

    public function adminStyle()
    {
        wp_enqueue_style('municipio-highschool-admin-styles', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('css/admin.min.css', true));
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        if (defined('DEV_MODE') && DEV_MODE == true) {
            wp_enqueue_style('municipio-highschool-styles', get_stylesheet_directory_uri() . '/assets/dist/css/app.css');
        } else {
            wp_enqueue_style('municipio-highschool-styles', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('css/app.min.css', true));
        }
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        if (defined('DEV_MODE') && DEV_MODE == true) {
            wp_enqueue_script('municipio-highschool-scripts', get_stylesheet_directory_uri() . '/assets/dist/js/app.js', array('jquery'));
        } else {
            wp_enqueue_script('municipio-highschool-scripts', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('js/app.min.js', true), array('jquery'));
        }
    }
}

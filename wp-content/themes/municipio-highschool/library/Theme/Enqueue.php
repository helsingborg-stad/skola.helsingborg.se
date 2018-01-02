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
        wp_enqueue_style('municipio-highschool-admin-styles', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('css/admin.css', true, true));
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        wp_enqueue_style('municipio-highschool-styles', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('css/app.css', true, true));
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        wp_enqueue_script('municipio-highschool-scripts', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('js/app.js', true, true), array('jquery'));
    }
}

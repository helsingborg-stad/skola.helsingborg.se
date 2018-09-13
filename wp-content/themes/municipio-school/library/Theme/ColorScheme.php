<?php

namespace MunicipioSchool\Theme;

class ColorScheme
{

    public function __construct()
    {
        add_action('wp_head', array($this, 'addStyle'));
        add_filter('Modularity/Module/Classes', array($this, 'filterIndexBoxes'));
    }

    public function filterIndexBoxes($args)
    {
        if (is_array($args) && in_array("box-index", $args)) {
            return array('box', 'box-news');
        }

        return $args;
    }

    public function addStyle()
    {
        $css = array();
        $primary = get_field('school-primary-color', 'option');

        $css[] = '
            /* Navbar background */
            #site-header.header-jumbo .navbar:not(.navbar-creamy).navbar-mainmenu {
                border-bottom: 5px solid ' . $primary . ';
            }

            /* Menu arrow color */
            #site-header.header-jumbo .navbar:not(.navbar-transparent) .nav:not(.nav-dropdown) .current-menu-item > a::after,
            #site-header.header-jumbo .navbar:not(.navbar-transparent) .nav:not(.nav-dropdown) .current-page-ancestor > a::after,
            #site-header.header-jumbo .navbar:not(.navbar-transparent) .nav:not(.nav-dropdown) .current-menu-ancestor > a::after {
                border-bottom-color: ' . $primary . ';
            }

            /* Hamburger */
            .site-header.header-jumbo .menu-trigger .menu-icon,
            .site-header.header-jumbo .menu-trigger .menu-icon::before,
            .site-header.header-jumbo .menu-trigger .menu-icon::after {
                background-color: ' . $primary . ';
            }
        ';

        echo '<style>' . implode("\n\n", $css) . '</style>';
    }
}

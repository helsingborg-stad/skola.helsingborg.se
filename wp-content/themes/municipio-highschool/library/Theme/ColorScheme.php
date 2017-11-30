<?php

namespace MunicipioHighSchool\Theme;

class ColorScheme
{

    public function __construct()
    {
        add_action('wp_head', array($this, 'addStyle'));
    }

    public function addStyle()
    {
        $css = array();
        $primary = get_field('school-primary-color', 'option');

        $css[] = '
            /* Footer */
            ul.nav-aside li.current-menu-item > a {
                background-color: ' . $primary . ';
            }
        ';

        echo '<style>' . implode("\n\n", $css) . '</style>';
    }
}

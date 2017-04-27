<?php

namespace MunicipioSchool\Theme;

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

        if (\MunicipioSchool\Helper\WcagColorContrast::isValid($primary, '#ffffff', 'AA-Large')) {
            $css[] = '
                .navbar:not(.navbar-creamy).navbar-mainmenu {
                    background-color: ' . $primary . ';
                }
            ';
        } else {
            $css[] = '
                /* Navbar background */
                .navbar:not(.navbar-creamy).navbar-mainmenu {
                    background-color: #fff;
                    border-bottom: 5px solid ' . $primary . ';
                }

                /* Menu link color */
                .navbar.navbar-mainmenu ul a {
                    color: #000;
                }

                /* Logo color */
                .navbar-mainmenu .logotype svg,
                .navbar-mainmenu .logotype svg * {
                    fill: #000;
                }

                .navbar-mainmenu .logotype svg g:last-of-type,
                .navbar-mainmenu .logotype svg g:last-of-type * {
                    fill: ' . $primary . ';
                }

                /* Menu arrow color */
                .navbar:not(.navbar-transparent) .nav:not(.nav-dropdown) .current-menu-item > a::after,
                .navbar:not(.navbar-transparent) .nav:not(.nav-dropdown) .current-page-ancestor > a::after,
                .navbar:not(.navbar-transparent) .nav:not(.nav-dropdown) .current-menu-ancestor > a::after {
                    border-bottom-color: ' . $primary . ';
                }
            ';
        }

        echo '<style>' . implode("\n\n", $css) . '</style>';
    }
}


/*

.nav-bar,
            .main-footer,
            .button-primary,
            article .article-body ul li::before {
                background: #ae0b05 !important;
                background-color: #ae0b05 !important;
            }
 */

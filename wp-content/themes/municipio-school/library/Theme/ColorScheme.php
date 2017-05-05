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

        $css[] = '
            .navbar.navbar-mainmenu ul a {
                padding: 21px 0;
            }
        ';

        $css[] = '
            /* Footer */
            .main-footer {
                background-color: ' . $primary . ';
            }
        ';

        $css[] = '
            /* Logotype size */
            .site-header.header-jumbo .logotype svg,
            .site-header.header-jumbo .logotype img {
                height: 60px;
            }

            .site-header.header-jumbo .logotype {
                padding: 5px 0;
            }
        ';

        $css[] = '
            /* Index boxes */
            .box-news .box-index-title.link-item {
                margin-top: 0;
                padding-bottom: 0;
                left: 0;
            }

            .box-news .box-index-title.link-item:before {
                display: none;
            }
        ';

        echo '<style>' . implode("\n\n", $css) . '</style>';
    }
}

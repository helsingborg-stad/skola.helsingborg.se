<?php

namespace MunicipioHighSchool\Theme;

class ContentBackground
{
    public function __construct()
    {
        add_action('wp', array($this, 'contentBackground'));
    }

    public function contentBackground()
    {
        if (get_field('content_background_grey', 'options') == true) {
            add_filter('body_class', array($this, 'addBodyClass'));
        }
    }

    public function addBodyClass($classes)
    {
        $classes[] = 'content-background-grey';

        return $classes;
    }
}

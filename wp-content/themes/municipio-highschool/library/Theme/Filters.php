<?php

namespace MunicipioHighSchool\Theme;

class Filters
{
    public function __construct()
    {
        //Filter header data
        add_filter('HbgBlade/data', array($this, 'filterHbgBladeData'), 10, 1);

        //Sticky nav class
        add_filter('Municipio/StickyScroll', array($this, 'stickyNavBarClass'));

        //Nav group class
        add_filter('Municipio/Jumbo/NavGroupClass', array($this, 'navGroupClass'));
    }


    /**
     * Append navgroup class
     * @param string $class old classname
     * @return string new classname
     */
    public function navGroupClass($class)
    {
        $class = 'nav-group-flex';
        return $class;
    }

    /**
     * Append new sticky header class
     * @return array - Containing view data
     */
    public function stickyNavBarClass($class)
    {
        $class = 'navbar-sticky';
        return $class;
    }

    /**
     * Append class to the header that removes the js-overlay functionality.
     * @return array - Containing view data
     */

    public function filterHbgBladeData($data)
    {
        if (isset($data['headerLayout']) && isset($data['headerLayout']['classes'])) {
            $data['headerLayout']['classes'] .= " nav-no-overflow";
        }

        return $data;
    }
}

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

        //Fixes classes on sidebar boxes
        add_filter('Modularity/Module/Classes', array($this, 'moduleClasses'), 15, 3);

        //Foces use of two columns
        add_filter('HbgBlade/data', array($this, 'forceSidebarUsage'), 15, 3);

    }

    /**
     * Force sidebar usage. Do not calculate columns dynamicly
     * @param array $data full view data array from BaseController
     * @return array $data Modoified data array
     */
    public function forceSidebarUsage($data)
    {
        $data['hasLeftSidebar'] = false;
        $data['hasRightSidebar'] = true;
        return $data;
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

    /**
     * Modify module classes in different areas
     * @param  array $classes      Default classes
     * @param  string $moduleType  Module type
     * @param  array $sidebarArgs  Sidebar arguments
     * @return array               Modified list of classes
     */

    public function moduleClasses($classes, $moduleType, $sidebarArgs)
    {

        // Sidebar box-panel (should be filled)
        if (in_array($sidebarArgs['id'], array('left-sidebar-bottom', 'left-sidebar', 'right-sidebar')) && in_array('box-filled', $classes)) {
            unset($classes[array_search('box-filled', $classes)]);
            $classes[] = 'box-material';
        }

        return $classes;
    }
}

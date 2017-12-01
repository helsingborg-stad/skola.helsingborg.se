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

        //Always consider right-sidebar active
        add_filter('is_active_sidebar', array($this, 'activateRightSidebar'), 15, 3);

        //Show mobile menu earlier
        add_action('Municipio/mobile_menu_breakpoint', array($this, 'mobileMenuBreakpoint'));
        add_action('Municipio/desktop_menu_breakpoint', array($this, 'desktopMenuBreakpoint'));

    }

    /**
     * Show mobile menu in all but large size.
     * @return void
     */
    public function mobileMenuBreakpoint($classes)
    {
        return "hidden-lg";
    }

    /**
     * Show mobile menu in all but large size.
     * @return void
     */
    public function desktopMenuBreakpoint($classes)
    {
        return "hidden-xs hidden-sm hidden-md";
    }

    /**
     * Activate right sidebar
     * @param bool       $is_active_sidebar     Whether or not the sidebar should be considered "active". In other words, whether the sidebar contains any widgets.
     * @param int|string $index                 Index, name, or ID of the dynamic sidebar.
     */
    public function activateRightSidebar($is_active_sidebar, $index)
    {
        if ($index == "right-sidebar") {
            return true;
        }

        return $is_active_sidebar;
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

        if (isset($data['hasLeftSidebar'])) {
            $data['hasLeftSidebar'] = false;
        }

        if (isset($data['hasRightSidebar'])) {
            $data['hasRightSidebar'] = true;
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
        if (in_array('box-filled', $classes)) {
            unset($classes[array_search('box-filled', $classes)]);
            $classes[] = 'box--material';
        }

        if (in_array('box-news', $classes)) {
            unset($classes[array_search('box-news', $classes)]);
            $classes[] = 'box--material';
        }

        return $classes;
    }
}

<?php

namespace MunicipioHighSchool\Theme;

class Filters
{
    public function __construct()
    {
        //Filter header data
        add_filter('HbgBlade/data', array($this, 'filterHbgBladeData'), 10, 1);
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

<?php
namespace MunicipioHighSchool;

class App
{
    public function __construct()
    {
        // Admin
        new \MunicipioHighSchool\Admin\ColorScheme();
        new \MunicipioHighSchool\Admin\NetworkAdmin();

        // Theme
        new \MunicipioHighSchool\Theme\Filters();
        new \MunicipioHighSchool\Theme\Enqueue();
        new \MunicipioHighSchool\Theme\ColorScheme();
        new \MunicipioHighSchool\Theme\ContentBackground();

        // Post types
        new \MunicipioHighSchool\PostTypes\ForParents();
    }
}

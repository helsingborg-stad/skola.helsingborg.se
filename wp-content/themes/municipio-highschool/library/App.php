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
        new \MunicipioHighSchool\Theme\Enqueue();
        new \MunicipioHighSchool\Theme\ColorScheme();

        // Post types
        new \MunicipioHighSchool\PostTypes\ForParents();
    }
}

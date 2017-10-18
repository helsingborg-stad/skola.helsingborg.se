<?php
namespace MunicipioSchool;

class App
{
    public function __construct()
    {
        // Admin
        new \MunicipioSchool\Admin\ColorScheme();
        new \MunicipioSchool\Admin\NetworkAdmin();

        // Theme
        new \MunicipioSchool\Theme\Enqueue();
        new \MunicipioSchool\Theme\ColorScheme();

        // Post types
        new \MunicipioSchool\PostTypes\ForParents();
    }
}

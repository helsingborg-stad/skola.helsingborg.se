<?php
namespace MunicipioSchool;

class App
{
    public function __construct()
    {
        // Admin
        new \MunicipioSchool\Admin\ColorScheme();
        new \MunicipioSchool\Admin\NetoworkAdmin();

        // Theme
        new \MunicipioSchool\Theme\Enqueue();

        // Post types
        new \MunicipioSchool\PostTypes\ForParents();
    }
}

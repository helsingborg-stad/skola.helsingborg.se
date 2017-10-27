<?php

namespace MunicipioHighSchool\Admin;

class NetworkAdmin
{
    public $adminBar;

    public function __construct()
    {
        global $wp_admin_bar;
        $this->adminBar  = $wp_admin_bar;
    }

    public function unregisterNetworkSwitch()
    {
        $this->adminBar->remove_node('my-sites');
    }
}

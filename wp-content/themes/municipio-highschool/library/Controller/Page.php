<?php

namespace Municipio\Controller;

class Page extends \Municipio\Controller\BaseController
{
    public function init()
    {
        $this->data['hasLeftSidebar'] = false;
        $this->data['contentGridSize'] = 'grid-md-7';
    }
}

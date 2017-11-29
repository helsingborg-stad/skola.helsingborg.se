<?php

namespace Municipio\Controller;

class Page extends \Municipio\Controller\BaseController
{

    protected $post;

    public function init()
    {

        $this->globalToLocal('post');

        $this->data['hasLeftSidebar'] = false;
        $this->data['contentGridSize'] = 'grid-md-7';

        $this->data['menuTitle'] = $this->getMenuName();



    }

    public function getTopLevelPageID()
    {

        var_dump(get_post_ancestors($this->post));

    }

    public function getMenuName()
    {
        $this->getTopLevelPageID();
    }
}

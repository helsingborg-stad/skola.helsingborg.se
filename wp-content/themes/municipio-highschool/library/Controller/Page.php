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
        if ($this->post->post_parent == 0) {
            return 0;
        } else {
            return reset(get_post_ancestors($this->post));
        }

    }

    public function getMenuName()
    {
        $topLevelPageID = $this->getTopLevelPageID();

        if ($topLevelPageID === 0) {
            return $this->post->post_title;
        }

        if (is_numeric($topLevelPageID) && get_post_status($topLevelPageID) == 'publish') {
            if ($post_title = get_post_meta($topLevelPageID, 'custom_menu_title', true)) {
                if (!empty($post_title)) {
                    return $post_title;
                }
            }

            return get_the_title($topLevelPageID);
        }

        return "";
    }
}

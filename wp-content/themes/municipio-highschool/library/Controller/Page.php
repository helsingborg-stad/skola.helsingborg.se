<?php

namespace MunicipioHighSchool\Controller;

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

    /**
     * Gets the currect top level page id
     * @return int Top level post id
     */

    public function getTopLevelPageID()
    {
        if ($this->post->post_parent == 0) {
            return $this->post->ID;
        } else {
            return reset(get_post_ancestors($this->post));
        }
    }

    /**
     * Gets the currect top level page id
     * @return string Contains the menu name or title
     */

    public function getMenuName()
    {
        $topLevelPageID = $this->getTopLevelPageID();

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

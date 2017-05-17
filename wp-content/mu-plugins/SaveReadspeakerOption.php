<?php

namespace SaveReadspeakerOption;

class SaveReadspeakerOption
{

    public function __construct()
    {
        if (isset($_GET['save-readspeaker']) && $_GET['save-readspeaker'] == 'true') {
            add_action('init', array($this, 'saveKey'), 20);
        }
    }

    public function saveKey()
    {
        $sites = \get_sites(array('number' => 999));
        $updated = array();

        if (is_array($sites) && !empty($sites)) {
            foreach ($sites as $key => $site) {
                switch_to_blog($site->blog_id);

                // Customer id
                update_field('field_56cea7bb7d688', '5507', 'option' );
                // Footer
                update_field('field_56cdc815d542f', 0, 'option' );
                // Post types
                update_field('field_56cdb95b37279', array('page'), 'option' );
                // Placement
                update_field('field_56cead17a98c7', 'manually', 'option' );
                // Wrapper id
                update_field('field_56cec4d6d9352', 'readspeaker-read', 'option' );

                $updated[] = array(
                                'blog_id' => $site->blog_id,
                                'domain'  => $site->domain,
                                'path'    => $site->path,
                            );
                restore_current_blog();
            }
        }

        echo "<pre>";
        print_r($updated);

        exit;
    }
}

new \SaveReadspeakerOption\SaveReadspeakerOption();

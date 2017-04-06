<?php

namespace MunicipioSchool\PostTypes;

class ForParents
{
    public static $postTypeSlug = 'page-for-parents';

    public function __construct()
    {
        add_action('init', array($this, 'register'));
        add_action('init', array($this, 'addRole'));
    }

    public function addRole()
    {
        remove_role('for_parents');
        return add_role('for_parents', __('For parents'), array(
            'edit_page_for_parents'          => true,
            'read_page_for_parents'          => true,
            'delete_page_for_parents'        => true,
            'edit_pages_for_parents'         => true,
            'edit_others_pages_for_parents'  => true,
            'publish_pages_for_parents'      => true,
            'read_private_pages_for_parents' => true,
            'edit_pages_for_parents'         => true,
            'read' => true,
        ));
    }

    public function register()
    {
        $nameSingular = __('Page for parents', 'municipio-intranet');
        $namePlural = __('Pages for parents', 'municipio-intranet');

        $icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjMwcHgiIGhlaWdodD0iMjE3cHgiIHZpZXdCb3g9IjAgMCAyMzAgMjE3IiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPgogICAgPCEtLSBHZW5lcmF0b3I6IFNrZXRjaCA0MiAoMzY3ODEpIC0gaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoIC0tPgogICAgPHRpdGxlPm5vdW5fNjY1NjMwX2NjPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPgogICAgPGRlZnM+PC9kZWZzPgogICAgPGcgaWQ9IlBhZ2UtMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPGcgaWQ9Im5vdW5fNjY1NjMwX2NjIiBmaWxsLXJ1bGU9Im5vbnplcm8iIGZpbGw9IiMwMDAwMDAiPgogICAgICAgICAgICA8cGF0aCBkPSJNNzYuNDMxLDE4LjM3MyBDNzYuNDMxLDguNTA4IDg0LjQyNywwLjUxMSA5NC4yOTgsMC41MTEgQzEwNC4xNTcsMC41MTEgMTEyLjE1Niw4LjUwOCAxMTIuMTU2LDE4LjM3MyBDMTEyLjE1NiwyOC4yMzYgMTA0LjE1NywzNi4yMzUgOTQuMjk4LDM2LjIzNSBDODQuNDI3LDM2LjIzNSA3Ni40MzEsMjguMjM2IDc2LjQzMSwxOC4zNzMgWiBNMjI5Ljk5MiwyMDMuMjQ4IEMyMjkuOTkyLDIxMC4zNDQgMjI0LjIyMSwyMTYuMTE3IDIxNy4xMjYsMjE2LjExNyBDMjEwLjAyNywyMTYuMTE3IDIwNC4yNTMsMjEwLjM0NCAyMDQuMjUzLDIwMy4yNDggQzIwNC4yNTMsMjAwLjE4MyAyMDUuMzM1LDE5Ny4zNjIgMjA3LjEzNSwxOTUuMTQ5IEwyMDEuMjY1LDE4Ni45MDEgQzIwMS4yNTUsMTg2LjkwMSAyMDEuMjQzLDE4Ni45MDMgMjAxLjIzMiwxODYuOTAzIEwxNzMuMTk5LDE4Ni45MDMgQzE2NS43MzYsMTg2LjkwMyAxNTkuNjY2LDE4MC44MzIgMTU5LjY2NiwxNzMuMzY5IEwxNTkuNjY2LDEyOC45NTUgQzE1OS42NjYsMTI4LjgwMSAxNTkuNjg1LDEyOC42NTEgMTU5LjcwMiwxMjguNTAyIEwxNDYuNzU0LDExMC4zMDggQzE0Ni4wNjcsMTA5LjMwOSAxNDUuMTU2LDEwOC41NjQgMTQ0LjE0MywxMDguMDg0IEMxNDMuNTYsMTEzLjUxNyAxMzYuNTI5LDExNS44NTUgMTMyLjY2OCwxMTIuMDYyIEwxMzEuODc5LDExMi42MDIgQzEzMC4yNjYsMTEzLjcwNiAxMjguMDYxLDExMy4yOTMgMTI2Ljk1NSwxMTEuNjgzIEMxMjUuODUxLDExMC4wNjkgMTI2LjI2MywxMDcuODY2IDEyNy44NzUsMTA2Ljc2IEwxMjkuMzMsMTA1Ljc2MiBDMTI1LjU1Myw5Ny4xMjYgMTE5LjQzNiw4Mi44NzcgMTE2LjgwNiw3Ni42OTUgQzExNi42OTUsNzYuNDUzIDExNi40NjEsNzYuMjg1IDExNi4xNzUsNzYuMjg1IEMxMTUuNzkzLDc2LjI4NSAxMTUuNTMzLDc2LjU5MiAxMTUuNTMzLDc2Ljk3NiBMMTI2LjUwNywxNDEuOTA3IEMxMjYuODcxLDE0NC4xODUgMTI1LjMwOCwxNDYuMDM0IDEyMywxNDYuMDM0IEwxMTQuNDA0LDE0Ni4wMzQgTDExMy40NjYsMjA5LjM0NiBDMTEzLjM5OSwyMTMuMjk5IDExMC4xNjEsMjE2LjUgMTA2LjE4NiwyMTYuNSBDMTAyLjQwMywyMTYuNSA5OS4yNTksMjEzLjYxNyA5OC45MDQsMjA5LjkyOCBMOTYuMDIyLDE0Ni4wMzIgTDk0LjMsMTQ2LjAzMiBMOTIuNTczLDE0Ni4wMzIgTDg5LjY5NSwyMDkuOTI4IEM4OS4zNDEsMjEzLjYxNyA4Ni4yLDIxNi41IDgyLjQxMiwyMTYuNSBDNzguNDM5LDIxNi41IDc1LjIwNSwyMTMuMjk5IDc1LjEyNywyMDkuMzQ2IEw3NC4xODksMTQ2LjAzNCBMNjcuOTYzLDE0Ni4wMzQgQzY3LjQwOCwxNDQuMTU5IDY1LjY1MSwxMzguMzM3IDYzLjc1NCwxMzIuMDU0IEw3My4wNjgsNzYuOTc3IEM3My4wNjgsNzYuNTkzIDcyLjgwMyw3Ni4yODYgNzIuNDIsNzYuMjg2IEM3Mi4xNDEsNzYuMjg2IDcxLjg5OSw3Ni40NTMgNzEuNzkxLDc2LjY5NiBDNjguNjk1LDgzLjk3NiA2MC43NTksMTAyLjQ1OSA1Ny40OTgsMTA5Ljc2NSBDNTcuMzYsMTEwLjA3IDU3LjIwNywxMTAuMzQ3IDU3LjA1LDExMC42MTkgQzU1Ljc2MSwxMDguMDk2IDUzLjI2NywxMDUuNDU3IDQ3Ljc0NiwxMDQuNTE0IEM1MS4wMTIsMTAwLjg2MSA1Myw5Ni4wNDIgNTMsOTAuNzY2IEM1Myw4OC45NjcgNTIuNzY5LDg3LjIyIDUyLjMzMiw4NS41NTUgTDY0Ljk5NCw1Mi45NDUgQzY3LjE1Nyw0Ny45NjYgNzAuNDE5LDQwLjAyOSA5NC4yOTksMzkuODQ4IEMxMTguMTY0LDQwLjAyOSAxMjEuNDMsNDcuOTY2IDEyMy41OTcsNTIuOTQ1IEwxNDIuMDI2LDEwMC40MDkgQzE0Ni4xMTUsMTAwLjYwNCAxNTAuMDcxLDEwMi42MjggMTUyLjU1NywxMDYuMjU3IEwxNzEuOTIxLDEzMy40NjQgQzE3My44MDIsMTMyLjExNSAxNzYuMDk5LDEzMS4zMTQgMTc4LjU4NCwxMzEuMzE0IEMxODQuOTA3LDEzMS4zMTQgMTkwLjA1MywxMzYuNDYgMTkwLjA1MywxNDIuNzg1IEMxOTAuMDUzLDE0Ni42MzkgMTg4LjEzNCwxNTAuMDQ5IDE4NS4yMDQsMTUyLjEzMSBMMjAzLjM0OCwxNzcuNjIxIEwyMTEuMjM3LDE3OS4zMjggQzIxMi44MzMsMTc5LjI0NiAyMTQuMzIyLDE3OC41ODYgMjE1LjQ2LDE3Ny40NDYgQzIxNi44NDUsMTc2LjA2NSAyMTkuMDg1LDE3Ni4wNjUgMjIwLjQ3LDE3Ny40NDYgQzIyMS44NTIsMTc4LjgzIDIyMS44NTIsMTgxLjA3IDIyMC40NywxODIuNDU1IEMyMTcuOTExLDE4NS4wMTIgMjE0LjUxNCwxODYuNDE4IDIxMC44OTksMTg2LjQxOCBDMjEwLjY0NywxODYuNDE4IDIxMC4zOTYsMTg2LjM5MyAyMTAuMTUsMTg2LjMzNiBMMjA5LjQ0NSwxODYuMTg1IEwyMTIuOTQyLDE5MS4wOTggQzIxNC4yNTUsMTkwLjY0NyAyMTUuNjYyLDE5MC4zODcgMjE3LjEyOSwxOTAuMzg3IEMyMjQuMjIsMTkwLjM4IDIyOS45OTIsMTk2LjE1MiAyMjkuOTkyLDIwMy4yNDggWiBNMjIyLjkxMSwyMDMuMjQ4IEMyMjIuOTExLDIwMC4wNTkgMjIwLjMxNiwxOTcuNDYzIDIxNy4xMjYsMTk3LjQ2MyBDMjEzLjkzMywxOTcuNDYzIDIxMS4zMzUsMjAwLjA1OSAyMTEuMzM1LDIwMy4yNDggQzIxMS4zMzUsMjA2LjQ0IDIxMy45MzMsMjA5LjAzNSAyMTcuMTI2LDIwOS4wMzUgQzIyMC4zMTYsMjA5LjAzNSAyMjIuOTExLDIwNi40NCAyMjIuOTExLDIwMy4yNDggWiBNMTc4Ljg5OCwyMDMuMjQ4IEMxNzguODk4LDIxMC4zNDQgMTczLjEyNiwyMTYuMTE3IDE2Ni4wMjgsMjE2LjExNyBDMTU4LjkzLDIxNi4xMTcgMTUzLjE1NywyMTAuMzQ0IDE1My4xNTcsMjAzLjI0OCBDMTUzLjE1NywxOTYuMTUyIDE1OC45MywxOTAuMzgxIDE2Ni4wMjgsMTkwLjM4MSBDMTczLjEyNiwxOTAuMzgxIDE3OC44OTgsMTk2LjE1MiAxNzguODk4LDIwMy4yNDggWiBNMTcxLjgxNSwyMDMuMjQ4IEMxNzEuODE1LDIwMC4wNTkgMTY5LjIxOSwxOTcuNDYzIDE2Ni4wMjgsMTk3LjQ2MyBDMTYyLjgzNywxOTcuNDYzIDE2MC4yMzgsMjAwLjA1OSAxNjAuMjM4LDIwMy4yNDggQzE2MC4yMzgsMjA2LjQ0IDE2Mi44MzcsMjA5LjAzNSAxNjYuMDI4LDIwOS4wMzUgQzE2OS4yMTksMjA5LjAzNSAxNzEuODE1LDIwNi40NCAxNzEuODE1LDIwMy4yNDggWiBNNTMuNDI0LDExNC4yMDcgQzUyLjgxNSwxMTIuMjg3IDUxLjgxNSwxMDkuOTEyIDQ2LjY3MywxMDkuMTIxIEM0Mi4wNjMsMTA4LjQxOCAzNy40NDYsMTA4LjE2NCAzMy4zNTIsMTA4LjE0NyBMMzAuODA2LDEwOC4xNDcgQzI2LjcwNywxMDguMTY0IDIyLjA5MiwxMDguNDE4IDE3LjQ4MywxMDkuMTIxIEMxMi4zNDMsMTA5LjkxMiAxMS4zNCwxMTIuMjg3IDEwLjczMiwxMTQuMjA3IEMxMC43MzIsMTE0LjIwNyAxLjMxNiwxNDUuMzEzIDAuNTksMTQ3LjgxNyBDLTEuMDE0LDE1My4yOTYgNi4yNjIsMTU1LjcyMyA4LjM4NiwxNTAuOTU1IEMxMC4zODksMTQ2LjQ3MSAxNS4yNDQsMTM1LjA2NyAxNy4xNDIsMTMwLjU5OSBDMTcuMjA5LDEzMC40NTIgMTcuMzU3LDEzMC4zNDYgMTcuNTI4LDEzMC4zNDYgQzE3Ljc2MywxMzAuMzQ2IDE3Ljk1NCwxMzAuNTM3IDE3Ljk1NCwxMzAuNzcyIEwxOS4xNTksMjEyLjE0MSBDMTkuMjA4LDIxNC41NjkgMjEuMTkxLDIxNi41MzIgMjMuNjMxLDIxNi41MzIgQzI1Ljk1NiwyMTYuNTMyIDI3Ljg4NiwyMTQuNzYyIDI4LjEsMjEyLjQ5NyBMMzAuMTIxLDE2Ny43MDQgQzMwLjEyMSwxNjcuNzA0IDMwLjExNSwxNjYuMzMxIDMyLjAyMiwxNjYuMzMxIEMzNC4wNDMsMTY2LjMzMSAzNC4wNDMsMTY3LjcwNCAzNC4wNDMsMTY3LjcwNCBMMzYuMDY0LDIxMi40OTcgQzM2LjI3NywyMTQuNzYzIDM4LjIwOCwyMTYuNTMyIDQwLjUzMiwyMTYuNTMyIEM0Mi45NywyMTYuNTMyIDQ0Ljk1NiwyMTQuNTY5IDQ1LjAwMywyMTIuMTQxIEw0Ni4yMDgsMTMwLjc3MiBDNDYuMjA4LDEzMC41MzggNDYuMzk3LDEzMC4zNDYgNDYuNjM2LDEzMC4zNDYgQzQ2LjgwNywxMzAuMzQ2IDQ2Ljk1MiwxMzAuNDUxIDQ3LjAyMywxMzAuNTk5IEM0OC45MTgsMTM1LjA2OSA1My43NzUsMTQ2LjQ3MSA1NS43NzgsMTUwLjk1NSBDNTcuOSwxNTUuNzI1IDY1LjE3NSwxNTMuMjk5IDYzLjU3NCwxNDcuODE3IEM2Mi44NDEsMTQ1LjMxMyA1My40MjQsMTE0LjIwNyA1My40MjQsMTE0LjIwNyBaIE0zMi4zNDgsMTA2LjY5NiBDNDEuMTQ0LDEwNi42OTYgNDguMjc4LDk5LjU2IDQ4LjI3OCw5MC43NjIgQzQ4LjI3OCw4MS45NjEgNDEuMTQ0LDc0LjgzMiAzMi4zNDgsNzQuODMyIEMyMy41NDcsNzQuODMyIDE2LjQxMiw4MS45NjEgMTYuNDEyLDkwLjc2MiBDMTYuNDE1LDk5LjU2IDIzLjU0NywxMDYuNjk2IDMyLjM0OCwxMDYuNjk2IFoiIGlkPSJTaGFwZSI+PC9wYXRoPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+';

        $labels = array(
            'name'               => $nameSingular,
            'singular_name'      => $nameSingular,
            'menu_name'          => $namePlural,
            'name_admin_bar'     => $nameSingular,
            'add_new'            => _x('Add New', 'add new button', 'municipio-intranet'),
            'add_new_item'       => sprintf(__('Add new %s', 'municipio-intranet'), $nameSingular),
            'new_item'           => sprintf(__('New %s', 'municipio-intranet'), $nameSingular),
            'edit_item'          => sprintf(__('Edit %s', 'municipio-intranet'), $nameSingular),
            'view_item'          => sprintf(__('View %s', 'municipio-intranet'), $nameSingular),
            'all_items'          => sprintf(__('All %s', 'municipio-intranet'), $namePlural),
            'search_items'       => sprintf(__('Search %s', 'municipio-intranet'), $namePlural),
            'parent_item_colon'  => sprintf(__('Parent %s', 'municipio-intranet'), $namePlural),
            'not_found'          => sprintf(__('No %s', 'municipio-intranet'), $namePlural),
            'not_found_in_trash' => sprintf(__('No %s in trash', 'municipio-intranet'), $namePlural)
        );

        $args = array(
            'labels'               => $labels,
            'description'          => __('Pages designated for parents with children in this school', 'municipio-intranet'),
            'menu_icon'            => $icon,
            'public'               => true,
            'publicly_queriable'   => true,
            'show_ui'              => true,
            'show_in_nav_menus'    => true,
            'menu_position'        => 4,
            'has_archive'          => true,
            'rewrite'              => array(
                'slug'       => __('news', 'municipio-intranet'),
                'with_front' => false
            ),
            'capabilities' => array(
                'edit_post'          => 'edit_page_for_parents',
                'read_post'          => 'read_page_for_parents',
                'delete_post'        => 'delete_page_for_parents',
                'edit_posts'         => 'edit_pages_for_parents',
                'edit_others_posts'  => 'edit_others_pages_for_parents',
                'publish_posts'      => 'publish_pages_for_parents',
                'read_private_posts' => 'read_private_pages_for_parents',
                'create_posts'       => 'edit_pages_for_parents',
            ),
            'hierarchical'         => false,
            'exclude_from_search'  => false,
            'taxonomies'           => array(),
            'supports'             => array('title', 'revisions', 'editor', 'thumbnail', 'author', 'comments')
        );

        register_post_type(self::$postTypeSlug, $args);
    }
}

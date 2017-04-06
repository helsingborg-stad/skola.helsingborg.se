<?php

namespace MunicipioSchool\Admin;

class ColorScheme
{
    public function __construct()
    {
        add_action('acf/init', array($this, 'addField'));
    }

    public function addField()
    {
        if (!function_exists('acf_add_local_field')) {
            return;
        }

        $colors = $this->getColors();

        foreach ($colors as $color => $variables) {
            acf_add_local_field(array(
                'key' => 'field_' . sha1('school-colorscheme-' . $color),
                'label' => __('School\'s primary color', 'municipio-school'),
                'name' => 'school-primary-color',
                'type' => 'radio',
                'layout' => 'horizontal',
                'choices' => array(
                    $variables->{'palette-1'} => '<span style="background-color:' . $variables->{'palette-1'} . ';"></span>',
                    $variables->{'palette-2'}=> '<span style="background-color:' . $variables->{'palette-2'} . ';"></span>',
                    $variables->{'palette-3'} => '<span style="background-color:' . $variables->{'palette-3'} . ';"></span>',
                    $variables->{'palette-4'} => '<span style="background-color:' . $variables->{'palette-4'} . ';"></span>',
                    $variables->{'palette-5'} => '<span style="background-color:' . $variables->{'palette-5'} . ';"></span>'
                ),
                'conditional_logic' => array(
                    0 => array(
                        0 => array(
                            'field' => 'field_56a0a7e36365b',
                            'operator' => '==',
                            'value' => $color,
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => 'color-scheme-selector',
                    'id' => '',
                ),
                'default_value' => 'default',
                'parent' => 'group_56a0a7dcb5c09'
            ));
        }
    }

    public function getColors()
    {
        if ($colors = wp_cache_get('color-variables', 'municipio-school')) {
            return $colors;
        }

        $colors = array();
        $url = 'https://helsingborg-stad.github.io/styleguide-web/dist/vars/';

        if (defined('DEV_MODE') && DEV_MODE) {
            $url = 'http://hbgprime.dev/dist/vars/';
        }

        $field = get_field_object('field_56a0a7e36365b');
        foreach ($field['choices'] as $color => $label) {
            $request = wp_remote_get($url . $color . '.json');
            $response = wp_remote_retrieve_body($request);
            $response = json_decode($response);
            $colors[$color] = $response;
        }

        wp_cache_add('color-variables', $colors, 'municipio-school', 60*60*24);

        return $colors;
    }
}

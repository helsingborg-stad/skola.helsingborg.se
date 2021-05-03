<?php

/* 
Color order: 

primary main, 
primary dark,
primary light, 

secondary main, 
secondary dark,
secondary light,
*/

if(class_exists('WP_CLI')) {
    $prefix = 'customizer' . ' ';
    \WP_CLI::add_command($prefix . 'set-colors-mod', 'setPrimary');
}

function getColors() {
    
    
    $colors = [
        'red' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#770000',
            'field_603fba043ab30' => '#E84C31',
    
            'field_603fba3ffa851' => '#EC6701',
            'field_603fbb7ad4ccf' => '#B23700',
            'field_603fbbef1e2f8' => '#FF983E'
        ],
        'blue' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#003359',
            'field_603fba043ab30' => '#4989B6',
    
            'field_603fba3ffa851' => '#5BA1D8',
            'field_603fbb7ad4ccf' => '#1C73A6',
            'field_603fbbef1e2f8' => '#90D2FF'
        ],
    
        'purple' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#4B0034',
            'field_603fba043ab30' => '#AD428B',
    
            'field_603fba3ffa851' => '#D35098',
            'field_603fbb7ad4ccf' => '#9E166A',
            'field_603fbbef1e2f8' => '#FF82C9'
        ],
    
        'green' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#205400',
            'field_603fba043ab30' => '#80B14A',
    
            'field_603fba3ffa851' => '#A0C855',
            'field_603fbb7ad4ccf' => '#6F9725',
            'field_603fbbef1e2f8' => '#D3FB85'
        ],
    ];
    
    return $colors;
}

function setPrimary() {
    $colors = getColors();
    $sites = get_sites();

    foreach($sites as $site) {
        switch_to_blog( $site->blog_id );   
        
        $sitePrimaryColor = get_option( 'options_school-primary-color' );
        $schemeName = get_option('options_color_scheme');
        $colorScheme = $colors[$schemeName];
        $colorScheme['field_60361bcb76325'] = $sitePrimaryColor;
    
        set_theme_mod('colors', $colorScheme); 

        restore_current_blog(); 
    }
}
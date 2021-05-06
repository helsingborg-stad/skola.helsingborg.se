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
    \WP_CLI::add_command($prefix . 'set-radius-mod', 'setRadius');
    \WP_CLI::add_command($prefix . 'set-modifier-mod', 'setModifier');
    \WP_CLI::add_command($prefix . 'set-site-mod', 'setSite');
    \WP_CLI::add_command($prefix . 'set-header-mod', 'setHeader');

    //All wp customizer set-colors-mod --allow-root && wp customizer set-radius-mod --allow-root && wp customizer set-modifier-mod --allow-root && wp customizer set-site-mod --allow-root && wp customizer set-header-mod --allow-root
}

function getColors() {
    
    $colors = [
        'red' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#770000',
            'field_603fba043ab30' => '#E84C31',
    
            'field_603fba3ffa851' => '#EC6701',
            'field_603fbb7ad4ccf' => '#B23700',
            'field_603fbbef1e2f8' => '#FF983E',

            'field_60911ccc38857' => '#dec2c2',
            'field_6091280638858' => '#F0DBD9',
            'field_6091282d38859' => '#F5E4E3',
            'field_609128593885a' => '#FAEEEC'
        ],
        'blue' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#003359',
            'field_603fba043ab30' => '#4989B6',
    
            'field_603fba3ffa851' => '#5BA1D8',
            'field_603fbb7ad4ccf' => '#1C73A6',
            'field_603fbbef1e2f8' => '#90D2FF',

            'field_60911ccc38857' => '#C2CED7',
            'field_6091280638858' => '#DBE4E9',
            'field_6091282d38859' => '#E4EBF0',
            'field_609128593885a' => '#EEF3F6'
        ],
    
        'purple' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#4B0034',
            'field_603fba043ab30' => '#AD428B',
    
            'field_603fba3ffa851' => '#D35098',
            'field_603fbb7ad4ccf' => '#9E166A',
            'field_603fbbef1e2f8' => '#FF82C9',

            'field_60911ccc38857' => '#D4C2CE',
            'field_6091280638858' => '#E8DAE4',
            'field_6091282d38859' => '#EFE4EB',
            'field_609128593885a' => '#F6EDF3'
        ],
    
        'green' => [
            'field_60361bcb76325' => '',
            'field_60364d06dc120' => '#205400',
            'field_603fba043ab30' => '#80B14A',
    
            'field_603fba3ffa851' => '#A0C855',
            'field_603fbb7ad4ccf' => '#6F9725',
            'field_603fbbef1e2f8' => '#D3FB85',

            'field_60911ccc38857' => '#C9D6C2',
            'field_6091280638858' => '#E1E9DB',
            'field_6091282d38859' => '#EAF0E4',
            'field_609128593885a' => '#F2F6EE'
        ],
    ];
    
    return $colors;
}

function setPrimary() {
    $colors = getColors();
    $sites = get_sites();

    foreach($sites as $site) {
        
        //Switch to blog
        switch_to_blog( $site->blog_id );   

        //Get primary colors
        $sitePrimaryColor   = get_option( 'options_school-primary-color' );
        $schemeName         = get_option('options_color_scheme');

        //Create color array
        $colorScheme = $colors[$schemeName];
        $colorScheme['field_60361bcb76325'] = $sitePrimaryColor;

        //Print log
        \WP_CLI::log("Setting theme color '". $schemeName ."' on " . $site->domain . " with primary color " . $sitePrimaryColor);
    
        //Execute
        set_theme_mod('colors', $colorScheme); 

        //Restore
        restore_current_blog(); 
    }
}


function setRadius() {

    $sites = get_sites();

    foreach($sites as $site) {
        
        //Switch to blog
        switch_to_blog( $site->blog_id );   

        //Print log
        \WP_CLI::log("Setting radius on " . $site->domain);
    
        //Execute
        set_theme_mod('radius', [
            "field_603662f7a16f8" => "2",
            "field_6038fa31cfac6" => "4",
            "field_6038fa400384b" => "4",
            "field_6038fa52576ba" => "4"
        ]); 

        //Restore
        restore_current_blog(); 
    }
}


function setModifier() {
    $sites = get_sites();

    foreach($sites as $site) {
        
        //Switch to blog
        switch_to_blog( $site->blog_id );   

        //Print log
        \WP_CLI::log("Setting module modifiers on " . $site->domain);
    
        //Execute
        set_theme_mod('modules', [
            "field_6061d864c6873" => "highlight",
            "field_6062fd67a2eb4" => "accented",
            "field_60631bb52591c" => "none",
            "field_6063008d5068a" => "none",
            "field_606300da5068b" => "none",
            "field_6063013a5068c" => "none",
            "field_6063072c25917" => "none",
            "field_60631b4025918" => "none",
            "field_60631b5f25919" => "none",
            "field_60641a8df5290" => "none",
            "field_60643b600cf66" => "none",
            "field_6064452900410" => "none",
            "field_607843a6ba55e" => "highlight",
            "field_607843cdba55f" => "none",
            "field_607ff0d6b8426" => "accented",
            "field_6090f318a40ef" => "highlight"
        ]); 

        //Restore
        restore_current_blog(); 
    }
}

function setSite() {
    $sites = get_sites();

    foreach($sites as $site) {
        
        //Switch to blog
        switch_to_blog( $site->blog_id );   

        //Print log
        \WP_CLI::log("Setting site modifiers on " . $site->domain);
    
        //Execute
        set_theme_mod('site', [
            "field_6070186956c15" => "accented"
        ]); 

        //Restore
        restore_current_blog(); 
    }
}

function setHeader() {
    $sites = get_sites();

    foreach($sites as $site) {
        
        //Switch to blog
        switch_to_blog( $site->blog_id );   

        //Print log
        \WP_CLI::log("Setting site header on " . $site->domain);
    
        //Execute
        update_option('options_header_layout', 'casual'); 

        //Restore
        restore_current_blog(); 
    }
}
<?php

define('MUNICIPIOSCHOOL_PATH', get_stylesheet_directory() . '/');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

add_action('after_setup_theme', function () {
    load_theme_textdomain('municipio-school', get_template_directory() . '/languages');
});

require_once MUNICIPIOSCHOOL_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new MunicipioSchool\Vendor\Psr4ClassLoader();
$loader->addPrefix('MunicipioSchool', MUNICIPIOSCHOOL_PATH . 'library');
$loader->addPrefix('MunicipioSchool', MUNICIPIOSCHOOL_PATH . 'source/php/');
$loader->register();

new MunicipioSchool\App();

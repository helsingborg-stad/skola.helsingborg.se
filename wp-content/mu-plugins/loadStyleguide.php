<?php 

if(isset($_GET['styleguide'])) {
  add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('styleguide-local', 'https://styleguide.local.test/assets/dist/css/styleguide-css.min.css'); 
    wp_enqueue_script('styleguide-js', 'https://styleguide.local.test/assets/dist/js/styleguide-js.min.js');
  }, 2); 


  add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('styleguide-css'); 
    //wp_dequeue_script('styleguide-js'); 
  }, 15); 
}

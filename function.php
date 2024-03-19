<?php
// Gestio du menu 
function my_menu(){
    register_nav_menu('main',__('Menu principal'));
    register_nav_menu('footer',__('Menu footer'));
}
add_action('init','my_menu');
?>
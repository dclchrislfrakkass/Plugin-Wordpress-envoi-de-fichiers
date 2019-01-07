<?php
/*
Plugin Name: Envoi de fichiers (test 2)
Plugin URI: https://DCL.com
Description: Voici notre plugin WordPress pour l'envoi de fichiers.
Author : Chris, JP
Author URI: https://DCL.com
*/
function shortcode_uploadF(){
    include "uploadfile.php";
}
add_shortcode('uploadF', 'shortcode_uploadF');
<?php
/*
Plugin Name: Envoi de fichiers (test 2)
Plugin URI: https://DCL.com
Description: Voici notre plugin WordPress pour l'envoi de fichiers.
Author : Chris, JP
Author URI: https://DCL.com
*/

// Add menu
function customplugin_menu() {

  add_menu_page("Envoi de fichiers", "Envoi de fichiers", "manage_options", "myplugin", "uploadfile",plugins_url('/sendFiles/img/icon.png'));

 
}

add_action("admin_menu", "customplugin_menu");

function uploadfile(){
  include "uploadfile.php";
}

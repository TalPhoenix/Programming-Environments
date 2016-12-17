<?php
/*
Plugin Name: Artwork Tracker
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This is a plugin designed to keep track of the artworks on creativecreaturestudio.com
Version:     1.0
Author:      Tori Lentz
Author URI:  http://victorialentz.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: Artwork-Tracker
*/

#region Regions
#region Administrative Page for Artwork-Tracker
add_action( 'admin_menu', 'artwork_menu' );

function artwork_menu() {
  add_menu_page( 'Artwork Tracker', 'Artwork Tracker', 'manage_options', 'artwork_menu', 'artwork_tracker_options' );
  add_submenu_page( 'artwork_menu', "Artworks Options", "Artworks Menu", 'manage_options', 'artwork_artworks_menu', 'artwork_artwork_options' );
}

function artwork_tracker_options() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'Sorry you are not allowed to access this page.' ) );
  }

  include( __DIR__ . '/artworkTrackerOptionsPage.php' );

}

function artwork_artwork_options()
{
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'Sorry you are not allowed to access this page.' ) );
  }

  include( __DIR__ . '/artworkManageArtworksPage.php' );

}

#endregion

#region Activation code for Artwork-Tracker

register_activation_hook( __FILE__, Artwork_Tracker_Activate );

$artwork_prefix = 'artwork_';

function Artwork_Tracker_Activate(){
  global $artwork_prefix;
  $artwork_prefix = 'artwork_';
  CreateDBTables();
}

function CreateDBTables()
{
  CreateArtworkTable();
/*  CreateUsersTable();
  CreateMediumTable();*/
}

function CreateArtworkTable() {
  global $artwork_prefix;
  $schema = "id int NOT NULL AUTO_INCREMENT,
             name varchar(20) NOT NULL,
             medium text,
             PRIMARY KEY (id)";
  CreateTable($artwork_prefix.'Artworks', $schema);
}

/*function CreateUsersTable() {
  global $artwork_prefix;
  $schema = "usr varchar(20) NOT NULL, "
          . "email tinytext NOT NULL,  "
          . "pwd tinytext NOT NULL,  "
          . "PRIMARY KEY (usr)";
  CreateTable($artwork_prefix . "Users", $schema);
}*/

/*function CreateMediumTable() {
  global $artwork_prefix;
  $schema = "medium varchar(20) NOT NULL, "
          . "PRIMARY KEY (medium)";
  CreateTable($artwork_prefix . "Mediums", $schema);
}*/

function CreateTable($table_name, $schema){
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (" . $schema . ") $charset_collate;";

  $wpdb->query($sql);
}

#endregion
#endregion
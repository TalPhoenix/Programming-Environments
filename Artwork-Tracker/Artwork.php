<?php
if (file_exists('../../../wp-config.php' ))
  {
  include_once('../../../wp-config.php' );
  }
else if (file_exists('./wp-config.php'))
  {
    include_once('./wp-config.php');
  }



class Artwork {
  public $name;
  public $medium;

  public function __construct($name, $medium)
  {
    $this->name = $name;
    $this->medium = $medium;
  }

  public function insert($table_name)
  {
    global $wpdb;

    $insert = "insert into " . $table_name . "(name, medium)" .
               "values ( " .
                   "'" . $this->name . "'," .
				   "'" . $this->medium . "'" .
                   ")" .
                   ";";
    $wpdb->query($insert);    
  }

  public static function delete($table_name, $id)
  {
    global $wpdb;

    $delete = "delete from " . $table_name . " " .
              "where id=" . $id.
               ";";
    echo $delete;
    $wpdb->query($delete);
  }

  public function update($table_name, $id)
  {
    global $wpdb;

    $update = "update " . $table_name . " " .
              "set " .
                 "name = '" . $this->name . "', " .
                 "medium = '" . $this->medium . "'" . 
               "where id = " . $id.
               ";";
    echo $update;
    $wpdb->query($update);
  }

  public static function get_all_artworks($table_name)
  {
      global $wpdb;

      $select = "select * from " . $table_name . ";";
      $all_artworks = $wpdb->get_results($select);
      return $all_artworks;

  }


}
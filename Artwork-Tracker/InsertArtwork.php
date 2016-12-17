<?php
include_once('Artwork.php');

foreach(array_keys($_POST) as $key)
  echo "<p>" . $key . " => " . $_POST[$key] . "</p>";

  $Artwork = new Artwork($_POST['name'], $_POST['medium']);
  $Artwork->insert('artwork_Artworks');
?>

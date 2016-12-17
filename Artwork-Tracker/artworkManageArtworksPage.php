<div id="divManageArtworks" ?>

<hr>
<h3>Artwork Description:</h3>
<form action="../wp-content/plugins/Artwork-Tracker/InsertArtwork.php" method="post">
  <div>
  <h3>Artwork Name:</h3>
  <input type='text' name='name'> 
  <h3>Artwork Medium:</h3>
  <?php
  $content = 'Enter Medium Here.';
  $editor_id = 'medium';
  $settings = array( 'editor_height' => 200, "drag_drop_upload" => true);

  wp_editor( $content, $editor_id, $settings );
  ?>
  <input type="submit" value="Insert New Artwork">
<!--
  <h3>Product Price</h3>
  <input type='text' name ='Price'>

-->
  </div>
</form>
<hr>
<form action="../wp-content/plugins/Artwork-Tracker/DeleteArtwork.php" method="post">
  <h3>Delete Artwork by ID</h3>
  <input type='text' name='id'>
  <input type="submit" value="Delete Artwork">
</form>

<hr>
<form action="../wp-content/plugins/Artwork-Tracker/UpdateArtwork.php" method="post">
  <h3>Update Artwork by ID</h3>
  id: <input type='text' name='id'>
  name: <input type='text' name='name'>
  medium: <input type ='text' name='medium'>
  <input type="submit" value="Update Artwork">
</form>
<hr>
</div>
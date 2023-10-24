<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<table border="1">
  <tr>
    <th>Common Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Conservation Status</th>
    <th>Backyard Tips</th>
    <th>Details</th>
  </tr>
   
<?php

  $birds = Bird::findAll();

  foreach($birds as $bird) { 
?>

  
  
<tr>
  <td><?php echo h($bird->common_name) ?></td>
  <td><?php echo h($bird->habitat) ?></td>
  <td><?php echo h($bird->food) ?></td>
  <td><?php echo h($bird->conservation_text()) ?></td>
  <td><?php echo h($bird->backyard_tips) ?></td>
  <td><a href="detail.php?id=<?php echo $bird->id ?>">View</a></td>
</tr>   

<?php } ?>

</table>


<?php include(SHARED_PATH . '/public_footer.php'); ?>

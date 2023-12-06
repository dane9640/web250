<?php 
  require_once('../private/initialize.php');
  $page_title = 'Bird List';
  include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<?php if($session->is_logged_in()) { ?>
  <a href="new.php">Add a bird</a>
<?php } ?>

    <table border="1">
      <tr>
        <th>Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

<?php

// Create a new bird object that uses the find_all() method
$birds = Bird::find_all();


  foreach($birds as $bird) { 

  ?>
      <tr>
        <td><?php echo h($bird->common_name); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->conservation()); ?></td>
        <td><?php echo h($bird->backyard_tips); ?></td>
        <?php if ($member->user_level === 'm' || $member->user_level === 'a' && $session->is_logged_in()) {
          echo "<td><a href='detail.php?id=". $bird->id . "'>View</a></td>";
          echo "<td><a href='edit.php?id=". $bird->id . "'>Edit</a></td>";
          echo  "<td><a href='" . url_for('delete.php?id=' . h(u($bird->id))) . "'>Delete</a></td>";
              } ?>
      </tr>
  <?php } ?> 
  </table>


<?php include(SHARED_PATH . '/public_footer.php'); ?>

<?php 
  require_once('../../private/initialize.php');
  $page_title = 'Members List';
  include(SHARED_PATH . '/public_header.php');

  if(!($session->is_logged_in())){
    redirect_to(url_for('/login.php'));
  }

?>

<h2>Members List</h2>
<p>This is a short list of members</p>

<a href="new.php">Add a Member</a>

    <table border="1">
      <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

<?php

$members = Member::find_all();


  foreach($members as $member) { 

  ?>
      <tr>
        <td><?php echo h($member->full_name()); ?></td>
        <td><?php echo h($member->username); ?></td>
        <td><?php echo h($member->email); ?></td>
        <td><a href="detail.php?id=<?php echo $member->id; ?>">View</a></td>
        <td><a href="edit.php?id=<?php echo $member->id; ?>">Edit</a></td>
        <td><a href="<?php echo url_for('/members/delete.php?id=' . h(u($member->id))); ?>">Delete</a></td>

      </tr>
      <?php } ?>

    </table>


<?php include(SHARED_PATH . '/public_footer.php'); ?>

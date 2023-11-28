<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('members/members.php'));
}
$id = $_GET['id'];

$member = Member::find_by_ID($id);
if($member == false) {
  redirect_to(url_for('members/members.php'));
}

if(is_post_request()) {

  $result = $member->delete();

  $_SESSION['message'] = 'The member was deleted successfully.';
  redirect_to(url_for('members/members.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <a href="<?php echo url_for('members/members.php');?>">&laquo; Back to List</a>

  <div>
    <h1>Delete Member</h1>
    <p>Are you sure you want to delete this Member?</p>
    <p class="item"><?php echo h($member->full_name()); ?></p>

    <form action="<?php echo url_for('members/delete.php?id=' . h(u($id))); ?>" method="post">
      <div>
        <input type="submit" name="commit" value="Delete Member" />
      </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

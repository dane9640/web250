<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('members/members.php'));
}
$id = $_GET['id'];

$member = Member::find_by_id($id);
if($member == false) {
  redirect_to(url_for('members/members.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['member'];

  $member->merge_attributes($args);
  $result = $member->save();

  if($result === true) {
    $_SESSION['message'] = 'The member was updated successfully.';
    redirect_to(url_for('members/detail.php?id=' . $member->id . ''));
  } else {
    // show errors
  }
} else {

  // display the form

}

?>

<?php $page_title = 'Edit Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/members.php'); ?>">&laquo; Back to List</a>

  <div>
    <h1>Edit Member</h1>

    <?php echo display_errors($member->errors); ?>

    <form action="<?php echo url_for('members/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div>
        <input type="submit" value="Edit Member" />
      </div>
    </form>
  </div>



<?php include(SHARED_PATH . '/public_footer.php'); ?>
